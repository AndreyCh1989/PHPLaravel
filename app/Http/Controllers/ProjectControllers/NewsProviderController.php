<?php

namespace App\Http\Controllers\ProjectControllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\News;
use App\Resource;
use App\Services\XMLParserService;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsProviderController extends Controller
{
    public function fetch() {
        foreach (Resource::all() as $resource) {
            NewsParsing::dispatch($resource->url);
        }

        return redirect()->route('categories');
    }
}
