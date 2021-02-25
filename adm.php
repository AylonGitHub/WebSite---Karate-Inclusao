<?php include "conexao.php";
require_once 'usuario.php';
$u = new Usuario;

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <title>Teste de Impressão</title>
</head>
<body>

<div id="Tudo_formulario">
   <form id="form_busca" name="form_busca" method="POST" action="buscar.php">
   <input type="text" name="texto" id="texto">
   <button type="submit">Buscar</button><br>
   
   </form> 
    

   <?php 
       $dados=$u->buscarDados();   
   ?>

   <br>
   <div id="sair">
   <a id="sair" href="sair.php">Sair</a>
   </div>
</div>

</body>
</html>
