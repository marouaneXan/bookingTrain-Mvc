<?php

class Train extends DataBase{
    private $table='Train';
    private $conn;

    public function __construct(){

        $this->conn=$this->connect();

    }

    public function getTrains(){

        $sql = 'select * from train';

        $statement = $this->conn->query($sql);

// get all publishers
$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);
return $publishers;
        

    }
}


?>