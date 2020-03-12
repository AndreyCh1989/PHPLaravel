<?php

namespace App\Http\Controllers\ProjectControllers\ExternalNews\Providers;

use App\Category;
use App\Http\Controllers\ProjectControllers\ExternalNews\NewsProviderController;
use App\News;

class TechworldProviderController extends NewsProviderController
{
    protected $url = 'https://www.techworld.com/news/rss';

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
