<?php


namespace App\Http\Controllers\ProjectControllers;


use App\Http\Controllers\Controller;
use App\Resource;

class ResourceController extends Controller
{
    public function index() {
        return view('objects.resources.index', ['resources' => Resource::all()]);
    }

    public function store() {
        $resource = new Resource();
        $resource->fill($this->request->all());
        $resource->save();

        return view('objects.resources.index', ['resources' => Resource::all()]);
    }

    public function destroy(Resource $resource) {
        $resource->delete();

        return view('objects.resources.index', ['resources' => Resource::all()]);
    }
}
