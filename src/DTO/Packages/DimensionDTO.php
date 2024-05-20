<?php

namespace Zendrop\Tiktok\DTO\Packages;

use Zendrop\Tiktok\DTO\BaseDTO;

class DimensionDTO extends BaseDTO
{
    public function __construct(
        public readonly string $height,
        public readonly string $length,
        public readonly string $unit,
        public readonly string $width,
    ) {
    }
}
