<?php
class DataBase {
    protected $db;


    public function connect(){
        try {
            $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME,USER,PASS);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db=$conn;
            return $this->db;
          } catch(PDOException $e) {
            return $this->db;

          }

    }

    

}




?>