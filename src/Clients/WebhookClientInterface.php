<?php

namespace Zendrop\Tiktok\Clients;

use Zendrop\Tiktok\DTO\Webhooks\DeleteWebhookDTO;
use Zendrop\Tiktok\DTO\Webhooks\UpdateWebhookDTO;
use Zendrop\Tiktok\DTO\Webhooks\WebhookResponseDTO;
use Zendrop\Tiktok\DTO\Webhooks\WebhookDTO;
use Zendrop\Tiktok\DTO\Webhooks\WebhookListResponseDTO;

interface WebhookClientInterface
{
    /**
     * This API retrieves the shop's webhooks callback URL for all event types.
     *
     * @link https://partner.tiktokshop.com/docv2/page/6509a3a1c16ffe02b8d64149
     */
    public function getList(): WebhookListResponseDTO;

    /**
     * This API updates the shop's webhook callback URL for a specific event type.
     *
     * @link https://partner.tiktokshop.com/docv2/page/650aa064defece02be6df919
     */
    public function update(UpdateWebhookDTO $payload): WebhookResponseDTO;

    /**
     * This API deletes the shop's webhook URL for a specific event type.
     * Regardless of whether webhook is configured or not, the result will return success.
     *
     * @link https://partner.tiktokshop.com/docv2/page/650aa1eadefece02be6e224a
     */
    public function delete(int $id, DeleteWebhookDTO $payload): WebhookResponseDTO;
}
