<?php

namespace Sts\Models\helper;

use PDO;

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
    private array $values = [];
    private array|null $result = [];
    private object $query;
    private object $conn;
    
    function getResult(): array|null
    {
        return $this->result;
    }

    public function exeRead(string $table, string|null $terms = null, string|null $parseString = null)
    {
        echo"<pre>";
        var_dump($parseString);
        var_dump($table);
        echo"</pre>";

        if(!empty($parseString)){
            parse_str($parseString, $this->values);
                echo"<pre>";
                var_dump($this->values);
                echo"</pre>";
        }
        $this->select = "SELECT * FROM {$table} {$terms}";
        var_dump($this->select);

        $this->exeInstruction();
    }

    private function exeInstruction()
    {
        $this->connection();
        try {
            $this->exeParameter();   
            $this->query->execute();
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $err) {
           $this->result = null;
        } 

    }

    private function connection()
    {
        $this->conn = $this->connectDb();
        $this->query = $this->conn->prepare($this->select);
    }

    private function exeParameter()
    {
        if ($this->values){
            echo"<pre>";
            var_dump($this->values);
            echo"</pre>";
            foreach($this->values as $link => $value){
                echo"<pre>";
                var_dump($link);
                var_dump($value);
                echo"</pre>";
                if($link == 'limit' || $link == 'offset'){
                    $value = (int) $value;
                }
                $this->query->bindvalue(":{$link}", $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }
 }