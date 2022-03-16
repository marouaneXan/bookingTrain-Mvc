
<?php
    session_start();
if(!isset($_SESSION['is_logedin'])){
    header('Location: '.BURL.'admin');

}
?>


      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- <script src="../../public/js/homeAdmin.js"></script> -->

    <title>Document</title>
</head>
<body id="body-pd">
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                  
                <li>
                <a href=" <?php echo BURL?>admin/homeAdmin"  class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                      
                    </li>
                    
                  
                  
                    <li>
                    <a href=" <?php echo BURL?>admin/voyageAnnuler" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Voyage Annuler</span> </a>
                    </li>   
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">admin</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href= "<?php echo BURL; ?>/admin/logout">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">

            <!-- Boxes -->
    
                <!-- all VOYAGES -->
    <p class="font-monospace text-center fw-bolder fs-1">ALL VOYAGES CANCELED</p>


    <table class="table">
  <thead>
    <tr>
      <th scope="col">id Voyage</th>
      <th scope="col">gare depart</th>
      <th scope="col">gare d'arriver</th>
      <th scope="col">prix</th>
      <th scope="col">heure de depart</th>
      <th scope="col">heure d'arriver</th>
      <th scope="col">date voyage</th>
      <th scope="col">nom du train</th>
      <th scope="col">anuler</th>
      
    </tr>
  </thead>
  <tbody>

           <?php foreach($voyages as $row): ?>
                        <tr>
                            <td><?php echo $row["id_voyage"] ?></td>
                            <td><?php echo $row['gare_depart']; ?> <b class="float-right">  </b></td>
                            <td class="text-center"><?php echo $row['gare_arriver']; ?></td>
                            <td><?php echo $row['prix']; ?> <b class="float-right"> $ </b></td>
                         
                            <td><?php echo $row['heure_depart']; ?></td>
                            <td><?php echo $row['heure_arriver']; ?></td>
                            <td><?php echo $row['dateVoyage']; ?></td>
                            <td><?php echo $row['nom_train']; ?></td>
                            <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Annuler</button>
                            </td>
                        
                        </tr>
                <?php endforeach ?>    
    
                </tbody>
      </table>
            <!-- Button trigger modal -->



      </div>
    </div>
  </div>
</div>

        </div>
        
    </div>
    
</div>



   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="<?php echo BURL; ?>/js/homeAdmin.js"></script>

</body>

</html>

            