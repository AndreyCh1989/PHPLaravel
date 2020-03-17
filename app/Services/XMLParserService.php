<?php


namespace App\Services;


use App\Category;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($url) {
        $xml = XmlParser::load($url);
        $this->save($xml);
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
