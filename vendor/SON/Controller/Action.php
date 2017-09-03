<?php
/**
 * Created by PhpStorm.
 * User: cleiton
 * Date: 02/09/17
 * Time: 16:42
 */

namespace SON\Controller;


abstract class Action
{
    protected $view;
    private $action;

    public function __construct()
    {

        $this->view = new \stdClass();

    }

    protected function render($action, $layout = true)
    {

        $this->action = $action;

        // Pega o layout por padrão chamando o layout e no layout chamando o metodo this->content
        if ($layout == true && file_exists("../App/Views/layout.phtml"))
        {
            include_once "../App/Views/layout.phtml";
        }
        // Se não ele apenas chama o metodo this->content sem passar pelo layout
        else
        {

            $this->content();
        }

    }

    protected function content()
    {


        // get_class = Retorna o nome da classe de um objeto, App\Controllers\IndexController
        $current = get_class($this);

        /*
         * 1 - str_replace("App\\Controllers\\", "", $current) -> IndexController
         * 2 - str_replace("Controller", "") -> Index
         * 3 - strtolower(Index) -> index
        */
        $singleClassName = strtolower((str_replace("Controller", "", str_replace("App\\Controllers\\", "", $current))));

        include_once "../App/Views/".$singleClassName."/".$this->action.".phtml";

    }


    
}