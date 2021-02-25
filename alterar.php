<?php
 require_once 'usuario.php';
 $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <title>PKI-2</title>
</head>
<body>
    <div class="container">
       <?php
       $id = $_GET['id'];
       //---------conexao---
       $host = "localhost";
       $user = "root";
       $pass = "";
       $dbname = "jackson";
       $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       //---------conexao-----
       $consulta = $pdo->prepare("SELECT * FROM cadastro WHERE id_cadastro =$id");
       $consulta->execute();
       if($consulta->rowCount()>0)
       {
           $row = $consulta->fetch(PDO::FETCH_ASSOC);
       }
       ?>
        <div id="apoiadores" style="background-color:#ccc;">
            <h3>ALTERAÇÃO DE DADOS</h3>     
            
            <form method="Post" action="atualizar.php">
                <input type="text" name="cod" value="<?php echo $row['id_cadastro']?>" readonly>
                <input type="text" name="nome" value="<?php echo $row['nome']?>" placeholder="Nome Pessoa / Empresa">
                <input type="text" name="email" value="<?php echo $row['email']?>" placeholder="email">
                <input type="text" name="fone" value="<?php echo $row['fone']?>" placeholder="Fone">
                <input type="submit" href="atualizar.php" style="background-color:rgb(130, 163, 201);color:white"name="enviar" value="Atualizar"> 
            </form>
            
            
        </div>  
        
        
    </div>
</body>
</html>