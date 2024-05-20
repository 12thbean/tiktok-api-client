<?php

namespace Zendrop\Tiktok\DTO\Products\Price;

use Zendrop\Tiktok\DTO\BaseDTO;

class CreatePriceDTO extends BaseDTO
{
    public function __construct(
        public readonly string $amount,
        public readonly string $currency,
        public readonly string $externalSkuId,
    ) {
    }
}
