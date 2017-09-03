<?php

namespace App\Controllers;

use SON\Controller\Action;
use SON\DI\Container;

class IndexController extends Action
{

    // O diretório atula que ele está configurando é o index dentro de public e não esse dentro de Controllers
    // por isso ao buscar o caminho das views é considerado a partir de la
    public function index()
    {

        // Busca o metodo estatico no container passando o model como parametro
        $client = Container::getModel("client");

        $this->view->clients = $client->listAll();

        $this->render('index');

    }

    public function contact()
    {

        $client = Container::getModel("client");

        $this->view->client = $client->find(2);

        $this->render('contact', false);

    }


}