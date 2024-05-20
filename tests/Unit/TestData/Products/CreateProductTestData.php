<?php

namespace Zendrop\Tiktok\Tests\Unit\TestData\Products;

final class CreateProductTestData
{
    /**
     * @return array<string, mixed>
     * @throws \JsonException
     */
    public static function create(string $productId = '1729481075086824447'): array
    {
        $response = <<<JSON
{
   "code":0,
   "data":{
      "product_id":"1729481075086824447",
      "skus":[
         {
            "id":"1729481075086889983",
            "sales_attributes":[
               
            ]
         }
      ],
      "warnings":[
         
      ]
   },
   "message":"Success",
   "request_id":"202405161816322F05099E6F906F02E640"
}
JSON;

        $data = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        $data['data']['product_id'] = $productId;

        return $data;
    }
}