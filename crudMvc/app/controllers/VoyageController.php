<?php 
class VoyageController{
   




   public function index(){


      view::load('homeVoyages');




   }




public function searchVoyage(){
   
   
   $gare_depart = $_POST['gareDepartI'];
   $gare_arriver = $_POST['gareArriverI'];
   $date_depart = $_POST['dateDepartI'];
   $date_fin = $_POST['dateArriverI'];
   $radioAller= $_POST['radioAller'];
   $nbrPlace= $_POST['placeI'];

   $data['date_voyage']=$date_depart;
   $data['nbrPlaces']=$nbrPlace;

         $db=new Voyage();
           $search=$db->searchVoyage($gare_depart,$gare_arriver);
           $canceled= $db->getAllVoyagesCanceled();
           $reservation= new reservations();
           
         //tester si le voyage chercher est  deja annuler par admin ou non
          
    
           
            foreach($search as $key=>$row){
               
               $nbrReservation=$reservation->getNbrReservation($row['id_voyage']);
               $nombrePlaceTrain=$reservation->getNbrPlaces($row['id_voyage']);
                      
                   if(($nombrePlaceTrain-$nbrReservation)<$nbrPlace ||($db->TestVoyageAnnuler($row['id_voyage'], $date_depart)==1) ){

                   unset($search[$key]);
      
        
         } 
      } 
      
        
        
         $data['voyages']=$search;
         $data['title']="Depart le : " .$date_depart."  trajet : ". $gare_depart ." - ". $gare_arriver;
            view::load('homeVoyages');
            view::load('includes/voyagesSearch',$data);
         

            if (!empty($date_fin)){
               foreach($search as $key=>$row){
               
                  $nbrReservation=$reservation->getNbrReservation($row['id_voyage']);
                  $nombrePlaceTrain=$reservation->getNbrPlaces($row['id_voyage']);
                         
                      if(($nombrePlaceTrain-$nbrReservation)<$nbrPlace ||($db->TestVoyageAnnuler($row['id_voyage'], $date_depart)==1) ){
   
                      unset($search[$key]);
         
           
            } 
         } 
               $search=$db->searchVoyage($gare_arriver,$gare_depart);
              
         $data['title']="Retour le : " .$date_fin."  trajet : ". $gare_arriver ." - ". $gare_depart;
         $data['voyages']=$search;

               view::load('includes/voyagesSearch',$data);

            }
         }
         
      
      

         public function Login(){

            view::load('includes/header');
            
            view::load('loginClient');
      
      
      
      
         }
         public function signUp(){

            if(isset($_POST['submit'])){

                  $nom=$_POST['nom'];
                  $prenom=$_POST['prenom'];
                  $email=$_POST['email'];
                  $pass=$_POST['password'];
                  $tel=$_POST['tel'];

                  $db =new client();
                 if($db->signUp($email,$nom,$prenom,$tel,$pass)) {
                  header("Location: ".BURL."Voyage/Login");

                 } else
                 echo"<script>  alert('change email'); </script>";
               //   header("Location: ".BURL."Voyage/Login");
                  $this->Login();

            }
      
            
         }

         public  function signIn(){
           
            if(isset($_POST['submit'])){

               
               $email=$_POST['email'];
               $pass=$_POST['password'];
              

               $db =new client();
             $result= $db->verifyLogin($email,$pass);
            
               
             if($result!=0){
                  session_start();
                  $_SESSION['isLogin'] =1; 
                  $_SESSION['id_client'] =$result[0]['id_client']; 
                  $_SESSION['email'] =$result[0]['email']; 
                  $_SESSION['nom'] =$result[0]['nom']; 
                  $_SESSION['prenom'] =$result[0]['prenom']; 
                  $_SESSION['tel'] =$result[0]['tel']  ; 
                 header("Location: ".BURL."Voyage");


             }
             
             else   header("Location: ".BURL."Voyage/Login");

               
               
               
         }



         }


         public function logOut(){

               session_start();
               session_destroy();
                header("Location: ".BURL."Voyage");


   

         }


         public function profileC(){


            view::load('includes/header');
            
            view::load('profileClient');

         }
         public function profileCEdit(){

                  
            if (isset($_POST['submit'])){
            
                  $nom=$_POST['nomC'];
                  $prenom=$_POST['prenomC'];
                  $email=$_POST['emailC'];
                  $tel=$_POST['telC'];
                  $pass=$_POST['passC'];
                  $new_pass=$_POST['nPassC'];
                  $confirm_new_pass=$_POST['cNPassC'];
                  echo"ok";
                  echo"ok";


               }
                  // view::load('includes/header');
            
            // view::load('profileClient');
            
         }
        
   














}

?>