<?php

namespace Zendrop\Tiktok\Exceptions;

use Zendrop\Tiktok\Http\Packs\HttpCode;

class ServiceUnavailableException extends ClientException
{
    /**
     * @var string
     */
    protected $message = 'Service unavailable';

    /**
     * @var int
     */
    protected $code = HttpCode::HTTP_SERVICE_UNAVAILABLE->value;
}
