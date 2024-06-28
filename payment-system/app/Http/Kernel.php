<?php 
// app/Http/Kernel.php

namespace app\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        \Illuminate\Auth\Middleware\Authenticate::class,
        \app\Http\Middleware\CheckRole::class,
        // ...
    ];

    protected $routeMiddleware = [
        // ...
        'role' => \app\Http\Middleware\CheckRole::class,
    ];
}