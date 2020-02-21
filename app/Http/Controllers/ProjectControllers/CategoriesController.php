<?php


namespace App\Http\Controllers\ProjectControllers;

use App\Http\Controllers\FileController;

class CategoriesController extends FileController
{
    protected $path = "db/categories.json";

    public function get() {
        return view('categories', ['categories' => $this->content]);
    }
}
