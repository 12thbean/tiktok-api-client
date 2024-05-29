<?php

namespace Zendrop\Tiktok\Tests\Unit\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\Tiktok\Clients\ShopClient;
use Zendrop\Tiktok\Clients\ShopClientInterface;
use Zendrop\Tiktok\Tests\Unit\TestData\Shop\AuthorizedShopListTestData;

final class ShopClientTest extends ClientTestCase
{
    private ShopClientInterface $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = new ShopClient(...$this->clientData);
    }

    public function testGetAuthorizedShopList(): void
    {
        $listResponse = AuthorizedShopListTestData::list();
        $shopCount = count($listResponse['data']['shops']);

        Http::fake([
            '*shops*' => $listResponse,
        ]);

        $list = $this->client->getAuthorizedShopList();
        $this->assertCount($shopCount, $list);
        $this->assertEquals($listResponse['data']['shops'][0]['id'], $list[0]->id);
    }
}
