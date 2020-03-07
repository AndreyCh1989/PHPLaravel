<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = ['category_id', 'is_private', 'text', 'title'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }
}
