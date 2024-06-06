<?php

namespace Zendrop\Tiktok\DTO\Webhooks;

use Zendrop\Tiktok\DTO\BaseDTO;

class WebhookDTO extends BaseDTO
{
    public function __construct(
        public readonly string $address,
        public readonly int $createTime,
        public readonly string $eventType,
        public readonly int $updateTime,
        mixed ...$data,
    ) {
        unset($data);
    }
}
