<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class FileController extends Controller
{
    protected $path;
    protected $content;
    protected $fullPath;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->fullPath = base_path(config('app.file_storage') . $this->path);

        $jsonString = file_get_contents($this->fullPath);
        $this->content = json_decode($jsonString, true);
    }

    public function getNewId() {
        return max(
            array_map(function($o) {
                return $o['id'];
            },
            $this->content)) + 1;
    }

    public function addEntity($entity) {
        $jsonString = file_get_contents(base_path(config('app.file_storage') . $this->path));
        $this->content = json_decode($jsonString, true);

        array_push($this->content, $entity);
        $jsonData = json_encode($this->content);
        file_put_contents($this->fullPath, $jsonData);
    }
}
