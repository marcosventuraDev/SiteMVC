<?php

namespace Sts\Controllers;

//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
  /*  header("location: /"); */
  die("Erro: página não encontrada!");
}

class Contato
{
    /** @var array Recebo os dados que devem ser enviados para a VIEW */
    private array|null|string $data = null;
    private array|string|null $dataForm;
    public function index()
    {
      //recebendo dados do formulário
      $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      if(!empty($this->dataForm['AddContMsg'])){


        $createContactMsg = new \Sts\Models\StsContato();
        if($createContactMsg->create($this->dataForm)){
          echo "<p style='color:green'>Cadastrado com Sucesso! </p>";
        
        }else{
          echo "Não cadastrado Cadastrado <br>";
          
          $this->data['form'] = $this->dataForm;          
        }
      }

      $loadView = new \Core\ConfigView("sts/Views/contato/contato.php", $this->data);
      $loadView->loadView();
    }
}