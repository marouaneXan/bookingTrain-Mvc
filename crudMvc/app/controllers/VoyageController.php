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
   $data['date_voyage']=$date_depart;

         $db=new Voyage();
           $search=$db->searchVoyage($gare_depart,$gare_arriver);
           $canceled= $db->getAllVoyagesCanceled();
         //tester si le voyage chercher est  deja annuler par admin ou non
          
           foreach($canceled as $row){
           
            foreach($search as $key=>$row1){
             
                 
       
          if($row['id_train']==$row1['id_train'] && $row['dateVoyage']==$date_depart){

           
            unset( $search[$key]);
            
        
         }  
            }
         }
        
         $data['voyages']=$search;
         $data['title']="Depart le : " .$date_depart."  trajet : ". $gare_depart ." - ". $gare_arriver;
            view::load('homeVoyages');
            view::load('includes/voyagesSearch',$data);
            if (!empty($date_fin)){
               $search=$db->searchVoyage($gare_arriver,$gare_depart);
               foreach($canceled as $row){
           
                  foreach($search as $key=>$row1){
                   
                          
                }
                if($row['id_train']==$row1['id_train'] && $row['dateVoyage']==$date_depart){
      
                 
                  unset( $search[$key]);
                 
                 
      
                  }
               }
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
        
   














}

?>