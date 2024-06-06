<?php

namespace Zendrop\Tiktok\DTO\Webhooks;

use Zendrop\Tiktok\DTO\BaseDTO;

class WebhookListResponseDTO extends BaseDTO
{
    public function __construct(
        public readonly int $code,
        public readonly string $message,
        public readonly string $requestId,
        public readonly WebhookDataDTO $data,
        mixed ...$unusedData,
    ) {
        unset($unusedData);
    }
}
