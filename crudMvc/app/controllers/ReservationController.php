<?php 

class ReservationController{
   



    public function index($id_voyage,$date_voyage){
        $data['id_voyage']=$id_voyage;
        $data['date_voyage']=$date_voyage;
        
        view::load('includes/header');
        view::load('reservation',$data);
         
     
    }

    public function  validerReservation($id_voyage,$date_voyage){
        echo $id_voyage."<br>";
        echo $date_voyage;
        $user= new user();
        $reservation= new reservations();
          session_start();
       
           if (isset($_POST['submit'])){
          $nbr_passager=$_POST['submit'];


                if (isset($_SESSION['isLogin'])){

                    $id_client=$_SESSION['id_client'];
                    $nom=$_POST['nomP1'];
                    $prenom=$_POST['prenomP1'];
                    $email=$_POST['emailP1'];
                    $tel=$_POST['telP1'];
                    $reservation->addReservation($id_voyage,"0",$id_client,$date_voyage);
                   
                    

                        for($i=2;$i<= $nbr_passager;$i++){
                           
                            $nom=$_POST['nomP'.$i];
                            $prenom=$_POST['prenomP'.$i];
                            $email=$_POST['emailP'.$i];
                            $tel=$_POST['telP'.$i];
                            if( $user->getIdUser($email)==0){
                           
                            $user->addUser($email,$nom,$prenom,$tel);
                            $id_user=$user->getIdUser($email);
                            $reservation->addReservation($id_voyage,$id_user,"0",$date_voyage);
                            
                          }

                  
                   else{
                       $id_user=$user->getIdUser($email);
                       $reservation->addReservation($id_voyage,$id_user,"0",$date_voyage);
                     
                      
                      }
                   }


                    // echo $id_client;
                }else{

                        // echo "not ok ";
                       
                        for($i=1;   $i<= $nbr_passager;$i++){
                           
                            $nom=$_POST['nomP'.$i];
                            $prenom=$_POST['prenomP'.$i];
                            $email=$_POST['emailP'.$i];
                            $tel=$_POST['telP'.$i];
                            if( $user->getIdUser($email)==0){
                           
                            $user->addUser($email,$nom,$prenom,$tel);
                            $id_user=$user->getIdUser($email);
                            $reservation->addReservation($id_voyage,$id_user,"0",$date_voyage);
                            
                          }

                  
                   else{
                       $id_user=$user->getIdUser($email);
                       $reservation->addReservation($id_voyage,$id_user,"0",$date_voyage);
                     
                      
                      }
                   }

                       

                   

                

                }
                

            }
        
     





    }





}



?>