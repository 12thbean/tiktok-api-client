<?php

namespace Zendrop\Tiktok\Tests\Unit\TestData\Images;

use Zendrop\Tiktok\DTO\BaseDTO;

class ImageDTO extends BaseDTO
{
    public function __construct(
        public readonly int $height,
        public readonly int $width,
        public readonly string $uri,
        /** @var string[] */
        public readonly array $urls,
        /** @var string[] */
        public readonly array $thumbUrls,
    ) {
    }
}