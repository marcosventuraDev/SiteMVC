<?php

namespace Sts\Models\helper;


//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
    /*  header("location: /"); */
    die("Erro: página não encontrada!");
 }
 

 /**
  * Helper respnsável em buscar os registros no banco de dados
  * Undocumented class
  */
 class StsRead extends StsConn
 {
    private string $select;
    private array|null $result = [];
    private object $query;
    private object $conn;
    
    function getResult(): array|null
    {
        return $this->result;
    }

    public function exeRead(string $table, $terms = null,  $parseString=null)
    {
        var_dump($table);
        $this->select = "SELECT * FROM {$table}";
        var_dump($this->select);

        $this->exeInstruction();
    }

    private function exeInstruction()
    {
        $this->connection();
        try {
            $this-> query->execute();
            $this->result = $this->query->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $err) {
           $this->result = null;
        }

    }

    private function connection()
    {
        $this->conn = $this->connectDb();
        $this->query = $this->conn->prepare($this->select);
    }
 }