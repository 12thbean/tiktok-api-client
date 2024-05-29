<?php

namespace Zendrop\Tiktok\DTO\Shop;

use Zendrop\Tiktok\DTO\BaseDTO;

class AuthorizedShopDTO extends BaseDTO
{
    public function __construct(
        public readonly string $cipher,
        public readonly string $code,
        public readonly int $id,
        public readonly string $name,
        public readonly string $region,
        public readonly string $sellerType,
    ) {
    }
}
