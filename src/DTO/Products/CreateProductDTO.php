<?php

namespace Zendrop\Tiktok\DTO\Products;

use Zendrop\Data\Skippable;
use Zendrop\Tiktok\DTO\BaseDTO;
use Zendrop\Tiktok\DTO\Images\CreateImageDTO;
use Zendrop\Tiktok\DTO\Packages\DimensionDTO;
use Zendrop\Tiktok\DTO\Packages\WeightDTO;
use Zendrop\Tiktok\DTO\Products\Attribures\AttributeDTO;
use Zendrop\Tiktok\DTO\Products\Sku\CreateSkuDTO;
use Zendrop\Tiktok\Enum\Products\SaveMode;

class CreateProductDTO extends BaseDTO
{
    public function __construct(
        public readonly string $description,
        public readonly string $categoryId,
        /** @var CreateImageDTO[] */
        public readonly array $mainImages,
        /** @var CreateSkuDTO[] */
        public readonly array $skus,
        public readonly string $title,
        /** @var WeightDTO */
        public readonly WeightDTO $packageWeight,
        public readonly SaveMode|null|Skippable $saveMode = Skippable::Skipped,
        public readonly bool|Skippable $isCodAllowed = Skippable::Skipped,
        /** @var array<int, array<string, mixed>>|Skippable */
        public readonly array|Skippable $certifications = Skippable::Skipped,
        /** @var DimensionDTO|Skippable */
        public readonly DimensionDTO|Skippable $packageDimensions = Skippable::Skipped,
        /** @var AttributeDTO[]|Skippable */
        public readonly array|Skippable $productAttributes = Skippable::Skipped,
        public readonly string|Skippable $brandId = Skippable::Skipped,
        /** @var VideoDTO|null|Skippable */
        public readonly VideoDTO|null|Skippable $video = Skippable::Skipped,
        public readonly string|Skippable $externalProductId = Skippable::Skipped,
        /** @var string[] */
        public readonly array|Skippable $deliveryOptionIds = Skippable::Skipped,
        /** @var array<string, mixed>|Skippable */
        public readonly array|Skippable $sizeChart = Skippable::Skipped,
        public readonly string|Skippable $primaryCombinedProductId = Skippable::Skipped,
        /** @var ManufacturerDTO|Skippable */
        public readonly ManufacturerDTO|Skippable $manufacturer = Skippable::Skipped,
    ) {
    }
}
