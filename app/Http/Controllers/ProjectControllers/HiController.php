<?php


namespace App\Http\Controllers\ProjectControllers;


use App\Http\Controllers\Controller;

class HiController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
