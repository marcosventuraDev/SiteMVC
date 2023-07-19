<?php
//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
    /*  header("location: /"); */
    die("Erro: página não encontrada!");
 }
 

echo "<h1> Página Inicial </h1>";
extract($this->data[0]);
echo "ID: $id <br>";
echo "<b>Título:</b> $title_top <br>";
echo "<b> Descrição:</b> $description_top <br>";
echo "<b> Link do Botão:</b> $link_btn_top<br>";
echo "<b> Contato:</b> $txt_btn_top <br>";
echo "<b> Image:</b> $image<br>"; 