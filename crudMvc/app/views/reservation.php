<script src="<?php echo BURL; ?>/js/reservation.js"></script>

<section class=" gradient-custom">
        <H1  class="text-center"   style="color:white;"> Reservation :</H1>
<div class="container">
    <div class="row justify-content-center align-items-center ">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"> les informations voyageurs   </h3>
            <form class=""  action ="<?php echo BURL?>reservation/validerReservation/<?php echo $id_voyage?>/<?php echo $date_voyage ;?>/<?php echo $nbrPlaces ;?>" id="a" method="POST">

            
      

             
               
                <div class="passager" id="passager">

                <!-- <i class=" fa-plus" aria-hidden="true"></i> -->

                <h5 id="passagerNum" > passager 1  </h5>
                <div class="row">
                <div class="col-md-6 mb-2">

                  <div class="form-outline">
                    <input type="text" value="<?php if (isset($_SESSION['isLogin'])) echo $_SESSION['prenom'];?>" name ="nomP1" id="firstName" class="form-control form-control-lg" required/>
                    <label class="form-label" for="firstName">First Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class=  >
                    <input type="text" value=" <?php if (isset($_SESSION['isLogin']))echo $_SESSION['nom'];?>"  name ="prenomP1" id="lastName" class="form-control form-control-lg" required/>
                    <label class="form-label" for="lastName">Last Name</label>
                  </div>

                </div>
              </div>

             

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" value="<?php  if (isset($_SESSION['isLogin']))echo $_SESSION['email'];?>"  name ="emailP1" id="emailAddress" class="form-control form-control-lg" required/>
                    <label class="form-label" for="emailAddress">Email</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 2">

                  <div class="form-outline">
                    <input type="tel"  value="<?php if (isset($_SESSION['isLogin'])) echo $_SESSION['tel'];?>" name ="telP1" id="phoneNumber" class="form-control form-control-lg" required/>
                    <label class="form-label" for="phoneNumber">Phone Number</label>
               
               
               
                  </div>

                </div>
                
              </div>
             
             

                      </div> 
                      </div> 
                      <div class="col-md-8 mb-4 pb-2 m-auto"> 
                      <!-- <h5 id="addPassager" class="text-info" onclick="addPassager();">  + add passager</h5>    -->
      
                      <button class="btn btn-primary btn-lg form-control mb-6" id="submit" name ="submit" type="submit" > valider </button>

                      </div>
                    
              

            </form>
            
            
           
          </div>
          
        </div>
        
      </div>
      
    </div>
  </div>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Votre Reservation : </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Votre Reservation a été bien passer
     
        <i class=" fa fa-thin fa-check"></i>
        Bon Voyage

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
        
      </div>
    </div>
  </div>
</div>
  
  
</section>



