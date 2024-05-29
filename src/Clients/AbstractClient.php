<?php

namespace Zendrop\Tiktok\Clients;

use Zendrop\Tiktok\Enum\ApiVersion;
use Zendrop\Tiktok\Exceptions\ClientException;
use Zendrop\Tiktok\Exceptions\InternalErrorException;
use Zendrop\Tiktok\Exceptions\InvalidRequestException;
use Zendrop\Tiktok\Exceptions\NotFoundException;
use Zendrop\Tiktok\Exceptions\ServiceUnavailableException;
use Zendrop\Tiktok\Exceptions\UnauthorizedException;
use Zendrop\Tiktok\Exceptions\UnexpectedResponseException;
use Zendrop\Tiktok\Http\Packs\HttpCode;
use Zendrop\Tiktok\Http\Packs\HttpMethod;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

abstract class AbstractClient
{
    private const BASE_URL = 'https://open-api.tiktokglobalshop.com';

    /**
     * Filter header keys to be logged.
     * @var string[]
     */
    private const LOG_HEADER_BLACK_LIST = [
        'Date',
        'Content-Type',
        'Transfer-Encoding',
        'Connection',
        'Cache-Control',
        'ETag',
        'Vary',
        'Referrer-Policy',
        'X-Frame-Options',
        'Strict-Transport-Security',
        'Server-Timing',
        'X-Shopify-Stage',
        'Content-Security-Policy',
        'X-Content-Type-Options',
        'X-Download-Options',
        'X-Permitted-Cross-Domain-Policies',
        'X-Request-Id',
        'X-XSS-Protection',
        'X-Dc',
        'CF-Cache-Status',
        'Report-To',
        'NEL',
        'Server',
        'CF-RAY',
        'alt-svc',
    ];

    public function __construct(
        private readonly string $appKey,
        private readonly string $appSecret,
        private readonly string $accessToken,
        private readonly ApiVersion $apiVersion,
        private readonly ?string $shopId = null,
        private readonly ?string $shopCipher = null,
    ) {
    }

