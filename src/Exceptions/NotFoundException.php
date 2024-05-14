<?php

namespace Zendrop\Tiktok\Exceptions;

use Zendrop\Tiktok\Http\Packs\HttpCode;
use Throwable;

class NotFoundException extends ClientException
{
    /**
     * @var string
     */
    protected $message = 'Resource not found';

    /**
     * @var int
     */
    protected $code = HttpCode::HTTP_NOT_FOUND->value;
}
