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
        //URL do projeto
        define('URL', 'http://localhost/sistemvc/');
        define('URLADM', 'HTTP://localhost/sistemvc/adm');
        define('CONTROLLER', 'Home');
        define('CONTROLLERERRO', 'Erro');
       

        //Credenciais do banco de dados 
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'sitemvc');
        define('PORT', '127.0.0.1');
       

        define('EMAILADM', 'marcosventura.dev@gmail.com');

    }
}