<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "jackson";

try{
  $conn = new PDO('mysql:host='.$host.';dbname='.$banco.'', $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
  }catch (PDOException $e){
      echo 'ERROR:' . $e->getMessage();
  }