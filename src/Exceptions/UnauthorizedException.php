<?php

namespace Zendrop\Tiktok\Exceptions;

use Zendrop\Tiktok\Http\Packs\HttpCode;

class UnauthorizedException extends ClientException
{
    /**
     * @var string
     */
    protected $message = 'Unauthorized request';

    /**
     * @var int
     */
    protected $code = HttpCode::HTTP_UNAUTHORIZED->value;
}
