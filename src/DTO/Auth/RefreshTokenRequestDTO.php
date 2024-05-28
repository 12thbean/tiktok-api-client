<?php

namespace Zendrop\Tiktok\DTO\Auth;

use Zendrop\Tiktok\DTO\BaseDTO;

class RefreshTokenRequestDTO extends BaseDTO
{
    public function __construct(
        public readonly string $appKey,
        public readonly string $appSecret,
        public readonly string $refreshToken,
        public readonly string $grantType,
    ) {
    }
}
