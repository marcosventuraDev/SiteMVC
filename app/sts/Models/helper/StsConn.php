<?php

namespace Sts\Models\helper;

use PDO;
use PDOException;


//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
    /*  header("location: /"); */
    die("Erro: página não encontrada!");
 }



/** */
abstract class StsConn
{
    private string $host = HOST;
    private string $user =  USER;
    private string $pass = PASS;
    private string $dbname =   DBNAME;
/*     private int|string $port = PORT; */
    private object $connect;


    public function connectDb(): object
    {
        try {
            //conexao com a porta
          $this->connect =  new PDO(
                "mysql:host={$this->host};dbname=".$this->dbname,
                $this->user,$this->pass);
            return $this->connect;

        } catch (PDOException $err) {
            die("Erro: Por favor tente novamente, mais tarde. Caso o erro persista, entre em contato com o administrador ".EMAILADM);
        }
    }
}
