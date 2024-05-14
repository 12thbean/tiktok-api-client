<?php

namespace Zendrop\Tiktok\DTO\Products;

use Zendrop\Tiktok\DTO\BaseDTO;

class ProductDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        mixed ...$data,
    ) {
        unset($data);
    }
}
