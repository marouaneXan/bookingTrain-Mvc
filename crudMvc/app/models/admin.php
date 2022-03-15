<?php 


class admin extends DataBase{
    private $table='admin';
    private $conn;

    public function __construct(){

        $this->conn=$this->connect();

    }


    //add Admin
    public function addAdmin($username,$pass){
       

        $sql=" INSERT INTO `admin` (`username`, `password`) VALUES (?,?)";
        $stmt= $this->conn->prepare($sql);
       
        $pass= password_hash($pass, PASSWORD_DEFAULT);
       
        $stmt->execute([$username, $pass]);    

    }
   



        //verify login Admin
        public function verifyLogin($username,$pass){
            $sql="SELECT password FROM `admin` WHERE username = ?";
               
            // $sql = "SELECT count(*) from voyage where id_voyage=?"; 
            $result = $this->conn->prepare($sql); 
            $result->execute([$username]); 

            
           
           
            return password_verify($pass, $result->fetchColumn());
        
        //     $result = $this->conn->prepare($sql); 
        //  $pass= password_hash($pass, PASSWORD_DEFAULT);
          
            // $result->execute([$id]); 
            // return $result->fetchColumn(); 
        }


}



?>