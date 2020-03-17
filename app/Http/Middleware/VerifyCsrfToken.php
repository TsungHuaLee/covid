<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "/covid/signIn",
        "/covid/startQuestion",
        "/covid/nextQuestion",
        "/covid/preQuestion",
        "/covid/new_startQuestion",
    ];
}
