<?php

namespace Sts\Models;
//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
    /*  header("location: /"); */
    die("Erro: página não encontrada!");
 }

class StsContato
{
    private array $data;
   public function create(array $data) :bool
   {
    $this->data = $data;

    var_dump($this->data);
    $_SESSION['msg'] = "<p style='color:green'>Salvar mensagem</p>";
    return true;

   }

}