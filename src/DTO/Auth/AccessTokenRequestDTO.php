<?php

namespace Zendrop\Tiktok\DTO\Auth;

use Zendrop\Tiktok\DTO\BaseDTO;

class AccessTokenRequestDTO extends BaseDTO
{
    public function __construct(
        public readonly string $appKey,
        public readonly string $appSecret,
        public readonly string $authCode,
        public readonly string $grantType,
    ) {
    }
}
