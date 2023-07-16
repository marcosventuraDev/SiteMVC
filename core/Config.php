<?php

namespace Core;


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