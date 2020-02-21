<?php


namespace App\Utils;

class DbUtils {
    public static function getAllByParam($array, $key, $value) {
        return array_filter(
            $array,
            function ($k, $v) use ($key, $value) {
                return $k[$key] == $value;
            }
            ,ARRAY_FILTER_USE_BOTH
        );
    }

    public static function getOneByParam($array, $key, $value) {
        $result = self::getAllByParam($array, $key, $value);

        if (count($result)) {
            return array_pop($result);
        } else {
            return null;
        }
    }
}
