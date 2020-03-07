<?php


namespace App\Http\Controllers\ProjectControllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    protected $table = "news";

    public function getByCategory(Category $category) {
        $news = $category->news()->paginate(5);

        if ($news)
            return view('objects.news.all_by_category', [
                'category' => $category,
                'news' => $news
            ]);
        else
            return redirect(route('categories'));
    }

    public function all() {
        return view('objects.news.all', ['news' => News::paginate(10)]);
    }

    public function show(News $news) {
        if ($news)
            return view('objects.news.one', [
                'item' => $news
            ]);
        else
            return redirect(route('categories'));
    }

    public function store() {
        $news = new News();
        $news->fill($this->request->all());
        $news->save();

        $message = "\"" . $this->request->get('title') . "\" was added";
        return redirect()->route('news.create', ['categories' => Category::all()])->with('message',  $message);
    }

    public function create() {
        return view('objects.news.add', ['categories' => Category::all()]);
    }

    public function edit(News $news) {
        return view('objects.news.add', [
            'categories' => Category::all(),
            'news' => $news,
            'category_id' => $news->category()->id
        ]);
    }

    public function update(News $news) {
        $news->fill($this->request->all());
        $news->save();

        $message = "\"" . $this->request->get('title') . "\" has been updated";
        return redirect()->route('news.edit', [
            'categories' => Category::all(),
            'news' => $news,
            'category_id' => $news->category()->id
        ])->with('message',  $message);
    }

    public function destroy(News $news) {
        $news->delete();

        $message = "\"" . $news->title . "\" has been successfully deleted";
        return redirect()->route('news.all')->with('message',  $message);
    }
}
