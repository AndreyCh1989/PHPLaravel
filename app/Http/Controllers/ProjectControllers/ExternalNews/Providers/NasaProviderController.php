<?php

namespace App\Http\Controllers\ProjectControllers\ExternalNews\Providers;

use App\Http\Controllers\ProjectControllers\ExternalNews\NewsProviderController;

class NasaProviderController extends NewsProviderController
{
    protected $url = 'https://www.nasa.gov/rss/dyn/breaking_news.rss';
}
