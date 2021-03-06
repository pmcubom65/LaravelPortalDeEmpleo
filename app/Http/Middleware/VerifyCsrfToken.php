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
    protected $except_urls = [
        '/home',
        'http://res.cloudinary.com/hoif30pep/*',
        'homeput',
        'home',
        'http://pedro-manuel-cubo-laravelvue.herokuapp.com/home'
    ];

  
}
