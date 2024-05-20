<?php

namespace Zendrop\Tiktok\DTO\Images;

use Zendrop\Tiktok\DTO\BaseDTO;

class CreateImageDTO extends BaseDTO
{
    public function __construct(
        public readonly string $uri,
    ) {
    }
}
