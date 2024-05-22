<?php

namespace Zendrop\Tiktok\DTO\Products;

use Zendrop\Data\ArrayOf;
use Zendrop\Tiktok\DTO\BaseDTO;
use Zendrop\Tiktok\DTO\Packages\DimensionDTO;
use Zendrop\Tiktok\DTO\Products\Sku\SkuDTO;
use Zendrop\Tiktok\Enum\Products\ProductStatus;
use Zendrop\Tiktok\Tests\Unit\TestData\Images\ImageDTO;

class ProductDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        public readonly ?string $title = null,
        public readonly ?ProductStatus $status = null,
        public readonly ?string $description = null,
        public readonly ?BrandDTO $brand = null,
        public readonly ?bool $isCodAllowed = null,
        /** @var CategoryDTO[] */
        #[ArrayOf(CategoryDTO::class)]
        public readonly ?array $categoryChains = null,
        /** @var ImageDTO[] */
        #[ArrayOf(ImageDTO::class)]
        public readonly ?array $mainImages = null,
        /** @var array<string, mixed>|null */
        public readonly ?array $packageWeight = null,
        public readonly ?DimensionDTO $packageDimensions = null,
        /** @var string[]|null */
        public readonly ?array $productTypes = null,
        /** @var SkuDTO[] */
        #[ArrayOf(SkuDTO::class)]
        public readonly ?array $skus = null,
        public readonly ?int $createTime = null,
        public readonly ?int $updateTime = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
