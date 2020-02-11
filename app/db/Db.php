<?php


namespace App\Db;

class Db {
    public static $categories = [
        [
            'id' => 0,
            'name' => 'Sport'
        ],
        [
            'id' => 1,
            'name' => 'Business'
        ],
        [
            'id' => 2,
            'name' => 'World'
        ],
        [
            'id' => 3,
            'name' => 'Science'
        ],
    ];

    public static $news = [
        [
            'id' => 0,
            'category_id' => 0,
            'title' => 'Sport news one',
            'text' => 'Some text about Sport news 1'
        ],
        [
            'id' => 1,
            'category_id' => 0,
            'title' => 'Sport news two',
            'text' => 'Some text about Sport news 2'
        ],
        [
            'id' => 2,
            'category_id' => 1,
            'title' => 'Business news one',
            'text' => 'Some text about Business news 1'
        ],
        [
            'id' => 3,
            'category_id' => 2,
            'title' => 'World news one',
            'text' => 'Some text about World news 1'
        ],
        [
            'id' => 4,
            'category_id' => 2,
            'title' => 'World news two',
            'text' => 'Some text about World news 2'
        ],
        [
            'id' => 5,
            'category_id' => 2,
            'title' => 'World news three',
            'text' => 'Some text about World news 3'
        ],
        [
            'id' => 6,
            'category_id' => 3,
            'title' => 'Science news one',
            'text' => 'Some text about Science news 2'
        ],
        [
            'id' => 7,
            'category_id' => 3,
            'title' => 'Science news two',
            'text' => 'Some text about Science news 3'
        ],
    ];

    public static function getCategoryById($id) {
        $result =  array_filter(
            self::$categories,
            function ($k, $v) use ($id) {
                return $k['id'] == $id;
            }
            ,ARRAY_FILTER_USE_BOTH
        );

        if (count($result)) {
            return array_pop($result);
        } else {
            return null;
        }
    }

    public static function getNewsByCategoryId($id) {
        return array_filter(
            self::$news,
            function ($k, $v) use ($id) {
                return $k['category_id'] == $id;
            }
            ,ARRAY_FILTER_USE_BOTH
        );
    }

    public static function getNewsyById($id) {
        $result =  array_filter(
            self::$news,
            function ($k, $v) use ($id) {
                return $k['id'] == $id;
            }
            ,ARRAY_FILTER_USE_BOTH
        );

        if (count($result) > 0) {
            return array_pop($result);
        } else {
            return null;
        }
    }
}
