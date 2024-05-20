<?php

namespace Zendrop\Tiktok\DTO\Products;

use Zendrop\Tiktok\DTO\BaseDTO;

class BrandDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
    ) {
    }
}
