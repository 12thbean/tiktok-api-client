<?php

namespace Zendrop\Tiktok\Tests\Unit\TestData\Products;

final class ProductListTestData
{
    /**
     * @return array<string, mixed>
     * @throws \JsonException
     */
    public static function list(): array
    {
        $response = <<<JSON
{
  "code": 0,
  "data": {
    "next_page_token": "WzE3MDE3OTI1NzM1NjQsIjE3Mjk0MTg3Mjc2ODg2NzIyNTUiXQ==",
    "products": [
      {
        "create_time": 1701792573,
        "id": "1729418727688672255",
        "sales_regions": [
          "US"
        ],
        "skus": [
          {
            "id": "1729418727688737791",
            "inventory": [
              {
                "quantity": 0,
                "warehouse_id": "7307166535305742122"
              }
            ],
            "price": {
              "currency": "USD",
              "tax_exclusive_price": "5"
            },
            "seller_sku": ""
          }
        ],
        "status": "FAILED",
        "title": "Test Product",
        "update_time": 1715598976
      }
    ],
    "total_count": 1
  },
  "message": "Success",
  "request_id": "20240516060839B86CBCBA4253EE00F92C"
}
JSON;

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}