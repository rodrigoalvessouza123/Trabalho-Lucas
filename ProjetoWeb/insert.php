<?php

$nome = $_POST['nome'];
$email = $_POST['e-mail'];
$idade = $_POST['idade'];

//echo $nome." - ".$email." - ".$idade;

// importa o arquivo de conexão
include_once("conect.php");

// Importa o arquivo da classe Crud
include_once("Crud.php");

$obj = new Crud($conect);

$obj->setDados($nome, $email, $idade);
$obj->insertDados();

