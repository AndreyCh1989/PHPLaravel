<?php


namespace App\Http\Controllers\ProjectControllers;

use App\Db\Db;

class NewsController
{
    public function getByCategory($category_id) {
        $news = Db::getNewsByCategoryId($category_id);
        if ($news)
            return view('news', [
                'category' => Db::getCategoryById($category_id),
                'news' => $news
            ]);
        else
            return redirect(route('categories'));
    }

    public function get($id) {
        $item = Db::getNewsyById($id);
        if ($item)
            return view('newsOne', [
                'item' => Db::getNewsyById($id)
            ]);
        else
            return redirect(route('categories'));
    }
}
