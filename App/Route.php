<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 02/09/17
 * Time: 14:09
 */

namespace App;


use SON\init\Bootstrap;

// Herança de todos os metodos da classe pai Bootstrap
class Route extends Bootstrap
{

    /*
     * Carrega as rotas
    */
    protected function initRoutes()
    {

        $routes['home'] = array('route' => '/', 'controller' => 'indexController', 'action' => 'index');
        $routes['contact'] = array('route' => '/contact', 'controller' => 'indexController', 'action' => 'contact');

        $this->setRoutes($routes);


    }

}