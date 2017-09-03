<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 02/09/17
 * Time: 15:09
 */

namespace SON\init;


abstract class Bootstrap
{

    private $routes;

    public function __construct()
    {

        $this->initRoutes();
        $this->run($this->getUrl());

    }

    /*
     * Carrega as rotas
    */
    abstract protected function initRoutes();

    /*
     * Seta as rotas
    */
    protected function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    /*
    * Pega a url
    */
    public function getUrl()
    {
        // Faz o parse da url digitada
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    }

    /*
     *  Executa as rotas
    */
    protected function run($url)
    {

        // array_walk — Aplica uma determinada funcão em cada elemento de um array, como se fosse um foreach
        array_walk($this->routes, function($route) use ($url) {

            // $route['route'] = '/' indice do array $routes
            if ($url == $route['route'])
            {

                // ucfirst transforma a primeira letra do arquivo da classe em maiuscula
                // transforma \App\Controllers\IndexController
                $class = "App\\Controllers\\".ucfirst($route['controller']);
                $controller = new $class;

                // recebe o metodo index
                $action = $route['action'];

                // chama o metodo index dentro de IndexController
                $controller->$action();

            }

        });

    }

}