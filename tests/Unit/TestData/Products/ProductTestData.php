<?php

namespace Zendrop\Tiktok\Tests\Unit\TestData\Products;

use JsonException;

final class ProductTestData
{
    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function item(
        string $productId = '7265141763801646854',
        string $title = 'Test Product',
    ): array
    {
        $response = <<<JSON
{
  "code": 0,
  "data": {
    "audit_failed_reasons": [
      {
        "position": "Product Name",
        "reasons": [
          "Insufficient or Incomplete Product Information"
        ],
        "suggestions": [
          "Sellers must ensure all product titles and descriptions contain complete information that accurately describes the product being sold."
        ]
      }
    ],
    "brand": {
      "id": "7265141763801646854",
      "name": "\bGozen"
    },
    "category_chains": [
      {
        "id": "600001",
        "is_leaf": false,
        "local_name": "Home Supplies",
        "parent_id": "0"
      },
      {
        "id": "852104",
        "is_leaf": false,
        "local_name": "Home Decor",
        "parent_id": "600001"
      },
      {
        "id": "600341",
        "is_leaf": true,
        "local_name": "Photo Frames",
        "parent_id": "852104"
      }
    ],
    "create_time": 1701792573,
    "description": "<p>Test Product</p>",
    "id": "1729418727688672255",
    "is_cod_allowed": false,
    "main_images": [
      {
        "height": 2170,
        "thumb_urls": [
          "https://p19-oec-ttp.tiktokcdn-us.com/tos-useast5-i-omjb5zjo8w-tx/8a28f9bd43674dbcb551ef266bd8ebcd~tplv-omjb5zjo8w-resize-jpeg:300:300.jpeg?from=520841845",
          "https://p16-oec-ttp.tiktokcdn-us.com/tos-useast5-i-omjb5zjo8w-tx/8a28f9bd43674dbcb551ef266bd8ebcd~tplv-omjb5zjo8w-resize-jpeg:300:300.jpeg?from=520841845"
        ],
        "uri": "tos-useast5-i-omjb5zjo8w-tx/8a28f9bd43674dbcb551ef266bd8ebcd",
        "urls": [
          "https://p16-oec-ttp.tiktokcdn-us.com/tos-useast5-i-omjb5zjo8w-tx/8a28f9bd43674dbcb551ef266bd8ebcd~tplv-omjb5zjo8w-origin-jpeg.jpeg?from=520841845",
          "https://p19-oec-ttp.tiktokcdn-us.com/tos-useast5-i-omjb5zjo8w-tx/8a28f9bd43674dbcb551ef266bd8ebcd~tplv-omjb5zjo8w-origin-jpeg.jpeg?from=520841845"
        ],
        "width": 2170
      }
    ],
    "package_dimensions": {
      "height": "5",
      "length": "5",
      "unit": "INCH",
      "width": "5"
    },
    "package_weight": {
      "unit": "POUND",
      "value": "5"
    },
    "product_types": [
      "UNKNOWN"
    ],
    "skus": [
      {
        "global_listing_policy": {
          "inventory_type": "EXCLUSIVE",
          "price_sync": false
        },
        "id": "1729418727688737791",
        "identifier_code": {
          "type": "GTIN"
        },
        "inventory": [
          {
            "quantity": 0,
            "warehouse_id": "7307166535305742122"
          }
        ],
        "price": {
          "currency": "USD",
          "sale_price": "5",
          "tax_exclusive_price": "5"
        },
        "sales_attributes": [],
        "seller_sku": ""
      }
    ],
    "status": "FAILED",
    "title": "Test Product",
    "update_time": 1715598976
  },
  "message": "Success",
  "request_id": "202405151615500A485168D3F4980108E1"
}
JSON;

        $data = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        $data['data']['id'] = $productId;
        $data['data']['title'] = $title;

        return $data;
    }
}
