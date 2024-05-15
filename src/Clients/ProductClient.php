<?php

namespace Zendrop\Tiktok\Clients;

use Zendrop\Tiktok\DTO\Products\ProductDTO;
use Zendrop\Tiktok\Enum\ApiVersion;
use Zendrop\Tiktok\Http\Packs\HttpMethod;

class ProductClient extends AbstractClient implements ProductClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(int $pageSize = 25): array
    {
        $response = $this->sendRequest(
            routeGroup: 'product',
            resource: 'products/search',
            method: HttpMethod::Post,
            payload: [
                'page_size' => $pageSize,
            ],
            apiVersion: ApiVersion::V202312,
        );

        return ProductDTO::arrayFromResponse($response->json()['data']['products']);
    }
}
