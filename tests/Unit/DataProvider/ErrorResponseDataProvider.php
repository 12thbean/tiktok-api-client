<?php

namespace Zendrop\Tiktok\Tests\Unit\DataProvider;

use Generator;
use Zendrop\Tiktok\Exceptions\InternalErrorException;
use Zendrop\Tiktok\Exceptions\InvalidRequestException;
use Zendrop\Tiktok\Exceptions\NotFoundException;
use Zendrop\Tiktok\Exceptions\ServiceUnavailableException;
use Zendrop\Tiktok\Exceptions\UnauthorizedException;
use Zendrop\Tiktok\Exceptions\UnexpectedResponseException;
use Zendrop\Tiktok\Http\Packs\HttpCode;

final class ErrorResponseDataProvider
{
    public function responses(): Generator
    {
        yield [
            'body' => [
                "code" => 102000,
                "data" => null,
                "message" => 'error',
                "request_id" => '202405150657407CCD424DFF985100031F',
            ],
            'status' => HttpCode::HTTP_INTERNAL_SERVER_ERROR->value,
            'expectedException' => InternalErrorException::class,
        ];
        yield [
            'body' => [
                "code" => 12019150,
                "data" => null,
                "message" => 'product not find',
                "request_id" => '202405150657407CCD424DFF985100031F',
            ],
            'status' => HttpCode::HTTP_NOT_FOUND->value,
            'expectedException' => NotFoundException::class,
        ];
        yield [
            'body' => [
                "code" => 101000,
                "data" => null,
                "message" => 'error',
                "request_id" => '202405150657407CCD424DFF985100031F',
            ],
            'status' => HttpCode::BAD_REQUEST->value,
            'expectedException' => InvalidRequestException::class,
        ];
        yield [
            'body' => [
                "code" => 103003,
                "data" => null,
                "message" => 'system is busy, please try it later',
                "request_id" => '202405150657407CCD424DFF985100031F',
            ],
            'status' => HttpCode::HTTP_SERVICE_UNAVAILABLE->value,
            'expectedException' => ServiceUnavailableException::class,
        ];
        yield [
            'body' => [
                "code" => 104001,
                "data" => null,
                "message" => 'app key is invalid',
                "request_id" => '202405150657407CCD424DFF985100031F',
            ],
            'status' => HttpCode::HTTP_UNAUTHORIZED->value,
            'expectedException' => UnauthorizedException::class,
        ];
        yield [
            'body' => [
                "code" => 99999,
                "data" => null,
                "message" => 'error',
                "request_id" => '202405150657407CCD424DFF985100031F',
            ],
            'status' => 514,
            'expectedException' => UnexpectedResponseException::class,
        ];
    }
}