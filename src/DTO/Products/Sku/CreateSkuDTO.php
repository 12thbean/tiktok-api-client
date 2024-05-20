<?php

namespace Zendrop\Tiktok\DTO\Products\Sku;

use Zendrop\Data\Skippable;
use Zendrop\Tiktok\DTO\BaseDTO;
use Zendrop\Tiktok\DTO\Products\CreateInventoryDTO;
use Zendrop\Tiktok\DTO\Products\Price\CreatePriceDTO;

class CreateSkuDTO extends BaseDTO
{
    public function __construct(
        /** @var CreateInventoryDTO[] */
        public readonly array $inventory,
        /** @var CreatePriceDTO */
        public readonly CreatePriceDTO $price,
        /** @var array<int, array<string, mixed>> */
        public readonly array|Skippable $salesAttributes = Skippable::Skipped,
        public readonly string|Skippable $sellerSku = Skippable::Skipped,
        public readonly string|Skippable $externalSkuId = Skippable::Skipped,
        /** @var array<string, mixed>|Skippable */
        public readonly array|Skippable $identifierCode = Skippable::Skipped,
        /** @var array<int, array<string, mixed>>|Skippable */
        public readonly array|Skippable $combinedSkus = Skippable::Skipped,
        public readonly string|Skippable $skuUnitCount = Skippable::Skipped,
    ) {
    }
}
