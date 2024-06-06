<?php

namespace Zendrop\Tiktok\DTO\Webhooks;

use Zendrop\Tiktok\DTO\BaseDTO;

class WebhookResponseDTO extends BaseDTO
{
    public function __construct(
        public readonly int $code,
        public readonly string $message,
        public readonly string $requestId,
        public readonly ?array $data,
        mixed ...$unusedData,
    ) {
        unset($unusedData);
    }
}
