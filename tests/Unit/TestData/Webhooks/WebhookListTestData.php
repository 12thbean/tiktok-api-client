<?php

namespace Zendrop\Tiktok\Tests\Unit\TestData\Webhooks;

use JsonException;

final class WebhookListTestData
{
    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function list(): array
    {
        $jsonResponse = <<<JSON
{
  "code": 0,
  "data": {
    "total_count": 1,
    "webhooks": [
      {
        "address": "https://partner.tiktokshop.com",
        "create_time": 1635338186,
        "event_type": "ORDER_STATUS_CHANGE",
        "update_time": 1635338186
      }
    ]
  },
  "message": "Success",
  "request_id": "202203070749000101890810281E8C70B7"
}
JSON;

        return json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
    }
}
