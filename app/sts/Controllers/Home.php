<?php
namespace Sts\Controllers;

//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
  /*  header("location: /"); */
  die("Erro: página não encontrada!");
}

class Home
{

    /** @var array Recebo os dados que devem ser enviados para a VIEW */
    private array $data;
    public function index()
    {
        $this->data = [];
      $loadView = new \Core\ConfigView("sts/Views/home/home.php", $this->data);
      $loadView->loadView();
    }
}