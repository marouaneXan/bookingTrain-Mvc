<?php 

class AdminController{


    public function index() {
    //       // get all voyages
    //    $db= new Voyage();
    //    $data['voyages' ]=$db->getAllVoyages();
    //    //  get all trains
    //    $train=new train();
    //    $data['train']= $train->getTrains();
   view::load('loginAdminPage');
//   view::load('homeVoyages');
// $db=new admin();  
//     echo $db->addAdmin("admin","admin");
    // view::load('includes\header');

   
}

        public function verifyLogin(){

            if(isset($_POST['submit'])) 
   {
       $username = $_POST['username'];
       $pass = $_POST['pass'];
        $db=new admin();  
       if($db->verifyLogin($username,$pass) )  {
        session_start();

        $_SESSION['is_logedin'] = 1;
        
        header('Location: '.BURL.'admin/homeAdmin');
       

           
       }   
        else {  

            $data['msg']=0;
            
            view::load('loginAdminPage',$data);
            // header('Location: '.BURL.'admin');

           
        }

        }
    }

    // logout

    public function logout(){
        
        session_start();
        session_unset();
        session_destroy();
        header('Location: '.BURL.'admin');

    }
    public function homeAdmin() {
        // get all voyages
     $db= new Voyage();
     $reservation=new reservations();
     $client= new client();
     $data['clients']=$reservation->getsAllReservations();
       
     $data['reservations']=$client->getsAllClients();
     $data['voyages' ]=$db->getAllVoyages();
    //  print_r($client->getsAllClients());
    //  print_r($reservation->getsAllReservations());
     //  get all trains
     $train=new train();
     $data['train']= $train->getTrains();
     view::load('home',$data);
  
     
     
              
  
  }
  
  public function addVoyage(){
  
  
     if(isset($_POST['submit'])) 
     {
         $gare_depart = $_POST['gare_depart'];
         $gare_arriver = $_POST['gare_arriver'];
         $heure_depart = $_POST['heure_depart'];
         $heure_fin = $_POST['heure_fin'];
         $id_train = $_POST['id_train'];
         $etat_voyage = $_POST['etat_voyage'];
         $prix = $_POST['prix'];
         $id_voyage = $_POST['id_voyage'];
  
         
              $db= new Voyage();
  
              if($db->countVoyage($id_voyage)==1){
               $db->updateVoyage($id_voyage,$gare_depart,$gare_arriver,$prix,$heure_depart,$heure_fin,$id_train,$etat_voyage);
                 
  
  
                 
              }else{
              $db->addVoyage($gare_depart,$gare_arriver,$prix,$heure_depart,$heure_fin,$id_train,$etat_voyage);
  
  
              }
           
              // $train=new train();
              // $data['train']= $train->getTrains();
              // $data['voyages']=$db->getAllVoyages();
              // view::load('home',$data);
                 $this->homeAdmin();
          
  
  
  }
  
  }
  
  
  public function deleteVoyage(){
  
     $db= new Voyage();
     
    //  $db->addVoyage($gare_depart,$gare_arriver,$prix,$heure_depart,$heure_fin,$id_train,$etat_voyage);
     $data['voyages']=$db->getAllVoyages();
       view::load('home',$data);
  
  
  }
  
  // cancelingVoyage
  
  public function annulerVoyage(){
  
     if(isset($_POST['submit'])) 
     {
         $dateVoyage = $_POST['dateVoyage'];
         $id_voyageA = $_POST['id_voyageA'];
         $db= new Voyage();
         if(!$db->TestVoyageAnnuler($id_voyageA,$dateVoyage)){
        $db->addVoyageAnnuler($dateVoyage,$id_voyageA); 
        $data['msg']=1;

            // echo "ok";
             
         } else
         $data['msg']=0;
        //  echo"not ok";
         $train=new train();
         $data['train']= $train->getTrains();
         $data['voyages']=$db->getAllVoyages();
         $reservation=new reservations();
         $client= new client();
         $data['clients']=$reservation->getsAllReservations();
           
         $data['reservations']=$client->getsAllClients();
         $data['voyages' ]=$db->getAllVoyages();
         view::load('home',$data);
  
        
  }
  }
  public function Voyageannuler(){
     $db= new Voyage();
     $data['voyages' ]=$db->getAllVoyagesCanceled();
     
     view::load('voyageAnnulerAdmin',$data);
  
  
  }

  public function delete_voyage_annuler($id_voyage_annuler){

    $voyage=new Voyage();

    if($voyage->deleteVoyageAnnuler($id_voyage_annuler)){
        $data['msg']="Bien  annuler";

        
    } else{  $data['msg']="erreur annulation"; }

    $data['voyages' ]=$voyage->getAllVoyagesCanceled();
    view::load('voyageAnnulerAdmin',$data);



}
}       























?>