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
   <form id="form_busca" name="form_busca" method="POST" action="">
   <input type="text" name="texto" id="texto">
   <button type="submit">Buscar</button><br>
   <?php
       if(isset($_POST['texto'])){
           $texto = $_POST['texto'];
           //---------conexao---
           $host = "localhost";
           $user = "root";
           $pass = "";
           $dbname = "jackson";
           $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           //---------conexao-----
        
           $consulta = $pdo->prepare("SELECT * FROM cadastro WHERE nome LIKE '%$texto%'");
           $consulta->execute();
           if($consulta->rowCount()>0)
                { 
                    echo "<table  style='width:100%; height:auto;text-align:center;'>
                    <tr style='background-color:#ccc;height:50px;'>
                    <td >ID</td>
                    <td >NOME</td>
                    <td >EMAIL</td>
                    <td >FONE</td>
                    <td ></td>
                    <td ></td>
                    </tr>";

                    while($row = $consulta->fetch(PDO::FETCH_ASSOC))
                    {
                        echo "<tr style='background-color:#eee;height:50px;'>";
                    echo "<td>$row[id_cadastro]</td>";
                    echo "<td>$row[nome]</td>";
                    echo "<td>$row[email]</td>";
                    echo "<td>$row[fone]</td>";
                    echo "<td style='background-color:rgb(130, 163, 201)'>
                <a style='text-decoration:none;color:white;' href=\"alterar.php?id=$row[id_cadastro]\">Alterar</a>
                 </td>";
                    echo "<td style='background-color:red'>
                        <a style='text-decoration:none;color:white;' href=\"excluir.php?id=$row[id_cadastro]\">Excluir</a>
                        </td>";
                    }
                    echo '</table>';
                    
                }else{
                    echo "<table style='width:100%; height:auto;text-align:center;'>";
                    echo "<td style='padding:5%';>Registro não encontrado.</td>";
                    echo "</table>";
                    
                }
            }
   ?>
   </form> 
    
   <br>
   <div id="sair">
   <a id="sair" href="adm.php">Voltar</a>
   </div>
   <div id="sair">
   <a id="sair" href="index.php">Sair</a>
   </div>
</div>

</body>
</html>
