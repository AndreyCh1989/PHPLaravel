<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function () {
    DB::table('news')->delete();
    $categoriesIds = DB::table('categories')->pluck('id')->toArray();
    $faker = \Faker\Factory::create('us_US');

    return [
        'category_id' => $faker->randomElement($categoriesIds),
        'title' => $faker->realText(rand(20, 50)),
        'text' => $faker->text($maxNbChars = 2000),
    ];
});
