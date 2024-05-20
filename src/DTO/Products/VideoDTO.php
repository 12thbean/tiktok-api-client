<?php

namespace Zendrop\Tiktok\DTO\Products;

use Zendrop\Tiktok\DTO\BaseDTO;

class VideoDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
    ) {
    }
}
