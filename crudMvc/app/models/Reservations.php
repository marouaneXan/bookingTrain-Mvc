<?php 

class Reservations extends DataBase{
    private $table='Train';
    private $conn;

    public function __construct(){

        $this->conn=$this->connect();

    }
 


    public function addReservation($idVoyage,$idUser,$idClient,$date_voyage){
       $dateR= date("Y-m-d");
       $heureR=date("h:i:s");

        $sql="INSERT INTO `reservation` (`date_reservation`, `heure_reservation`, `id_voyage`, `id_user`, `id_client`, `date_voyage`) VALUES (?,?,?,?,?,?)";

        $stmt= $this->conn->prepare($sql);
        $stmt->execute([$dateR, $heureR,$idVoyage,$idUser,$idClient,$date_voyage]);


    }

    


}







?>