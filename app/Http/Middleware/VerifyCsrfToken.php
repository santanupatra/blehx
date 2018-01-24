<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/login','api/signup','api/signupotp','api/veriefyotp','api/product','api/addPost','api/postLike','api/comments','api/reports','api/search_pets','api/search_users','api/search_business','api/events/','api/events/*','api/search_events','api/websignup'

    ];
}
