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


    public function getNbrReservation($voyage){
        $sql = "SELECT COUNT(*) FROM `reservation` r join voyage v on r.id_voyage =v.id_voyage join train t on t.id_train=v.id_train WHERE v.id_voyage = ? "
        ; 
        $result = $this->conn->prepare($sql); 
        $result->execute([$voyage]); 
        return $result->fetchColumn(); 
        return 0;
    }
      public function getNbrPlaces($voyage){
        $sql = "select t.nbr_place from voyage v join train t on v.id_train = t.id_train WHERE v.id_voyage = ? "; 
        $result = $this->conn->prepare($sql); 
        $result->execute([$voyage]); 
        return $result->fetchColumn(); 
        return 0;
    }

    public function  getAllReservations($id_client){


        $sql = 'SELECT * FROM client c join reservation r on r.id_client=c.id_client join voyage v on v.id_voyage=r.id_voyage WHERE c.id_client= ? ';
    
        $result = $this->conn->prepare($sql); 
        $result->execute([$id_client]); 
       
       
        return $result->fetchAll(PDO::FETCH_ASSOC);

} 

public function  getsAllReservations(){


    $sql = 'SELECT count(*) as count FROM reservation ';

    $statement = $this->conn->query($sql);

    // get all publishers
    
    
    $reservation = $statement->fetch(PDO::FETCH_ASSOC);
    return $reservation;


}

public function  annulerReservation($id_reservation){

    $sql="DELETE FROM `reservation` WHERE `reservation`.`id_reservation` = ? ";

        $stmt= $this->conn->prepare($sql);
       return $stmt->execute([$id_reservation]);


}

}







?>