    /**
     * Sends shopify requests and handles its status.
     *
     * @param string $routeGroup
     * @param string $resource
     * @param HttpMethod $method
     * @param array<string, mixed> $payload
     * @param ApiVersion|null $apiVersion
     * @return Response
     * @throws ClientException
     * @throws \JsonException
     */
    protected function sendRequest(
        string $routeGroup,
        string $resource,
        HttpMethod $method = HttpMethod::Get,
        array $payload = [],
        ?ApiVersion $apiVersion = null,
    ): Response {
        $requestMethod = $method->value;

        $url = $this->generateRequestUrl($routeGroup, $resource, $method, $apiVersion, $payload);

        $options = $requestMethod !== HttpMethod::Get->value ? ['json' => $payload] : [];

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'x-tts-access-token' => $this->accessToken,
        ])->send($requestMethod, $url, $options);

        if ($response->status() === HttpCode::HTTP_NO_CONTENT->value) {
            return $response;
        }

        if (!$response->successful() || $response->json() === null) {
            $this->handleResponseError(
                response: $response,
                resource: $resource,
                payload: $payload,
            );
        }

        return $response;
    }

    /**
     * @param array<string, mixed> $payload
     * @throws ClientException
     */
    protected function sendUnauthorizedRequest(
        string $url,
        HttpMethod $method = HttpMethod::Get,
        array $payload = [],
    ): Response {
        $requestMethod = $method->value;

        $options = !in_array($requestMethod, [
            HttpMethod::Get->value,
            HttpMethod::Delete->value,
        ], true) ? ['json' => $payload] : [];

        $response = Http::send($requestMethod, $url, $options);

        if (!$response->successful() || $response->json() === null) {
            $this->handleResponseError(
                response: $response,
                resource: '',
                payload: $payload,
            );
        }

        return $response;
    }

    /**
     * Generates request URL to requested resource.
     *
     * @param array<string, mixed> $payload
     * @throws \JsonException
     */
    private function generateRequestUrl(
        string $routeGroup,
        string $resource,
        HttpMethod $method,
        ?ApiVersion $apiVersion,
        array $payload,
    ): string {
        $routeGroup = trim($routeGroup, '/');
        $resource = trim($resource, '/');

        $apiVersionValue = $apiVersion?->value ?? $this->apiVersion->value;

        $url = self::BASE_URL . "/{$routeGroup}/{$apiVersionValue}/{$resource}";
        $path = parse_url($url, PHP_URL_PATH);

        $params = [
            'app_key' => $this->appKey,
            'timestamp' => time(),
        ];

        if ($this->shopId !== null) {
            $params['shop_id'] = $this->shopId;
        }
        if ($this->shopCipher !== null) {
            $params['shop_cipher'] = $this->shopCipher;
        }

        if (!empty($payload) && $method === HttpMethod::Get) {
            $params = [
                ...$params,
                ...$payload,
            ];
        } elseif (!empty($payload['page_size'])) {
            $params['page_size'] = $payload['page_size'];
        }

        $sign = $this->generateSignature($params, $method, $path, $payload);

        $params = [
            ...$params,
            'sign' => $sign,
        ];
        ksort($params);

        $url .= (strpos($url, '?') ? '&' : '?') . http_build_query($params);

        return $url;
    }

    /**
     * Resolves exceptions based on failed response.
     *
     * @param array<string, mixed> $payload
     * @throws ClientException
     */
    private function handleResponseError(Response $response, string $resource, array $payload): never
    {
        if ($response->status() === HttpCode::BAD_REQUEST->value) {
            $this->log('Invalid request', $resource, $payload, $response);
            throw new InvalidRequestException($response->json()['error'] ?? '');
        }

        if ($response->status() === HttpCode::HTTP_INTERNAL_SERVER_ERROR->value) {
            $this->log('Internal error', $resource, $payload, $response);
            throw new InternalErrorException($response->json()['error'] ?? '');
        }

        if ($response->status() === HttpCode::HTTP_SERVICE_UNAVAILABLE->value) {
            $this->log('Service unavailable', $resource, $payload, $response);
            throw new ServiceUnavailableException();
        }

        if ($response->status() === HttpCode::HTTP_UNAUTHORIZED->value) {
            $this->log('Unauthorized request', $resource, $payload, $response);
            throw new UnauthorizedException();
        }

        if ($response->status() === HttpCode::HTTP_NOT_FOUND->value) {
            $this->log('Resource not found', $resource, $payload, $response);
            throw new NotFoundException();
        }

        $this->log('Unexpected response', $resource, $payload, $response);
        throw new UnexpectedResponseException();
    }

    /**
     * Logs unsuccessful requests.
     *
     * @param array<string, mixed> $payload
     */
    private function log(string $message, string $resource, array $payload, Response $response): void
    {
        Log::warning(sprintf('%s: %s', static::class, $message), [
            'storeUrl' => '',
            'resource' => $resource,
            'payload' => $payload,
            'response' => [
                'status' => $response->status(),
                'header' => Arr::except($response->headers(), self::LOG_HEADER_BLACK_LIST),
                'body' => $response->body(),
            ],
            'client' => static::class,
        ]);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $body
     * @throws \JsonException
     */
    private function generateSignature(
        array $payload,
        HttpMethod $method,
        string $path,
        array $body = [],
        bool $formData = false,
    ): string {
        ksort($payload);

        $stringToSign = '';
        foreach ($payload as $key => $value) {
            if (!is_array($value)) {
                $stringToSign .= $key . $value;
            }
        }

        $stringToSign = $path . $stringToSign;
        if ($method !== HttpMethod::Get && $formData === false) {
            $stringToSign .= json_encode($body, JSON_THROW_ON_ERROR);
        }

        $stringToSign = $this->appSecret . $stringToSign . $this->appSecret;

        return hash_hmac('sha256', $stringToSign, $this->appSecret);
    }
}
