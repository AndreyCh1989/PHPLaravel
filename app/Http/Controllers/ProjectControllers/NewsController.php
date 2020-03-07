<?php


namespace App\Http\Controllers\ProjectControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    protected $table = "news";

    public function getByCategory($category_id) {
        $news = DB::table('news')->where('category_id', $category_id)->get();

        if ($news)
            return view('objects.news.all', [
                'category' => DB::table('categories')->find($category_id),
                'news' => $news
            ]);
        else
            return redirect(route('categories'));
    }

    public function get($id) {
        $item = DB::table('news')->find($id);
        if ($item)
            return view('objects.news.one', [
                'item' => $item
            ]);
        else
            return redirect(route('categories'));
    }

    public function add() {
        if ($this->request->isMethod('post')) {
            $newItem = [
                "category_id" => (int)$this->request->category_id,
                "title" => $this->request->title,
                "text" => $this->request->text,
                "is_private" =>  isset($this->request->is_private)
            ];

            $this->request->flash('title');
            DB::table('news')->insert($newItem);
        }

        return view('objects.news.add', [
            'categories' => DB::table('categories')->get()
        ]);
    }
}
