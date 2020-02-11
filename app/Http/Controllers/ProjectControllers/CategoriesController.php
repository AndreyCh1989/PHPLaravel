<?php


namespace App\Http\Controllers\ProjectControllers;

use App\Db\Db;

class CategoriesController
{
    public function get() {
        return view('categories', ['categories' => Db::$categories]);
    }
}
