<?php

namespace Zendrop\Tiktok\Tests\Unit\TestData\Shop;

use JsonException;

final class AuthorizedShopListTestData
{
    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function list(): array
    {
        $response = <<<JSON
{
  "code": 0,
  "data": {
    "shops": [
      {
        "cipher": "TTP_PY-_6gAAAABqfvPkouvkgjUgXnivXrej",
        "code": "USLCYUEWMS",
        "id": "7495451935961353215",
        "name": "Zendrop",
        "region": "US",
        "seller_type": "LOCAL"
      }
    ]
  },
  "message": "Success",
  "request_id": "202405290834339CCEF276335335065448"
}
JSON;

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}
