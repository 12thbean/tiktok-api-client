<?php

namespace Zendrop\Tiktok\DTO\Products;

use Zendrop\Tiktok\DTO\BaseDTO;

class CreateInventoryDTO extends BaseDTO
{
    public function __construct(
        public readonly string $warehouseId,
        public readonly int $quantity,
    ) {
    }
}
