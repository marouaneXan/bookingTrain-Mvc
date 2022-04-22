<?php
class VoyageController
{





   public function index()
   {


      view::load('homeVoyages');
   }




   public function searchVoyage()
   {

      date_default_timezone_set('Africa/casablanca');

      $gare_depart = $_POST['gareDepartI'];
      $gare_arriver = $_POST['gareArriverI'];
      $date_depart = $_POST['dateDepartI'];
      $date_fin = $_POST['dateArriverI'];
      $radioAller = $_POST['radioAller'];
      $nbrPlace = $_POST['placeI'];
      $heureNow = date("H:i:s");
      $dateToday = date("Y-m-d");
      $data['date_voyage'] = $date_depart;
      $data['nbrPlaces'] = $nbrPlace;

      $db = new Voyage();
      $search = $db->searchVoyage($gare_depart, $gare_arriver);
      $canceled = $db->getAllVoyagesCanceled();
      $reservation = new reservations();

      //tester si le voyage chercher est  deja annuler par admin ou non


      // echo"ok";>

      foreach ($search as $key => $row) {

         // echo strtotime($row['heure_depart']);
         // echo "<br>";
         // echo strtotime($heureNow);


         $nbrReservation = $reservation->getNbrReservation($row['id_voyage']);
         $nombrePlaceTrain = $reservation->getNbrPlaces($row['id_voyage']);

         if (($nombrePlaceTrain - $nbrReservation) < $nbrPlace || ($db->TestVoyageAnnuler($row['id_voyage'], $date_depart) == 1)) {

            unset($search[$key]);
         }

         if ((strtotime($heureNow)) >= (strtotime($row['heure_depart'])) && $dateToday==$date_depart) {
            // echo "ok";
            unset($search[$key]);
         }
      }



      $data['voyages'] = $search;
      $data['title'] = "Depart le : " . $date_depart . "  trajet : " . $gare_depart . " - " . $gare_arriver;
      view::load('homeVoyages');
      view::load('includes/voyagesSearch', $data);


      if (!empty($date_fin)) {
         foreach ($search as $key => $row) {

            $nbrReservation = $reservation->getNbrReservation($row['id_voyage']);
            $nombrePlaceTrain = $reservation->getNbrPlaces($row['id_voyage']);

            if (($nombrePlaceTrain - $nbrReservation) < $nbrPlace || ($db->TestVoyageAnnuler($row['id_voyage'], $date_depart) == 1)) {

               unset($search[$key]);
            }
         }
         $search = $db->searchVoyage($gare_arriver, $gare_depart);

         $data['title'] = "Retour le : " . $date_fin . "  trajet : " . $gare_arriver . " - " . $gare_depart;
         $data['voyages'] = $search;

         view::load('includes/voyagesSearch', $data);
      }
   }




   public function Login($msg)
   {
      $data['msg'] = $msg;
      view::load('includes/header');

      view::load('loginClient', $data);
   }
   public function signUp()
   {

      if (isset($_POST['submit'])) {

         $nom = $_POST['nom'];
         $prenom = $_POST['prenom'];
         $email = $_POST['email'];
         $pass = $_POST['password'];
         $tel = $_POST['tel'];

         $db = new client();
         if ($db->signUp($email, $nom, $prenom, $tel, $pass)) {
            header("Location: " . BURL . "Voyage/Login/0");
         } else
            echo "<script>  alert('change email'); </script>";
         //   header("Location: ".BURL."Voyage/Login");
         $this->Login("ok");
      }
   }

   public  function signIn()
   {

      if (isset($_POST['submit'])) {


         $email = $_POST['email'];
         $pass = $_POST['password'];


         $db = new client();
         $result = $db->verifyLogin($email, $pass);


         if ($result != 0) {
            session_start();
            $_SESSION['isLogin'] = 1;
            $_SESSION['id_client'] = $result[0]['id_client'];
            $_SESSION['email'] = $result[0]['email'];
            $_SESSION['nom'] = $result[0]['nom'];
            $_SESSION['prenom'] = $result[0]['prenom'];
            $_SESSION['tel'] = $result[0]['tel'];
            header("Location: " . BURL . "Voyage");
         } else   header("Location: " . BURL . "Voyage/Login/1");
      }
   }


   public function logOut()
   {

      session_start();
      session_destroy();
      header("Location: " . BURL . "Voyage");
   }


   public function profileC()
   {
      if (!isset($_SESSION)) {
         session_start();
      }
      $client = new client();
      $id_client = $_SESSION['id_client'];


      $data['client'] = $client->getClient($id_client);

      view::load('includes/header');
      view::load('profileClient', $data);
   }

   public function profileCEdit()
   {
      if (!isset($_SESSION)) {
         session_start();
      }
      $id_client = $_SESSION['id_client'];

      $client = new client();
      $data['client'] = $client->getClient($id_client);
      $oldEmail = $data['client'][0]['email'];
      $msg = 0;
      $msgP = 0;
      $success = 0;


      if (isset($_POST['submit'])) {

         $nom = $_POST['nomC'];
         $prenom = $_POST['prenomC'];
         $email = $_POST['emailC'];
         $tel = $_POST['telC'];
         $pass = $_POST['passC'];
         $new_pass = $_POST['nPassC'];
         $confirm_new_pass = $_POST['cNPassC'];
         $pass1 = $pass;

         if (!empty($new_pass) && !empty($confirm_new_pass)) {
            if ($confirm_new_pass == $new_pass) {
               $pass1 = $new_pass;
            } else {
               $msgP = "password not the same";
               $pass1 = $pass;
            }
         }



         if ($client->verifyLogin($oldEmail, $pass) != 0) {
            if ($email == $oldEmail) {
               $client->updateClient($id_client, $prenom, $nom, $email, $pass1, $tel);
               //  $success="Bien modifier ! 1";

            } elseif ($client->getIdClient($email) == 0) {
               $success = "Bien modifier ! 2";

               $client->updateClient($id_client, $prenom, $nom, $email, $pass1, $tel);
            } else {
               $msg = " email deja utilisé";
            }
         } else {
            $msg = "le mot de pass est erroné";
         }
      }

      $data['msg'] = $msg;
      $data['msgP'] = $msgP;
      $data['success'] = $success;
      $data['client'] = $client->getClient($id_client);


      // $this->profileC();
      view::load('includes/header');

      view::load('profileClient', $data);
   }
}
