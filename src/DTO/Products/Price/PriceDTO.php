<?php

namespace Zendrop\Tiktok\DTO\Products\Price;

use Zendrop\Tiktok\DTO\BaseDTO;

class PriceDTO extends BaseDTO
{
    public function __construct(
        public readonly string $currency,
        public readonly string $salePrice,
        public readonly string $taxExclusivePrice,
    ) {
    }
}
