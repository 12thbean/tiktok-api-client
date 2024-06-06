<?php

namespace Zendrop\Tiktok\DTO\Webhooks;

use Zendrop\Tiktok\DTO\BaseDTO;

class DeleteWebhookDTO extends BaseDTO
{
    public function __construct(
        public readonly string $event_type,
        mixed ...$data,
    ) {
        unset($data);
    }
}
