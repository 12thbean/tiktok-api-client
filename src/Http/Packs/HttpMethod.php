<?php

namespace Zendrop\Tiktok\Http\Packs;

enum HttpMethod: string
{
    case Get = 'get';
    case Post = 'post';
    case Patch = 'patch';
    case Put = 'put';
    case Delete = 'delete';
}
