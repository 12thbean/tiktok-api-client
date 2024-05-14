<?php

namespace Zendrop\Tiktok\Tests\Unit\Clients;

use Zendrop\Tiktok\Clients\ProductClient;

class ProductClientTest extends ClientTestCase
{
    private ProductClient $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new ProductClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $list = $this->client->getList();
        dd($list);
    }
}