<?php

namespace Framework\Eloquent;

class Model
{
    public static string $tableName = "table_name";
    private static string $filePath = "../db.json";

    /**
     * @return mixed
     */
    public static function all (): mixed
    {
        $db = (array)json_decode(file_get_contents(self::$filePath));
        $table = $db[static::$tableName];
        return $table;
    }

    /**
     * @param $data
     * @return string|null
     */
    public static function create ($data): ?string
    {
        $db = (array)json_decode(file_get_contents(self::$filePath));
        $db[static::$tableName][] = $data;
        if (!file_put_contents(self::$filePath, json_encode($db))) {
            return "success";
        } else {
            return null;
        }
    }
}