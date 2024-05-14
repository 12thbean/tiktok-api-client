<?php

namespace Zendrop\Tiktok\Exceptions;

use Zendrop\Tiktok\Http\Packs\HttpCode;
use Throwable;

class InternalErrorException extends ClientException
{
    /**
     * @var string
     */
    protected $message = 'Internal error';

    /**
     * @var int
     */
    protected $code = HttpCode::HTTP_INTERNAL_SERVER_ERROR->value;
}
