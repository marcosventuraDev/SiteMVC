<?php
namespace Sts\Controllers;

//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
  /*  header("location: /"); */
  die("Erro: página não encontrada!");
}

class Erro
{
    /**
        * @var array|null|string Recebo os dados que devem ser enviados para a VIEW
     */
     private array|null|string $data;
     public function index()
     {
         $this->data = null;
       $loadView = new \Core\ConfigView("sts/Views/erro/erro.php", $this->data);
       $loadView->loadView();
     }
}