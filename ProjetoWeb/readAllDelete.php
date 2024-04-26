<?php
// importa o arquivo de conexão com Mysql
include_once("conect.php");

//importa o arquivo da classe Crud
include_once("Crud.php");

$obj = new Crud($conect);

$obj->readInfo();

$dados = $obj->getAll();

?>

<link rel="stylesheet" type="text/css" href="css/estilo.css">
<main>
<header> Delete um registro! </header>

<?php

echo "<table border='1'>";
echo "<tr> <th> Nome </th> <th> Idade </th> <th> E-mail </th> <th> Data </th> <th> Excluir </th> </tr>";

foreach($dados as $info){
    echo "<tr>
    <td>".$info['nome']."</td>
    <td>".$info['idade']."</td>
    <td>".$info['email']."</td>
    <td>".$info['data_now']."</td>
    <td> <a href=delete.php?id=".$info['id']."> Excluir </a> </td>
    </tr>";

}
echo "</table>";
?>
</main>