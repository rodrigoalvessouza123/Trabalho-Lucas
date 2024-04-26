<?php

$id = $_GET['id'];


// importa o arquivo de conexão com Mysql
include_once("conect.php");

//importa o arquivo da classe Crud
include_once("Crud.php");

$obj = new Crud($conect);

$dados = $obj->readInfo($id);

// echo $id;
// var_dump($dados);

?>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<main>
    <header> Altere os campos necessários </header>
<form action="update.php" method="post"> 
    <p> Nme: <input type="text" name="pessoa" value="<?=$dados->nome;?>"> </p>
    <p> Idade <input type="number" name="idade" value="<?=$dados->idade;?>"> </p>
    <p> E-mail<input type="email" name="email" value="<?=$dados->email;?>"> </p>
    <input type="hidden" name="id" value="<?=$dados->id;?>">
    <p> <button type="submit"> Alterar Dados </button> </p>
</form>
</main>