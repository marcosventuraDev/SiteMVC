<?php

namespace Sts\Models;
//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
    /*  header("location: /"); */
    die("Erro: página não encontrada!");
 }

class StsHome
{
    private array $data;
    public function index():array
    {
        $this->data = [
            "title" => "Topo da pagina",
            "description" => "Descrição do serviço"
        ];
      
        return $this->data;
            
    }

}