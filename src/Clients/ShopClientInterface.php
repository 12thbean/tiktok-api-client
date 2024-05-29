<?php

namespace Zendrop\Tiktok\Clients;

use JsonException;
use Zendrop\Tiktok\DTO\Shop\AuthorizedShopDTO;
use Zendrop\Tiktok\Exceptions\ClientException;

interface ShopClientInterface
{
    /**
     * Returns a list of authorized shops.
     *
     * @return AuthorizedShopDTO[]
     *
     * @throws JsonException
     * @throws ClientException
     * @link https://partner.tiktokshop.com/docv2/page/6507ead7b99d5302be949ba9?external_id=6507ead7b99d5302be949ba9#
     */
    public function getAuthorizedShopList(): array;
}
