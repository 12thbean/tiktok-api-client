<?php

namespace Zendrop\Tiktok\DTO\Products\Attribures;

use Zendrop\Tiktok\DTO\BaseDTO;

class AttributeValueDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
    ) {
    }
}
