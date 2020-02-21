<?php


namespace App\Http\Controllers\ProjectControllers;

use App\Utils\DbUtils;
use App\Http\Controllers\FileController;

class NewsController extends FileController
{
    protected $path = "db/news.json";

    public function getByCategory($category_id) {
        $news = DbUtils::getAllByParam($this->content, 'category_id', $category_id);
        $categories = (new CategoriesController($this->request))->content;

        if ($news)
            return view('news', [
                'category' => DbUtils::getOneByParam($categories, 'id', $category_id),
                'news' => $news
            ]);
        else
            return redirect(route('categories'));
    }

    public function get($id) {
        $item = DbUtils::getOneByParam($this->content, 'id', $id);
        if ($item)
            return view('newsOne', [
                'item' => $item
            ]);
        else
            return redirect(route('categories'));
    }

    public function add() {
        if ($this->request->isMethod('post')) {
            dump($this->request);
            die();
        } else {
            return view('');
        }
    }
}
