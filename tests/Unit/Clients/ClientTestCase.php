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
        'appKey' => '123',
        'appSecret' => '123',
        'shopId' => '123',
        'shopCipher' => 'TTP_PY-123',
        'accessToken' => '123-123-3aUQ',
        'apiVersion' => ApiVersion::V202401,
    ];
}