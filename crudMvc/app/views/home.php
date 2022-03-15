
<?php
session_start();
if(!isset($_SESSION['is_logedin'])){
    header('Location: '.BURL.'admin');}

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
                        <a href="http://localhost/crudMvc/public/Voyage"  class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                      
                    </li>
                    
                  
                  
                    <li>
                        <a href="http://localhost/crudMvc/public/admin/voyageAnnuler/" class="nav-link px-0 align-middle">
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
                       
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?php echo BURL; ?>/admin/logout">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
<!-- Button trigger modal -->
<button type="button" onclick="resetForm()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
+Add Voyage
</button>

<!-- Modal  add voyage-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> add Voyage</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      
      <div class="alert alert-danger" style="display:none"  id ="errorHeure" role="alert">
      <p id="errorHeureP">  </p>
    
    </div>
            
<div class="alert alert-danger"  style="display:none" id="errorGare" role="alert">
<p id="errorGareP">  </p>


</div>
<!-- form add -->
      <form action="http://localhost/crudMvc/public/admin/addVoyage/" method="POST"  onsubmit="return formCheck();">

        <div class="row g-2 ">
               <div class="col-6">
                 <input type="text" name="gare_depart"   id="gare_depart"class="form-control" placeholder="gare Depart" required>
            </div>
           <div class="col-6">
                <input type="text"  name="gare_arriver" id="gare_arriver" class="form-control" placeholder="Gare d'arriver" required>
       
                  </div>
  
          </div>

        

  <br>
          <div class="row g-2">
               <div class="col-6">
                 <label for="inputMDEx1"> depart </label>
              <input type="time" name="heure_depart" id="heure_depart"  class="form-control" required>
            </div>
           <div class="col-6">
           <label for="inputMDEx1">Arriver</label>
              <input type="time"  name="heure_fin"  id="heure_fin" class="form-control" required>
                  </div>
  
          </div>
  <br>
          
          <div class="row g-2 ">
               <div class="col-6">
               <select class="form-select"  name="id_train" id="id_train" aria-label="Default select example" required>
               <option selected>select train</option> 
               <?php foreach($train as $row):?>
      
              <option value=<?php echo $row["id_train"] ?>><?php echo $row["nom_train"] ?></option>
     <?php endforeach ?>
</select>
            </div>
           <div class="col-6">
           <select name="etat_voyage" id="etat_voyage" class="form-select" aria-label="Default select example" required>
  <option selected>Etat Voyage</option>
  <option value="dispo">dispo</option>
  <option value="indispo">indispo</option>
</select>
                  </div>


  
          </div>
          <br>

          <div class="row g-2 ">
               <div class="col-6">
                 <input type="number"  name ="prix" id ="prix" class="form-control" placeholder=" prix" min=0 required>
                 
            </div>
            <div class="col-6" id ="id_voyageV" style="visibility:hidden;" >
                 <input type="number"  name ="id_voyage" id ="id_voyage" class="form-control" placeholder=" id" min=0  >
                 
            </div>
          
  
          </div>
          
      </div>

      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button name="submit"  type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
</form>
            <!-- Boxes -->
    <section class="p-5">
      <div class="container">
        <div class="row text-center g-4">
          <div class="col-md">
            <div class="card bg-dark text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <i class="bi bi-laptop"></i>
                </div>
                <h3 class="card-title mb-3">Clients</h3>
                <h3 class="card-title mb-3">2423</h3>

               
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="card bg-secondary text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <i class="bi bi-person-square"></i>
                </div>
                <h3 class="card-title mb-3">Voyage</h3>
                <h3 class="card-title mb-3"><?php echo count($voyages);?></h3>

              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card bg-dark text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <i class="bi bi-people"></i>
                </div>
                <h3 class="card-title mb-3">Reservations</h3>
                <h3 class="card-title mb-3">121</h3>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
                <!-- all VOYAGES -->
    <p class="font-monospace text-center fw-bolder fs-1">ALL VOYAGES</p>


    <table class="table">
  <thead>
    <tr>
      <th scope="col">id Voyage</th>
      <th scope="col">gare depart</th>
      <th scope="col">gare d'arriver</th>
      <th scope="col">prix</th>
      <th scope="col">heure de depart</th>
      <th scope="col">heure d'arriver</th>
      <th scope="col">id train</th>
      <th scope="col">nom du train</th>
      <th scope="col">etat du voyage</th>
      <th scope="col">edit </th>
      <th scope="col">cancel </th>
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
                            <td><?php echo $row['id_train']; ?></td>
                            <td><?php echo $row['nom_train']; ?></td>
                            <td><?php echo $row['etat_voyage']; ?></td>

                            
                            <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="showUpdateBox('<?php echo $row['id_voyage']; ?>','<?php echo $row['gare_depart']; ?>','<?php echo $row['gare_arriver']; ?>','<?php echo $row['prix'] ;?>','<?php echo $row['heure_depart'] ;?>','<?php echo $row['heure_arriver'] ;?>','<?php echo $row['id_train'] ;?>','<?php echo $row['etat_voyage'];?>')">Edit</button>
                            </td>
                             <td>
                               
                             <button type="but ;ton" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="paasingIdVoyagePoup('<?php echo $row['id_voyage'];?>')">Cancel</button>
                            </td>
                        </tr>
                <?php endforeach ?>    
    
                </tbody>
      </table>
            <!-- Button trigger modal -->


<!-- Modal  cancel voyage-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">choose date canceling</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action="http://localhost/crudMvc/public/admin/annulerVoyage/" method="POST"  >
       
          <div class="col-auto">
          <input type="date"  name="dateVoyage" id="date" class="form-control" aria-describedby="date">
           </div>
           <div class="col-auto" style="display:none">
          <input type="text" id="id_voyageA" name="id_voyageA" class="form-control" aria-describedby="date">
           </div>
       
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit"  name ="submit"class="btn btn-primary">valider</button>
        </form>
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

            