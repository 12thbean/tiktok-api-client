<?php

namespace Zendrop\Tiktok\Clients;

use Zendrop\Tiktok\DTO\Products\CreateProductDTO;
use Zendrop\Tiktok\DTO\Products\ProductDTO;
use Zendrop\Tiktok\DTO\Products\UpdateProductDTO;
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

        $productIds = array_reduce($response->json()['data']['products'], static function ($ids, $item) {
            $ids[] = $item['id'];
            return $ids;
        }, []);

        $list = [];
        foreach ($productIds as $id) {
            $list[] = $this->getById($id);
        }

        return $list;
    }

    /**
     * {@inheritDoc}
     */
    public function getById(string $id): ProductDTO
    {
        $response = $this->sendRequest(
            routeGroup: 'product',
            resource: "products/{$id}",
            apiVersion: ApiVersion::V202309,
        );

        return ProductDTO::fromResponse($response->json()['data']);
    }

    /**
     * {@inheritDoc}
     */
    public function create(CreateProductDTO $payload): ProductDTO
    {
        $response = $this->sendRequest(
            routeGroup: 'product',
            resource: 'products',
            method: HttpMethod::Post,
            payload: $payload->toArray(),
            apiVersion: ApiVersion::V202309,
        );

        $productId = $response->json()['data']['product_id'];
        return $this->getById($productId);
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $id, UpdateProductDTO $payload): ProductDTO
    {
        $response = $this->sendRequest(
            routeGroup: 'product',
            resource: "products/{$id}",
            method: HttpMethod::Put,
            payload: $payload->toArray(),
            apiVersion: ApiVersion::V202309,
        );

        $productId = $response->json()['data']['product_id'];
        return $this->getById($productId);
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $id): bool
    {
        $this->sendRequest(
            routeGroup: 'product',
            resource: 'products',
            method: HttpMethod::Delete,
            payload: [
                'product_ids' => [$id],
            ],
            apiVersion: ApiVersion::V202309,
        );

        return true;
    }
}
