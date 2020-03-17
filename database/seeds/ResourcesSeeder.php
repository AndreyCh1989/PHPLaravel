<?php

use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->delete();

        DB::table('resources')->insert([
            ['url' => 'https://news.yandex.ru/auto.rss'],
            ['url' => 'https://news.yandex.ru/auto_racing.rss'],
            ['url' => 'https://news.yandex.ru/army.rss'],
            ['url' => 'https://news.yandex.ru/basketball.rss'],
            ['url' => 'https://news.yandex.ru/biathlon.rss'],
            ['url' => 'https://news.yandex.ru/world.rss'],
            ['url' => 'https://www.nasa.gov/rss/dyn/breaking_news.rss'],
            ['url' => 'https://www.techworld.com/news/rss'],
        ]);
    }
}
