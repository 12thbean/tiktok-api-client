<?php

namespace Zendrop\Tiktok\Clients;

use Zendrop\Tiktok\DTO\Auth\RefreshTokenRequestDTO;
use Zendrop\Tiktok\Http\Packs\HttpMethod;
use Zendrop\Tiktok\DTO\Auth\AccessTokenDTO;
use Zendrop\Tiktok\DTO\Auth\AccessTokenRequestDTO;

class AuthClient extends AbstractClient implements AuthClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAccessToken(string $url, AccessTokenRequestDTO $payload): AccessTokenDTO
    {
        $response = $this->sendUnauthorizedRequest(
            url: $url,
            payload: $payload->toArray(),
        );

        return AccessTokenDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function refreshAccessToken(string $url, RefreshTokenRequestDTO $payload): AccessTokenDTO
    {
        $response = $this->sendUnauthorizedRequest(
            url: $url,
            payload: $payload->toArray(),
        );

        return AccessTokenDTO::fromResponse($response->json());
    }
}
