<?php

//se houver a tentativa de acesso direto da página || irá direcionar para a página raiz ou irá mostar uma mensagem de erro!
if(!defined("M4RC05V3")){
   /*  header("location: /"); */
   die("Erro: página não encontrada!");
}

?>

<h1>Entre em contato</h1>

<form action="" method="POST">
   <label for="">Nome:</label>
   <input type="text" name="name" id="name" placeholder="Nome completo"> <br><br>

   <label for="">E-mail:</label>
   <input type="email" name="email" id="email" placeholder="Seu melhor E-mail"><br><br>
   <label for="">Assunto:</label>
   <input type="text" name="subject" id="subject" placeholder="Assunto da mensagem"><br><br>
   <label for="">Mensagem:</label>
   <textarea name="AddContMsg" id="content" placeholder="Conteúdo da mensagem " cols="50" rows="10"></textarea><br><br>

   <input type="submit" name="AddContent" value="Enviar">
</form>