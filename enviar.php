<?php

require_once 'usuario.php';
$u = new Usuario;





    if(isset($_POST['nome']))
{
        $nome =addslashes ($_POST['nome']);
        $email =addslashes ($_POST['email']);
        $fone =addslashes ($_POST['fone']);
       
        // verificar se esta preenchido
        if(!empty($nome) && !empty($email)&& !empty($fone))
        {
            $u->conectar("jackson", "localhost", "root", "");
          
            if($u->msgErro == "")
            {
            if($u->cadastrar($nome,$email,$fone))
            {
               echo '<script language="javascript">';   
                echo 'alert("Dados enviador com Sucesso!");';
                echo 'location.href="index.html";';    
                echo '</script>';      
            }
            else
            {          
                echo '<script language="javascript">';   
                echo 'alert("Email e/ou senha estão incorretos!");';
                echo 'location.href="index.html";';    
                echo '</script>';      
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

        echo '<script language="javascript">';   
        echo 'alert("Preencha todos os campos!");';
        echo 'location.href="index.html";';    
        echo '</script>';
                ?>
                <div class="msg-erro">
                Preencha todos os campos!

                
                </div>
                <?php
            
     }
}

    
    ?>