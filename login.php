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
    <title>Karatê de Inclusão</title>
</head>
<body>

<div id="corpo-form">
    <h1>Entrar</h1>
    <form method="Post">

    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="senha" placeholder="Senha"><br>
    <input type="submit" value="ACESSAR">
    
    </form>
</div>

<?php
    if(isset($_POST['email']))
{
        
        $email =addslashes ($_POST['email']);
        $senha =addslashes ($_POST['senha']);
       
        // verificar se esta preenchido
        if(!empty($email) && !empty($senha))
        {
            $u->conectar("jackson", "localhost", "root", "");
          
            if($u->msgErro == "")
            {
            if($u->logar($email,$senha))
            {
                 header("location:adm.php");
            }
            else
            {
                ?>
                <div class="msg-erro">
                Email e/ou senha estão incorretos!
                </div>
                <?php
            }
            
        }
        else
        {
                ?>
                <div class="msg-erro">
                <?php echo "Erro:".$u->msgErro; ?>
                </div>
                <?php
            
        }
            
     }else
     {
                ?>
                <div class="msg-erro">
                Preencha todos os campos!
                </div>
                <?php
            
     }
}

    
    ?>


</body>
</html>