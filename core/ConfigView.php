<?php

namespace Core;

//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
  /*  header("location: /"); */
  die("Erro: página não encontrada!");
}


/**
 * Undocumented class
 */
class ConfigView
{
   

    /**
     * Receber o endereço da VIEW e os dados.
     *      *
     * @param string $nameView Endereço da VIEW que deve ser carregada
     * @param array|null|string  $data Dados que a VIEW deve receber.
     */
    public function __construct(private string $nameView, private array|null|string $data)
    {
      
      
    }
    

    /**
     * Carregar a View.
     * Verificar se o arquivo existe, e carregar caso exista, não existindo acaba com o carregamento
     *
     * @return void
     */
    public function loadView(): void
    {
        if(file_exists("app/{$this->nameView}")){
          /**Incluir o cabeçalho do site */
          include "app/sts/Views/include/header.php";
          /**Incluir o conteúdo do site */
          include "app/{$this->nameView}";
          /**Incluir o Footer do site */
          include "app/sts/Views/include/footer.php";
        }else{
          die("Erro: Por favor tente novamente, mais tarde. Caso o erro persista, entre em contato com o administrador ".EMAILADM);
        }

    }
}