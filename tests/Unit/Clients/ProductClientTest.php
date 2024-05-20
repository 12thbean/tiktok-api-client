<?php

namespace Zendrop\Tiktok\Tests\Unit\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\Tiktok\Clients\ProductClient;
use Zendrop\Tiktok\Clients\ProductClientInterface;
use Zendrop\Tiktok\DTO\Images\CreateImageDTO;
use Zendrop\Tiktok\DTO\Packages\DimensionDTO;
use Zendrop\Tiktok\DTO\Packages\WeightDTO;
use Zendrop\Tiktok\DTO\Products\CreateInventoryDTO;
use Zendrop\Tiktok\DTO\Products\CreateProductDTO;
use Zendrop\Tiktok\DTO\Products\Price\CreatePriceDTO;
use Zendrop\Tiktok\DTO\Products\Sku\CreateSkuDTO;
use Zendrop\Tiktok\DTO\Products\UpdateProductDTO;
use Zendrop\Tiktok\Enum\Packages\WeightUnit;
use Zendrop\Tiktok\Tests\Unit\TestData\Products\CreateProductTestData;
use Zendrop\Tiktok\Tests\Unit\TestData\Products\DeleteProductTestData;
use Zendrop\Tiktok\Tests\Unit\TestData\Products\ProductListTestData;
use Zendrop\Tiktok\Tests\Unit\TestData\Products\ProductTestData;

final class ProductClientTest extends ClientTestCase
{
    private ProductClientInterface $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = new ProductClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $listResponse = ProductListTestData::list();
        $productCount = count($listResponse['data']['products']);

        Http::fake([
            '*/product/*/products/search*' => $listResponse,
        ]);

        $list = $this->client->getList();
        $this->assertCount($productCount, $list);
        $this->assertEquals($listResponse['data']['products'][0]['id'], $list[0]->id);
    }

    public function testGetById(): void
    {
        $productResponse = ProductTestData::item();

        Http::fake([
            '*/product/*/products/*' => $productResponse,
        ]);

        $product = $this->client->getById('1729418727688672255');
        $this->assertEquals($productResponse['data']['id'], $product->id);
        $this->assertEquals($productResponse['data']['title'], $product->title);
        $this->assertEquals($productResponse['data']['description'], $product->description);
    }

    public function testCreate(): void
    {
        $productId = '12790';
        $productResponse = ProductTestData::item(productId: $productId, title: 'Nike Air Max 90');
        $createProductResponse = CreateProductTestData::create(productId: $productId);

        Http::fake([
            "*/product/*/products/{$productId}*"  => $productResponse,
            '*/product/*/products*' => $createProductResponse,
        ]);

        $product = $this->client->create(new CreateProductDTO(
            description: 'Fresh new colors give a modern look while Max Air cushioning adds comfort to your journey.',
            categoryId: '600341',
            mainImages: [
                new CreateImageDTO(uri: 'tos-useast5-i-omjb5zjo8w-tx/2c3054467fdb42de90cde797183e9993'),
            ],
            skus: [
                new CreateSkuDTO(
                    inventory: [
                        new CreateInventoryDTO(
                            warehouseId: '7307166535305742122',
                            quantity: 10,
                        ),
                    ],
                    price: new CreatePriceDTO(
                        amount: '100',
                        currency: 'USD',
                        externalSkuId: '123',
                    ),
                ),
            ],
            title: 'Nike Air Max 90',
            packageWeight: new WeightDTO(
                unit: WeightUnit::Pound,
                value: '3',
            ),
            packageDimensions: new DimensionDTO(
                height: '5',
                length: '5',
                unit: 'INCH',
                width: '5',
            ),
        ));

        $this->assertEquals($productId, $product->id);
        $this->assertEquals($productResponse['data']['title'], $product->title);
        $this->assertEquals($productResponse['data']['description'], $product->description);
    }

    public function testUpdate(): void
    {
        $productId = '1729481384577438719';
        $productResponse = ProductTestData::item(productId: $productId, title: 'Nike Air Max 90');
        $updateProductResponse = CreateProductTestData::create(productId: $productId);

        Http::fake([
            "*/product/*/products/{$productId}*" =>
                static function ($request) use ($productResponse, $updateProductResponse) {
                    if ($request->method() === 'GET') {
                        return Http::response($productResponse);
                    }

                    return Http::response($updateProductResponse);
                },
        ]);

        $product = $this->client->update($productId, new UpdateProductDTO(
            title: 'Nike Air Max 90',
            description: 'Fresh new colors give a modern look while Max Air cushioning adds comfort to your journey.',
            categoryId: '600341',
            mainImages: [
                new CreateImageDTO(uri: 'tos-useast5-i-omjb5zjo8w-tx/2c3054467fdb42de90cde797183e9993'),
            ],
            skus: [
                new CreateSkuDTO(
                    inventory: [
                        new CreateInventoryDTO(
                            warehouseId: '7307166535305742122',
                            quantity: 10,
                        ),
                    ],
                    price: new CreatePriceDTO(
                        amount: '100',
                        currency: 'USD',
                        externalSkuId: '123',
                    ),
                ),
            ],
            packageWeight: new WeightDTO(
                unit: WeightUnit::Pound,
                value: '3',
            ),
            packageDimensions: new DimensionDTO(
                height: '5',
                length: '5',
                unit: 'INCH',
                width: '5',
            ),
        ));

        $this->assertEquals($productId, $product->id);
        $this->assertEquals($productResponse['data']['title'], $product->title);
        $this->assertEquals($productResponse['data']['description'], $product->description);
    }

    public function testDelete(): void
    {
        Http::fake([
            '*/product/*/products*' => DeleteProductTestData::delete(),
        ]);

        $result = $this->client->delete('1729481384577438719');
        $this->assertTrue($result);
    }
}
