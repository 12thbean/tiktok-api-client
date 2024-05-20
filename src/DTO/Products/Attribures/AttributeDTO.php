<?php

namespace Zendrop\Tiktok\DTO\Products\Attribures;

use Zendrop\Tiktok\DTO\BaseDTO;

class AttributeDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        /** @var AttributeValueDTO[] */
        public readonly array $values,
    ) {
    }
}
