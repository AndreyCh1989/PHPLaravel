<?php

namespace App\Http\Controllers\ProjectControllers\ExternalNews;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

abstract class NewsProviderController extends Controller
{
    protected $url;

    public function fetch() {
        $xml = XmlParser::load($this->url);
        $this->save($xml);

        return redirect()->route('categories');
    }

    protected function parse($xml) {
        return $xml->parse([
            'category' => ['uses' => 'channel.title'],
            'news' => ['uses' => 'channel.item[title,description]'],
        ]);
    }

    protected function save($xml)
    {
        $result = $this->parse($xml);

        $category = Category::where('name', $result['category'])->first();
        if (!$category) {
            $category = new Category();
            $category->name = $result['category'];
            $category->save();
        }

        News::where('category_id', $category->id)->delete();

        foreach ($result['news'] as $item) {
            if (!isset($item['description'])) continue;

            $news = new News();
            $news->category_id = $category->id;
            $news->title = $item['title'];
            $news->text = $item['description'];
            $news->save();
        }
    }
}
