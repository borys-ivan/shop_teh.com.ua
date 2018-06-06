<?php

require_once '/template/php/ez_sql_core.php';
require_once '/template/php/ez_sql_mysqli.php';

class Db
{

    public static function dbConnect()
    {


        $db = new ezSQL_mysqli('root', '', 'shop', 'localhost');

        return $db;
    }

}