<?php

namespace Zendrop\Tiktok\DTO\Products;

use Zendrop\Tiktok\DTO\BaseDTO;

class CategoryDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        public readonly bool $isLeaf,
        public readonly string $localName,
        public readonly string $parentId,
    ) {
    }
}
