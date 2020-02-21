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
            return view('objects.news.all', [
                'category' => DbUtils::getOneByParam($categories, 'id', $category_id),
                'news' => $news
            ]);
        else
            return redirect(route('objects.categories.all'));
    }

    public function get($id) {
        $item = DbUtils::getOneByParam($this->content, 'id', $id);
        if ($item)
            return view('objects.news.one', [
                'item' => $item
            ]);
        else
            return redirect(route('objects.categories.all'));
    }

    public function add() {
        $categories = (new CategoriesController($this->request))->content;

        if ($this->request->isMethod('post')) {
            $newItem = [
                "id" => $this->getNewId(),
                "category_id" => (int)$this->request->category_id,
                "title" => $this->request->title,
                "text" => $this->request->text,
                "isPrivate" => $this->request->is_private
            ];

            $this->addEntity($newItem);
        }

        return view('objects.news.add', [
            'categories' => $categories
        ]);
    }
}
