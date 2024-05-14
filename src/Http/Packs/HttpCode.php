<?php

namespace Zendrop\Tiktok\Http\Packs;

enum HttpCode: int
{
    case HTTP_OK = 200;
    case HTTP_NO_CONTENT = 204;
    case BAD_REQUEST = 400;
    case HTTP_UNAUTHORIZED = 401;
    case HTTP_METHOD_NOT_ALLOWED = 405;
    case HTTP_FORBIDDEN = 403;
    case HTTP_NOT_FOUND = 404;
    case HTTP_CONFLICT_REQUEST = 409;
    case HTTP_VALIDATION_ERROR = 422;
    case HTTP_INTERNAL_SERVER_ERROR = 500;
    case HTTP_SERVICE_UNAVAILABLE = 503;
    case HTTP_VERSION_NOT_SUPPORTED = 504;
}
