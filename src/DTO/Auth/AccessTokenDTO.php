<?php

namespace Zendrop\Tiktok\DTO\Auth;

use Zendrop\Tiktok\DTO\BaseDTO;

class AccessTokenDTO extends BaseDTO
{
    public function __construct(
        public readonly string $accessToken,
        public readonly int $accessTokenExpireIn,
        public readonly string $refreshToken,
        public readonly int $refreshTokenExpireIn,
        public readonly string $openId,
        public readonly string $sellerName,
        public readonly string $sellerBaseRegion,
        public readonly int $userType,
        /** @var string[] */
        public readonly array $grantedScopes,
        mixed ...$data,
    ) {
        unset($data);
    }
}
