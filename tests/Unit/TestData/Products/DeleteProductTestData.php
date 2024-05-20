<?php

namespace Zendrop\Tiktok\Tests\Unit\TestData\Products;

final class DeleteProductTestData
{
    /**
     * @return array<string, mixed>
     * @throws \JsonException
     */
    public static function delete(): array
    {
        $response = <<<JSON
{
  "code": 0,
  "data": {},
  "message": "Success",
  "request_id": "20240517082353194842CAEC45F7038587"
}
JSON;

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}