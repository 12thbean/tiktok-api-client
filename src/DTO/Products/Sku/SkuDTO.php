<?php

namespace Zendrop\Tiktok\DTO\Products\Sku;

use Zendrop\Tiktok\DTO\BaseDTO;
use Zendrop\Tiktok\DTO\Products\Price\PriceDTO;

class SkuDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        public readonly ?PriceDTO $price = null,
        public readonly ?string $sellerSku = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
