<?php


namespace App\Http\Controllers\ProjectControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function get() {
        return view('objects.categories.all', ['categories' => DB::table('categories')->get()]);
    }
}
