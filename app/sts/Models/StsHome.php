<?php

namespace Sts\Models;
//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
    /*  header("location: /"); */
    die("Erro: página não encontrada!");
 }

class StsHome
{
    /** @var array $data Recebe os registro do banco de dados*/
    private array $data;

   
/** @var object Recebe a conexão com o banco de dados */
   private object $connection;

    /**
     * Criar o array com dados da página home
     *  @return array  Retorna informações para página Home
     */
    public function index():array
    {
    
        
        $viewHome = new \Sts\Models\helper\StsRead();
       
        $viewHome->fullRead("SELECT id, title_top, description_top, link_btn_top, image
         from sts_homes_tops
         WHERE id=:id 
         LIMIT :limit", "id=1&limit=1" );
        $this->data = $viewHome->getResult();

       
        return $this->data;

        
            
    }

}