<?php

namespace Zendrop\Tiktok\Enum\Products;

enum ProductStatus: string
{
    case All = 'ALL';
    case Draft = 'DRAFT';
    case Pending = 'PENDING';
    case Failed = 'FAILED';
    case Activate = 'ACTIVATE';
    case SellerDeactivated = 'SELLER_DEACTIVATED';
    case PlatformDeactivated = 'PLATFORM_DEACTIVATED';
    case Freeze = 'FREEZE';
    case Deleted = 'DELETED';
}
