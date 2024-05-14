<?php

namespace Zendrop\Tiktok\Exceptions;

use Zendrop\Tiktok\Http\Packs\HttpCode;

class UnexpectedResponseException extends ClientException
{
    /**
     * @var string
     */
    protected $message = 'Unexpected response from Tiktok API.';

    /**
     * @var int
     */
    protected $code = HttpCode::HTTP_INTERNAL_SERVER_ERROR->value;
}
