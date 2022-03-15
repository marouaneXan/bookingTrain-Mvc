<?php 

class Voyage extends DataBase{
    private $table='voyages';
    private $conn;

    public function __construct(){

        $this->conn=$this->connect();

    }
    public function  getAllVoyages(){


        $sql = 'select * from voyage v join train t on v.id_train=t.id_train';

        $statement = $this->conn->query($sql);

// get all voyages
$voyages = $statement->fetchAll(PDO::FETCH_ASSOC);
return $voyages;

    }
// add voyage
    public function addVoyage($gare_depart,$gare_arriver,$prix,$heure_depart,$heure_arriver,$id_train,$etat_voyage){

       $sql=" INSERT INTO `voyage` ( `gare_depart`, `gare_arriver`, `prix`, `heure_depart`, `heure_arriver`, `id_train`, `etat_voyage`) VALUES (?, ?, ?, ?,?, ?,?)";
       $stmt= $this->conn->prepare($sql);
       $stmt->execute([$gare_depart, $gare_arriver, $prix,$heure_depart,$heure_arriver,$id_train,$etat_voyage]);
    }

    //delete Voyage
    public function deleteVoyage($idVoyage){

        $sql=" DELETE FROM `voyage` WHERE `voyage`.`id_voyage` = ?";
       $stmt= $this->conn->prepare($sql);
       $stmt->execute([$idVoyage]);

  
    }

    // update Voyage

    public function updateVoyage($idVoyage,$gare_depart,$gare_arriver,$prix,$heure_depart,$heure_arriver,$id_train,$etat_voyage){  

    $sql="UPDATE `voyage` SET `gare_depart` = ?, `gare_arriver` = ?, `prix` = ?, `heure_depart` = ?, `heure_arriver` = ? , `id_train` = ?, `etat_voyage` = ? WHERE `voyage`.`id_voyage` = ?";
    $stmt= $this->conn->prepare($sql);
    $stmt->execute([$gare_depart, $gare_arriver, $prix,$heure_depart,$heure_arriver,$id_train,$etat_voyage,$idVoyage]);


}
//countVoyage
public function countVoyage($id){

    $sql = "SELECT count(*) from voyage where id_voyage=?"; 
    $result = $this->conn->prepare($sql); 
    $result->execute([$id]); 
    return $result->fetchColumn(); 



}
//add cancelVoyages
public function addVoyageAnnuler($dateVoyage,$id_voyage){

    $sql=" INSERT INTO `voyage_anuuler` (`dateVoyage`, `id_voyage`) VALUES (?, ?) ";
    $stmt= $this->conn->prepare($sql);
    $stmt->execute([$dateVoyage, $id_voyage]);
 }
// get all voyages canceled

public function  getAllVoyagesCanceled(){


    $sql = 'SELECT * FROM `voyage_anuuler` va join voyage v on va.id_voyage = v.id_voyage join train t on t.id_train=v.id_train';

    $statement = $this->conn->query($sql);

// get all voyages
$voyages = $statement->fetchAll(PDO::FETCH_ASSOC);
return $voyages;

}

// partie users /clients
// get Voyages selon parametre
public function  TestVoyageUser($dateVoyage,$gare_depart,$gare_arriver){
 
    $sql = "SELECT count(*) from voyage v join  voyage_anuuler va on v.id_voyage=va.id_voyage WHERE v.gare_depart like ? and v.gare_arriver like ? and  va.dateVoyage = ?"; 
    $result = $this->conn->prepare($sql); 
    $result->execute([$gare_depart,$gare_arriver,$dateVoyage]); 
    return $result->fetchColumn(); 


    
}




public function searchVoyage($gare_depart,$gare_arriver){



$sql = "select * from voyage v join train t on v.id_train=t.id_train  WHERE v.gare_depart like ? and v.gare_arriver like ? ";
    $result = $this->conn->prepare($sql); 
    $result->execute([$gare_depart,$gare_arriver]); 
   
   
    return $result->fetchAll(PDO::FETCH_ASSOC);





}




}


















?>