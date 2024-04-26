<?php

$id = $_GET['id'];

// importa o arquivo de conexão com Mysql
include_once("conect.php");

//importa o arquivo da classe Crud
include_once("Crud.php");

// echo $id;

$obj = new Crud($conect);
$obj->delete($id);

?>