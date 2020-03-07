<?php


namespace App\Http\Controllers\ProjectControllers;

use App\Category;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function get() {
        return view('objects.categories.all', ['categories' => Category::all()]);
    }
}
