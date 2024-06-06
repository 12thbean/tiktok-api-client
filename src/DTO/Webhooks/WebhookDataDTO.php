<?php

namespace Zendrop\Tiktok\DTO\Webhooks;

use Zendrop\Tiktok\DTO\BaseDTO;

class WebhookDataDTO extends BaseDTO
{
    public function __construct(
        public readonly int $totalCount,
        /** @var array<string, WebhookDTO> */
        public readonly array $webhooks,
        mixed ...$data,
    ) {
        unset($data);
    }
}
