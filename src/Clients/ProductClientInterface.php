<?php

namespace Zendrop\Tiktok\Clients;

use Zendrop\Tiktok\DTO\Products\CreateProductDTO;
use Zendrop\Tiktok\DTO\Products\ProductDTO;
use Zendrop\Tiktok\DTO\Products\UpdateProductDTO;

interface ProductClientInterface
{
    /**
     * Returns a list of products.
     *
     * @param int $pageSize
     * @return ProductDTO[]
     *
     * @throws \JsonException
     * @throws \Zendrop\Tiktok\Exceptions\ClientException
     */
    public function getList(int $pageSize = 25): array;

    /**
     * Returns a product by id.
     *
     * @param string $id
     * @return ProductDTO
     *
     * @throws \JsonException
     * @throws \Zendrop\Tiktok\Exceptions\ClientException
     */
    public function getById(string $id): ProductDTO;

    /**
     * Creates a product.
     *
     * @param CreateProductDTO $payload
     * @return ProductDTO
     *
     * @throws \JsonException
     * @throws \Zendrop\Tiktok\Exceptions\ClientException
     */
    public function create(CreateProductDTO $payload): ProductDTO;

    /**
     * Updates a product by id.
     *
     * @param string $id
     * @param UpdateProductDTO $payload
     * @return ProductDTO
     *
     * @throws \JsonException
     * @throws \Zendrop\Tiktok\Exceptions\ClientException
     */
    public function update(string $id, UpdateProductDTO $payload): ProductDTO;

    /**
     * Deletes a product by id.
     *
     * @param string $id
     * @return bool
     *
     * @throws \JsonException
     * @throws \Zendrop\Tiktok\Exceptions\ClientException
     */
    public function delete(string $id): bool;
}
