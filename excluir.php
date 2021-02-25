<?php
         
        $id = $_GET ['id'];
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "jackson";

        $conn = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn -> prepare("DELETE FROM cadastro WHERE id_cadastro = '$id'");
        $sql->execute();
        

        if($sql!=0){
           
            header('Location: adm.php');
        }else{
            echo 'Erro';
        }