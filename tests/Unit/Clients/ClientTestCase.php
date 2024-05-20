<?php

namespace Zendrop\Tiktok\Tests\Unit\Clients;

use Zendrop\Tiktok\Enum\ApiVersion;
use Zendrop\Tiktok\Tests\Unit\TestCase;

abstract class ClientTestCase extends TestCase
{
    /**
     * @var array<string, string>
     */
    protected array $clientData = [
        'appKey' => '6ape2qjqp3fnc',
        'appSecret' => '69f94281ce0eefa7e7ec9a29467ceac07dc478da',
        'shopId' => '7495451935961353215',
        'shopCipher' => 'TTP_PY-_6gAAAABqfvPkouvkgjUgXnivXrej',
        'accessToken' => 'TTP_BYP-lwAAAABziHRTr2uuUk2eUCCIP0ZoNyloUaYCs7dxn1GyVXMbdztwlpEVpumsluj5yn5ylCvs_DhzIzfF7pl1jhZyZw08r6zWGI3ufVFlsyPxd8RHb1okmKCGX9zxsFirsMdpBi-HTUik_SfTdiYU-tOckIIS6XVLjcWIKg0NVNXHV5KCPw',
        'apiVersion' => ApiVersion::V202401,
    ];
}
