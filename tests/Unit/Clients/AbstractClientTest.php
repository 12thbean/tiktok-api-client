<?php

namespace Zendrop\Tiktok\Tests\Unit\Clients;

use Illuminate\Support\Facades\Http;
use Throwable;
use Zendrop\Tiktok\Clients\ProductClient;
use Zendrop\Tiktok\Clients\ProductClientInterface;

class AbstractClientTest extends ClientTestCase
{
    /**
     * @dataProvider Zendrop\Tiktok\Tests\Unit\DataProvider\ErrorResponseDataProvider::responses
     *
     * @param array<string, mixed>|null $body
     * @param int $status
     * @param string $expectedException
     * @return void
     */
    public function testClientExceptions(?array $body, int $status, string $expectedException): void
    {
        /** @var ProductClientInterface $productClient */
        $productClient = new ProductClient(...$this->clientData);

        $sequenceBuilder = Http::fakeSequence();
        $sequenceBuilder->push(body: $body, status: $status);
        try {
            $productClient->getList();
        } catch (Throwable $exception) {
            $this->assertInstanceOf($expectedException, $exception);
        }
    }
}
