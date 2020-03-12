<?php

namespace App\Http\Controllers\ProjectControllers\ExternalNews;

use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

abstract class NewsProviderController extends Controller
{
    protected $url;

    protected abstract function save($xml);

    public function fetch() {
        $xml = XmlParser::load($this->url);
        $this->save($xml);

        return redirect()->route('categories');
    }
}
