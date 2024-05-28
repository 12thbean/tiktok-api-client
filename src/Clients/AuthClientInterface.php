<?php

namespace Zendrop\Tiktok\Clients;

use Throwable;
use Zendrop\Tiktok\DTO\Auth\AccessTokenDTO;
use Zendrop\Tiktok\DTO\Auth\AccessTokenRequestDTO;
use Zendrop\Tiktok\DTO\Auth\RefreshTokenRequestDTO;

interface AuthClientInterface
{
    /**
     * Exchange code with access token
     *
     * @throws Throwable
     * @link https://partner.tiktokshop.com/doc/page/63fd743c715d622a338c4e5a#
     */
    public function getAccessToken(string $url, AccessTokenRequestDTO $payload): AccessTokenDTO;

    /**
     * Refresh access token
     *
     * @throws Throwable
     * @link https://partner.tiktokshop.com/doc/page/63fd743c715d622a338c4e5a#
     */
    public function refreshAccessToken(string $url, RefreshTokenRequestDTO $payload): AccessTokenDTO;
}
