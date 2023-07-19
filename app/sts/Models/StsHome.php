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
      /*   $this->data = [
            "title" => "Topo da pagina",
            "description" => "Descrição do serviço"
        ]; */
      
       $connection =  new \Sts\Models\helper\StsConn();
       $this->connection = $connection->connectDb();

       $query_home_top = "SELECT id, title_top, description_top, link_btn_top, txt_btn_top, image 
                        FROM sts_homes_tops 
                        LIMIT 1";
        $result_home_top = $this->connection->prepare($query_home_top);
        $result_home_top->execute();
        $this->data = $result_home_top->fetch(\PDO::FETCH_ASSOC);
     
       echo"<pre>";
       var_dump($this->data);
       echo"</pre>";

        return $this->data;

        
            
    }

}