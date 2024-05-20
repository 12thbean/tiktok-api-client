<?php

namespace Zendrop\Tiktok\DTO\Packages;

use Zendrop\Tiktok\DTO\BaseDTO;
use Zendrop\Tiktok\Enum\Packages\WeightUnit;

class WeightDTO extends BaseDTO
{
    public function __construct(
        public readonly WeightUnit $unit,
        public readonly string $value,
        mixed ...$data,
    ) {
        unset($data);
    }
}
