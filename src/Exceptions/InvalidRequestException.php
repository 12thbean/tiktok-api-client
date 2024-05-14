<?php

namespace Zendrop\Tiktok\Exceptions;

use Zendrop\Tiktok\Http\Packs\HttpCode;
use Throwable;

class InvalidRequestException extends ClientException
{
    /**
     * @var string
     */
    protected $message = 'Invalid request';

    /**
     * @var int
     */
    protected $code = HttpCode::BAD_REQUEST->value;
}
