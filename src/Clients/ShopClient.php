<?php

namespace Zendrop\Tiktok\Clients;

use Zendrop\Tiktok\DTO\Shop\AuthorizedShopDTO;
use Zendrop\Tiktok\Enum\ApiVersion;

class ShopClient extends AbstractClient implements ShopClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAuthorizedShopList(): array
    {
        $response = $this->sendRequest(
            routeGroup: 'authorization',
            resource: 'shops',
            apiVersion: ApiVersion::V202309,
        );

        return AuthorizedShopDTO::arrayFrom($response->json()['data']['shops']);
    }
}
