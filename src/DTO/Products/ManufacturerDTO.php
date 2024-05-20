<?php

namespace Zendrop\Tiktok\DTO\Products;

use Zendrop\Tiktok\DTO\BaseDTO;

class ManufacturerDTO extends BaseDTO
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $address = null,
        public readonly ?string $phoneNumber = null,
        public readonly ?string $email = null,
    ) {
    }
}
