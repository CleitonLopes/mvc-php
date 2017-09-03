<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 02/09/17
 * Time: 17:38
 */

namespace App;


class Conn extends \PDO
{

    public static function getDb()
    {
        return new \PDO('mysql:host=localhost;dbname=mvc', 'root', 'c415263');
    }
}