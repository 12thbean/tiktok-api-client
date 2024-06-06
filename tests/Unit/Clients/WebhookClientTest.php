<?php

namespace Zendrop\Tiktok\Tests\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\Tiktok\Clients\WebhookClient;
use Zendrop\Tiktok\Clients\WebhookClientInterface;
use Zendrop\Tiktok\DTO\Webhooks\DeleteWebhookDTO;
use Zendrop\Tiktok\DTO\Webhooks\UpdateWebhookDTO;
use Zendrop\Tiktok\DTO\Webhooks\WebhookListResponseDTO;
use Zendrop\Tiktok\DTO\Webhooks\WebhookResponseDTO;
use Zendrop\Tiktok\Tests\Unit\Clients\ClientTestCase;
use Zendrop\Tiktok\Tests\Unit\TestData\Webhooks\WebhookListTestData;
use Zendrop\Tiktok\Tests\Unit\TestData\Webhooks\WebhookTestData;

class WebhookClientTest extends ClientTestCase
{
    private WebhookClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new WebhookClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $expectedResponse = WebhookListTestData::list();
        $expectedCount = $expectedResponse['data']['total_count'];

        Http::fake(['*/event/*/webhook*' => Http::response($expectedResponse)]);

        $webhooks = $this->client->getList();
        $this->assertCount($expectedCount, $expectedResponse['data']['webhooks']);
        $this->assertInstanceOf(WebhookListResponseDTO::class, $webhooks);
    }

    public function testUpdate(): void
    {
        $expectedResponse = WebhookTestData::response();

        $payload = new UpdateWebhookDTO(
            address: 'fake_url',
            event_type: 'ORDER_STATUS_CHANGE',
        );

        Http::fake(['*/event/*/webhook*' => Http::response($expectedResponse)]);

        $response = $this->client->update($payload);

        $this->assertInstanceOf(WebhookResponseDTO::class, $response);
    }

    public function testDelete(): void
    {
        $expectedResponse = WebhookTestData::response();

        $payload = new DeleteWebhookDTO(
            event_type: 'ORDER_STATUS_CHANGE',
        );

        Http::fake(['*/event/*/webhook*' => Http::response($expectedResponse)]);

        $response = $this->client->delete($payload);

        $this->assertInstanceOf(WebhookResponseDTO::class, $response);
    }
}
