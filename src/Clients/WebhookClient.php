<?php

namespace Zendrop\Tiktok\Clients;

use Zendrop\Tiktok\DTO\Webhooks\UpdateWebhookDTO;
use Zendrop\Tiktok\DTO\Webhooks\WebhookDTO;
use Zendrop\Tiktok\DTO\Webhooks\WebhookListResponseDTO;
use Zendrop\Tiktok\Enum\ApiVersion;
use Zendrop\Tiktok\Http\Packs\HttpMethod;
use Zendrop\Tiktok\DTO\Webhooks\DeleteWebhookDTO;
use Zendrop\Tiktok\DTO\Webhooks\WebhookResponseDTO;

class WebhookClient extends AbstractClient implements WebhookClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(): WebhookListResponseDTO
    {
        $response = $this->sendRequest(
            routeGroup: 'event',
            resource: 'webhooks',
            apiVersion: ApiVersion::V202309,
        );

        return WebhookListResponseDTO::fromResponse($response->json());
    }

    /**
     * {@inheritDoc}
     */
    public function update(UpdateWebhookDTO $payload): WebhookResponseDTO
    {
        $response = $this->sendRequest(
            routeGroup: 'event',
            resource: 'webhooks',
            method: HttpMethod::Put,
            payload: $payload->toArray()
        );

        return WebhookResponseDTO::fromResponse($response->json());
    }

    public function delete(int $id, DeleteWebhookDTO $payload): WebhookResponseDTO
    {
        $response = $this->sendRequest(
            routeGroup: 'event',
            resource: 'webhooks',
            method: HttpMethod::Delete,
            payload: $payload->toArray()
        );

        return WebhookResponseDTO::fromResponse($response->json());
    }
}
