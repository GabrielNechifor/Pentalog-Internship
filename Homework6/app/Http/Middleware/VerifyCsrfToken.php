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
        'books/store/',
        'books/update/',

        'authors/store/',
        'authors/update/',

        'publishers/store/',
        'publishers/update/',

        'users/store/',
        'users/update/',

        'borrowings/store/',
        'borrowings/update/',
    ];
}
