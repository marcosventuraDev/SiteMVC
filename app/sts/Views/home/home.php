<?php
//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
    /*  header("location: /"); */
    die("Erro: página não encontrada!");
 }
 

echo "View da página Home Do site<br>";
echo"<pre>";
var_dump($this->data);
echo"</pre>";