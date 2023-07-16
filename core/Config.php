<?php

namespace Core;

//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
    /*  header("location: /"); */
    die("Erro: página não encontrada!");
 }
 

abstract class Config
{
    protected function config(): void
    {
        define('URL', 'http://localhost/sistemvc/');
        define('URLADM', 'HTTP://localhost/sistemvc/adm');

        define('CONTROLLER', 'Home');
        define('CONTROLLERERRO', 'Erro');


        define('EMAILADM', 'marcosventura.dev@gmail.com');
        

    }
}