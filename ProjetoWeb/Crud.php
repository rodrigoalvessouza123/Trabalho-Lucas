<?php

class Crud
{
    private $connect;

    private $id;
    private $nome;
    private $email;
    private $idade;

    function __construct($conect)
    {
        $this->connect = $conect;
        
    }

    public function setDados($nome,$email,$idade){
        $this->nome = $nome;
        $this->email = $email;
        $this->idade = $idade;
    }

    public function insertDados(){
        $sql = $this->connect->prepare("INSERT INTO clientes(id,nome,idade,email,data_now)VALUES(0,?,?,?,now())");

        $sql->bindParam(1, $this->nome);
        $sql->bindParam(2, $this->idade);
        $sql->bindParam(3, $this->email);

        if($sql->execute()){
        echo "ok";
        }else{
            echo "Erro!";
        }   

    }

    public function readInfo($id = null){
        if(isset($id)){
        $sql = $this->connect->prepare("SELECT * FROM clientes WHERE id=?");

        $sql->bindValue(1,$id);

        $sql->execute();
        
        $result =$sql->fetch(PDO::FETCH_OBJ);

        return $result;

        }else{
            $this->getALL();
        }
    } //end readInfo

    public function getALL(){

        $sql = $this->connect->query("SELECT * FROM clientes");

        $sql->execute();
        
        $result = $sql->fetchALL();
        
        return $result;

    }

    public function readInfoAll($nome = null){
        if(isset($nome)){
        $sql = $this->connect->prepare("SELECT * FROM clientes WHERE nome LIKE ?");

        $sql->bindValue(1,"%$nome%");

        $sql->execute();
        
        //$result =$sql->fetch(PDO::FETCH_OBJ);

        $result = $sql->fetchALL(PDO::FETCH_ASSOC);

        return $result;
        }else{
            $this->getALL();
        }
    } //end readInfoAll
    

    public function update($id,$nome,$idade,$email){
        $sql = $this->connect->prepare("UPDATE clientes SET nome=?, idade=?, email=? WHERE id=?");

        $sql->bindValue(1, $nome,PDO::PARAM_STR);
        $sql->bindValue(2, $idade,PDO::PARAM_STR);
        $sql->bindValue(3, $email,PDO::PARAM_STR);
        $sql->bindValue(4, $id,PDO::PARAM_STR);

        if($sql->execute()){
            echo "Registro Atualizado! <br> <a href='readAll.php'> Voltar </a>";
            }else{
                echo "Problemas ao tentar atualizar registro! <br> <a href='readAll.php'> Voltar </a>";
            }   

    }
    public function delete($id){
        $sql = $this->connect->prepare("DELETE FROM clientes WHERE id=?");

        $sql->bindValue(1, $id, PDO::PARAM_STR);

        if($sql->execute()){
            echo "Registro Excluído! <br> <a href='readAllDelete.php'> Voltar </a>";
            }else{
                echo "Problemas ao tentar atualizar registro! <br> <a href='readAllDelete.php'> Voltar </a>";
            }   
    }

    }//end classe
    