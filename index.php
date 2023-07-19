<?php

session_start(); //iniciar a sessão
ob_start();//Elimina os dados do Bufer de saída


//Constante que define que o usuário está acessando páginas internas através da página "index.php".

define('M4RC05V3', true);

use Core\ConfigController;

//Carregar o composer
    require "./vendor/autoload.php";


//Instanciar a classe ConfigController, responsável em tratar a URL
        $url= new Core\ConfigController;
        $url->loadPage();

