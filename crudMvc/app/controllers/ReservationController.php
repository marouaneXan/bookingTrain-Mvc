<?php 

class ReservationController{
   



    public function index($id_voyage,$date_voyage,$nbrPlaces){
        $data['id_voyage']=$id_voyage;
        $data['date_voyage']=$date_voyage;
        $data['nbrPlaces']=$nbrPlaces;
        
        
        view::load('includes/header');
        view::load('reservation',$data);
        echo"<script> addPassager(".$nbrPlaces.")</script>";
         
     
    }

    public function  validerReservation($id_voyage,$date_voyage,$nbrPlaces){
        // echo $id_voyage."<br>";
        // echo $date_voyage;
        $user= new user();
        
        $reservation= new reservations();
        $nbrReservation=$reservation->getNbrReservation($id_voyage);
        //   echo $reservation->getNbrReservation("2");
        //   echo"<br>";
        //   echo $reservation->getNbrPlaces("2");
       
        if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
           if (isset($_POST['submit'])){
            //  $nbr_passager=$_POST['submit'];


                if (isset($_SESSION['isLogin'])){

                    $id_client=$_SESSION['id_client'];
                    $nom=$_POST['nomP1'];
                    $prenom=$_POST['prenomP1'];
                    $email=$_POST['emailP1'];
                    $tel=$_POST['telP1'];
                    $reservation->addReservation($id_voyage,"0",$id_client,$date_voyage);
                    // echo " client";
                    

                        for($i=2;$i<=$nbrPlaces;$i++){
                            // echo 'user'.$i;
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



                }else{

                   
                        for($i=1;$i<=$nbrPlaces;$i++){
                            // echo"fd";
                            // echo $i."<br>";
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
             
            view::load('includes/header');
            view::load('success');


        
    }



        public function mesVoyages($msgerror){
                session_start();
                 $reservation= new reservations();
                $data['reservation']=$reservation->getAllReservations($_SESSION['id_client']);
                $data['msgError']=$msgerror;
                
                view::load('includes/header');
                view::load('mesVoyage',$data);



        }
        public function annulerReservation($id_reservation,$date_Voyage,$heure_voyage){
                

                $reservation= new reservations();
                $dateToday= date("Y-m-d");
                $heureNow=date("H:i:s");
                $dateTimeObject1 = date_create($heure_voyage); 
                $dateTimeObject2 = date_create($heureNow); 
                $difference= date_diff($dateTimeObject2,$dateTimeObject1);
                $sec = $difference->h * 3600;    
                $sec += $difference->i*60;
                $sec += $difference->s;


        //     echo $sec;
        //     echo"<br>";
        //    echo $difference->h;     
        //    echo"<br>";
        //    echo date('H');     
        //    echo"<br>";
            $msgerror="0";

            if ($date_Voyage>$dateToday){
                    $msgerror="1";
                    $reservation->annulerReservation($id_reservation);  

            }elseif ($date_Voyage==$dateToday){
                    echo "ok";
                if($heureNow<$heure_voyage){
                     if($sec>3600){
                        $msgerror="1";  
                        $reservation->annulerReservation($id_reservation);  
                }
                else {
                    $msgerror= "0" ;

                }
                
                }
        
        } 
       
          
      
            header("Location: ".BURL."reservation/mesVoyages/".$msgerror );           
      


        
        }




}



?>