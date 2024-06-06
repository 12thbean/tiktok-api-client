<?php

namespace Zendrop\Tiktok\Tests\Unit\Clients;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Zendrop\Tiktok\Clients\AuthClient;
use Zendrop\Tiktok\Clients\AuthClientInterface;
use Zendrop\Tiktok\DTO\Auth\AccessTokenRequestDTO;
use Zendrop\Data\ToArrayCase;
use Zendrop\Tiktok\DTO\Auth\RefreshTokenRequestDTO;
use Zendrop\Tiktok\Tests\Unit\TestData\Auth\AuthTestData;

class AuthClientTest extends ClientTestCase
{
    private AuthClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new AuthClient(...$this->clientData);
    }


    public function testGetAccessToken(): void
    {
        $expectedData = AuthTestData::item();

        $payload = new AccessTokenRequestDTO(
            appKey: 'fake_key',
            appSecret: 'fake_secret',
            authCode: 'fake_code',
            grantType: 'authorized_code',
        );

        Http::fake([
            '*/api/v2/token/get*' => Http::response($expectedData),
        ]);

        $accessToken = $this->client->getAccessToken('fake_url/api/v2/token/get', $payload);
        $accessTokenArray = $accessToken->toArray(ToArrayCase::Camel);

        $this->assertCount(count($expectedData), $accessTokenArray);
        foreach ($expectedData as $key => $value) {
            $this->assertEquals($value, $accessTokenArray[Str::camel($key)]);
        }
    }

    public function testGetRefreshToken(): void
    {
        $expectedData = AuthTestData::item();

        $payload = new RefreshTokenRequestDTO(
            appKey: 'fake_key',
            appSecret: 'fake_secret',
            refreshToken: 'fake_code',
            grantType: 'authorized_code',
        );

        Http::fake([
            '*/api/v2/token/refresh*' => Http::response($expectedData),
        ]);

        $accessToken = $this->client->refreshAccessToken('fake_url/api/v2/token/refresh', $payload);
        $accessTokenArray = $accessToken->toArray(ToArrayCase::Camel);

        $this->assertCount(count($expectedData), $accessTokenArray);
        foreach ($expectedData as $key => $value) {
            $this->assertEquals($value, $accessTokenArray[Str::camel($key)]);
        }
    }
}
