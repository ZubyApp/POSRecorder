<?php

declare(strict_types = 1);

namespace App\Attributes;

use App\Contracts\RouteInterface;
use Attribute;
use App\Enums\HttpMethod;

#[Attribute]

class Route implements RouteInterface
{
    public function __construct(public string $routePath, public HttpMethod $method = HttpMethod::Get)
    {
        
    }
}