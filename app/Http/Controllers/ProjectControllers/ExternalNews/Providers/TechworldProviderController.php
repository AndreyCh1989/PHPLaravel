<?php

namespace App\Http\Controllers\ProjectControllers\ExternalNews\Providers;

use App\Http\Controllers\ProjectControllers\ExternalNews\NewsProviderController;

class TechworldProviderController extends NewsProviderController
{
    protected $url = 'https://www.techworld.com/news/rss';
}
