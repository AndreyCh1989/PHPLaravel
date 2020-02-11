<?php


namespace App\Http\Controllers\ProjectControllers;

use App\Db\Db;

class NewsController
{
    public function getByCategory($category_id) {
        return view('news', [
            'category' => Db::getCategoryById($category_id),
            'news' => Db::getNewsByCategoryId($category_id)
        ]);
    }

    public function get($id) {
        return view('newsOne', [
            'news' => Db::getNewsyById($id)
        ]);
    }
}
