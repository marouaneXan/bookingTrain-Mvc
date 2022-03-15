<?php

class client extends DataBase{

    private $conn;

    public function __construct(){

        $this->conn=$this->connect();

    }

    public function signUp($email,$nom,$prenom,$tel,$pass){
        $sql1="SELECT email FROM `client` WHERE email = ?";
        $result1 = $this->conn->prepare($sql1); 
        $result1->execute([$email]); 

        if(!$result1->fetchColumn()){

             $pass= password_hash($pass, PASSWORD_DEFAULT);
        $sql="INSERT INTO `client` (`prenom`, `nom`,`email`, `tel`,`password`) VALUES (?,?,?,?,?)";
        $stmt= $this->conn->prepare($sql);

         return $stmt->execute([$prenom, $nom,$email,$tel,$pass]);
        }else {
                return 0;
        }
             
    }
    
   
    //verify login client
    public function verifyLogin($email,$pass){
        $sql="SELECT * FROM `client` WHERE email = ?";
           
        // $sql = "SELECT count(*) from voyage where id_voyage=?"; 
        $result = $this->conn->prepare($sql); 
        $result->execute([$email]); 
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
       

        if( password_verify($pass,$result[0]['password'] )) {

            return $result;

        }   else{
                     return 0;

        }}


        public function updateClient($id_client,$prenom,$nom,$email,$pass,$tel){  
            $pass= password_hash($pass, PASSWORD_DEFAULT);

            $sql="UPDATE `client` SET `prenom` = ? ,nom= ? ,tel= ? ,password= ? , email= ?  WHERE `client`.`id_client` = ?";
            $stmt= $this->conn->prepare($sql);
            $stmt->execute([$prenom, $nom, $tel,$pass,$email,$id_client]);

        
        }

        public function getIdClient($email){
            $sql = "SELECT * from client where email=?"; 
            $result = $this->conn->prepare($sql); 
            $result->execute([$email]); 
            return $result->fetchColumn(); 
            return 0;
        }

        // public function addUser($email,$nom,$prenom,$tel){
        //     $sql1="SELECT email FROM `client` WHERE email = ?";
        //     $result1 = $this->conn->prepare($sql1); 
        //     $result1->execute([$email]); 
    
        //     if(!$result1->fetchColumn()){
    
        //          $pass= password_hash($pass, PASSWORD_DEFAULT);
        //     $sql="INSERT INTO `user` (`prenom`, `nom`,`email`, `tel`) VALUES (?,?,?,?)";
        //     $stmt= $this->conn->prepare($sql);
    
        //      return $stmt->execute([$prenom, $nom,$email,$tel,$pass]);
        //     }else {
        //             return 0;
        //     }
                 
        // }
        
}











?>