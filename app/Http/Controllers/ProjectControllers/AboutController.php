<?php


namespace App\Http\Controllers\ProjectControllers;


use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function get()
    {
        return view('about');
    }
}
