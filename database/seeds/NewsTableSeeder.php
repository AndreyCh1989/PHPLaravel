<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->delete();
        $categoriesIds = DB::table('categories')->pluck('id')->toArray();
        $faker = Faker\Factory::create();
        $news = [];

        for ($i=0; $i<20; $i++) {
            $news[] = [
                'category_id' => $faker->randomElement($categoriesIds),
                'title' => $faker->realText(rand(20, 50)),
                'text' => $faker->text($maxNbChars = 2000),
            ];
        }
        DB::table('news')->insert($news);
    }
}
