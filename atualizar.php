<link rel="stylesheet" type="text/css" href="style.css" media="screen" />


<?php

$id = $_POST['cod'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$fone = $_POST['fone'];

//---------conexao---
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "jackson";
$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//---------conexao-----
$res = $pdo->prepare("UPDATE cadastro SET nome = '$nome',email='$email',fone='$fone' WHERE id_cadastro=$id");
$res->execute();
if($res->rowCount()!=null)
{
    
    echo "<table style='width:100%; height:auto;text-align:center;'>";
    echo "<td style='padding:5%;font-family:arial;font-size:12pt;';>Registro Atualizado com Sucesso!</td>";
    echo "</table>";
    
}else
{   
    echo "<table style='width:100%; height:auto;text-align:center;'>";
    echo "<td style='padding:5%;font-family:arial;font-size:12pt;';>Registro Não Alterado.</td>";
    echo "</table>";
}

?>

<br>
   <div id="sair">
   <a id="sair" href="adm.php">Voltar</a>
   </div>
   <div id="sair">
   <a id="sair" href="index.php">Sair</a>
   </div>