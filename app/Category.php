<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = ['Name'];

    public function news() {
        return $this->hasMany(News::class, 'category_id');
    }
}
