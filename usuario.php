<?php

Class Usuario
{   
    private $pdo;
    public $msgErro = "";

    public function conectar ($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        }catch (PDOException $e){
              $msgErro = $e->getMessage();
        }
        
    }

    public function cadastrar($nome,$email,$fone)
    {
        global $pdo;
        // verificar se já existe o email cadastrado
        $sql = $pdo->prepare("SELECT id_cadastro FROM cadastro WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount()>0)
        {
            return false; // ja está cadastrada
        }else
        {
        // caso não, Cadatrar
            $sql = $pdo->prepare(" INSERT INTO cadastro (nome, email, fone) VALUES(:n, :e,:f) ");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":f", $fone);
            $sql->execute();
            return true; 
        }
       
    }

    public function logar($email,$senha)
    {
        global $pdo;
        // verificar se o email e senha estão cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute(); 
        if($sql->rowCount()>0)
        {
           // entrar no sistema  (sessao)
           // criar um array com os dados do banco
           $dado = $sql->fetch();
           // criar uma sessao
           session_start();
           $_SESSION['id_usuario'] = $dado['id_usuario'];
           return true; // Logado com sucesso
        }else{
           return false; // não foi possivel logar
        }
        
    }

    public function buscarDados()
    {    
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "jackson";
        
        $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = $pdo -> prepare("SELECT * FROM cadastro");
        $consulta-> execute();

        echo "<table  style='width:100%; height:auto;text-align:center;'>
           <tr style='background-color:#ccc;height:50px;'>
              <td >ID</td>
              <td >NOME</td>
              <td >EMAIL</td>
              <td >FONE</td>
              <td ></td>
              <td ></td>
           </tr>

           
        ";

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
       
        echo "</table>";
    

    }

    public function busca()
    {   /*
        echo "<input type='text' style='height:40px;margin:15px;' name='busca' placeholder='Digite sua palavra'>";
        echo "<a style='text-decoration:none;color:black;background-color:#1CD10E;padding:10px;margin:15px;' href='#'>Buscar</a>";
        */
    }
    
}





?>