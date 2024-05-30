<?php

namespace Zendrop\Tiktok\Clients;

use Zendrop\Tiktok\Enum\ApiVersion;

class TiktokClient
{
    /** @var array<string, array<string, AbstractClient>> */
    private static array $registry = [];

    public function __construct(
        private readonly string $appKey,
        private readonly string $appSecret,
        private readonly string $accessToken,
        private readonly ApiVersion $apiVersion = ApiVersion::V202309,
        private readonly ?string $shopId = null,
        private readonly ?string $shopCipher = null,
    ) {
    }

    public static function fake(string $class, string $appKey, ?string $shopId, AbstractClient $instance): void
    {
        self::$registry[$class][$appKey . ($shopId ?? '')] = $instance;
    }

    public function auth(): AuthClient
    {
        return $this->make(AuthClient::class);
    }

    public function shop(): ShopClient
    {
        return $this->make(ShopClient::class);
    }

    public function product(): ProductClient
    {
        return $this->make(ProductClient::class);
    }

    /**
     * @template TClient of AbstractClient
     * @param class-string<TClient> $class
     * @return TClient
     */
    private function make(string $class): AbstractClient
    {
        return self::$registry[$class][$this->appKey . ($this->shopId ?? '')] ??
            new $class(
                $this->appKey,
                $this->appSecret,
                $this->accessToken,
                $this->apiVersion,
                $this->shopId,
                $this->shopCipher,
            );
    }
}
