<?php

namespace Zendrop\Tiktok\Clients;

use Zendrop\Tiktok\DTO\Products\ProductDTO;

interface ProductClientInterface
{
    /**
     * @param int $pageSize
     * @return ProductDTO[]
     * @throws \JsonException
     * @throws \Zendrop\Tiktok\Exceptions\ClientException
     */
    public function getList(int $pageSize = 25): array;
}
