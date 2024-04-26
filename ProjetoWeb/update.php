<?php
$nome = $_POST['pessoa'];
$idade = $_POST['idade'];
$email = $_POST['email'];

$id = $_POST['id'];

//echo $nome." - ".$idade." - ".$email." - ".$id."<br>";

// importa o arquivo de conexão com Mysql
include_once("conect.php");

//importa o arquivo da classe Crud
include_once("Crud.php");

$obj = new Crud($conect);

$obj->update($id,$nome,$idade,$email);

?>