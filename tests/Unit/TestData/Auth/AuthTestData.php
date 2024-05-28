<?php

namespace Zendrop\Tiktok\Tests\Unit\TestData\Auth;

use JsonException;

final class AuthTestData
{
    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function item(): array
    {
        /** phpcs:disable Generic.Files.LineLength */
        $response = <<<JSON
{
    "access_token": "TTP_CDJt9QAAAABziHRTr2uuUk2eUCCIP0ZoNyloUaYCs7dxn1GyVXMbdztwlpEVpumsluj5yn5ylCvs_DhzIzfF7pl1jhZyZw08r6zWGI3ufVFlsyPxd8RHbxtXNmjmI1wroouGInhJg14QcCPy8j6WeEOKt5hBmQKNB67XyyPtWx9c5qfhKcQqTQ",
    "access_token_expire_in": 1717446312,
    "refresh_token": "TTP_1tIsIQAAAACLNZycucbIB5oTo02t_W4OwNoKUsNeTKnhefbu3UKlk95FSLWdT6ua81VtFDYHpWc",
    "refresh_token_expire_in": 1723370033,
    "open_id": "YskLLgAAAADfh9lMdVpq8llz8qkcVSQ7MVmDtsgZfS_oSBgB1ZqEOA",
    "seller_name": "Zendrop",
    "seller_base_region": "US",
    "user_type": 0,
    "granted_scopes": [
        "seller.product.basic",
        "seller.finance.info",
        "seller.global_product.delete",
        "seller.order.info",
        "seller.fulfillment.basic",
        "seller.global_product.category.info",
        "seller.product.write",
        "seller.promotion.info",
        "seller.fulfillment.package.write",
        "seller.return_refund.basic",
        "seller.delivery.status.write",
        "seller.promotion.write",
        "seller.authorization.info",
        "seller.logistics",
        "seller.global_product.info",
        "seller.global_product.write",
        "seller.shop.info",
        "seller.product.delete"
    ]
}
JSON;

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}
