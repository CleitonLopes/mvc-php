<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 03/09/17
 * Time: 11:27
 */

namespace SON\DI;


use App\Conn;

class Container
{

    // retorna a classe injentando a conexão como dependencia
    public static function getModel($model)
    {

        $class = "\\App\\Models\\".ucfirst($model);
        return new $class(Conn::getDb());
        
    }

}