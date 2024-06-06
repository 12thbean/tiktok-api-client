<?php

namespace Zendrop\Tiktok\Tests\Unit\TestData\Webhooks;

use JsonException;

final class WebhookTestData
{
    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function response(): array
    {
        $jsonResponse = <<<JSON
{
  "code": 0,
  "data": {},
  "message": "Success",
  "request_id": "202203070749000101890810281E8C70B7"
}
JSON;

        return json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
    }
}
