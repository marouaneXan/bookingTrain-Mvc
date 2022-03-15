<?php

class User extends DataBase{

    private $conn;

    public function __construct(){

        $this->conn=$this->connect();

    }


    public function getIdUser($email){
        $sql = "SELECT * from user where email=?"; 
        $result = $this->conn->prepare($sql); 
        $result->execute([$email]); 
        return $result->fetchColumn(); 
        return 0;
    }
    

    public function addUser($email,$nom,$prenom,$tel){

        $sql=" INSERT INTO `user` (`prenom`, `nom`, `email`, `tel`) VALUES ( ?, ?, ?, ?)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute([$prenom, $nom,$email,$tel]);
     }



}






?>