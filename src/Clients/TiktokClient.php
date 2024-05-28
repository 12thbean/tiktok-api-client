<?php

namespace Zendrop\Tiktok\Clients;

class TiktokClient
{
    /** @var array<string, array<string, AbstractClient>> */
    private static array $registry = [];

    public function __construct(
        private readonly string $appKey,
        private readonly string $shopId,
        private readonly string $shopCipher,
        private readonly string $accessToken,
    ) {
    }

    public static function fake(string $class, string $shopId, AbstractClient $instance): void
    {
        self::$registry[$class][$shopId] = $instance;
    }

    public function auth(): AuthClient
    {
        return $this->make(AuthClient::class);
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
        return self::$registry[$class][$this->shopId] ??
            new $class($this->appKey, $this->shopId, $this->shopCipher, $this->accessToken);
    }
}
