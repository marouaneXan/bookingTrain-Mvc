<?php 
 include(VIEWS.'includes/header.php');
?>
<section
      class=" text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start"
    >
      <div class="container">
        <div class="d-sm-flex  justify-content-between">
          <div>
            <h1 class="text-dark"> choose your <span class="text-info"> trajets </span></h1>

      <form action="<?php echo BURL;?>voyage/searchVoyage" method="POST">
      <br>
      <div class="row g-2 ">
               <div class="col-6">
            <label  class="text-dark" for=""> Gar de départ</label>
              
               <input class="form-control" list="datalistDepart" id="gareDepartI" name="gareDepartI" placeholder="Gar de depart" required>
    
                          <datalist id="datalistDepart">
                          <option value="casa">
                          <option value="settat">
                          <option value="safi">
                          <option value="berrechid">
                          <option value="tanger">
                          <option value="marrakech">
                          <option value="rabat">
                          </datalist>
            </div>
           <div class="col-6">
            <label  class="text-dark" for=""> Date de départ</label>
           <input type="date"    id="dateDepartI" name="dateDepartI" class="form-control"  placeholder="Gar de depart" aria-describedby="date" required>       
                  </div>
  
          </div>  
          
         
          <br>
          <div class="row g-2 ">
               <div class="col-6">
            <label  class="text-dark" for=""> Gar d'arriver</label>
               
               <input class="form-control" list="datalistArriver" id="gareArriverI" name="gareArriverI" placeholder=" Gar d'arriver" required>
                        <datalist id="datalistArriver">
                        <option value="casa">
                        <option value="settat">
                        <option value="safi">
                        <option value="berrechid">
                        <option value="tanger">
                        <option value="marrakech">
                        <option value="rabat">
                        </datalist>

                </div>
           <div class="col-6">
           <label  id="dateArriverL" class="text-dark" for=""  style="display:none"> Date de retour</label>
           
           <input   style="display:none" type="date"   id="dateArriverI" name="dateArriverI" class="form-control" aria-describedby="date" >       
 
                  </div>
  
          </div>
           
          
    <Br>
          <div class="col-12">
              
          
          <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" onclick="diplayBox()" name="radioAller" id="inlineRadio1" value="option1">
                <label class="form-check-label text-dark" id="inlineRadio1l" for="inlineRadio1">Aller-Retour</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input " type="radio" onclick="antiDiplayBox()" name="radioAller" id="inlineRadio2" value="option2" checked>
  <label class="form-check-label text-dark" for="inlineRadio2">Aller simple</label>
</div>
    

          </div>
          <div class="row g-2 ">       
          <label  class="text-dark" for=""> nombres de places</label>
               
          <select class="form-select"  name="placeI" id="id_train" aria-label="Default select example" required>
               <option selected>Places</option> 
                          <?php 
                          for($i=1;$i<=10;$i++){
                               echo" <option value= ".$i.">".$i."</option>  ";


                          }
                       
                        ?>
                        </select>
                        
        </div>

         
          <button  type="submit" class="btn btn-primary mt-3">Show </button>


      </form>
            
        
          </div>
          <img
            class="img-fluid w-50 d-none d-sm-block"
            src="<?php echo BURL; ?>/img/section1.svg"
            
            alt=""
          />


        </div>
      </div>
    </section>
    <link    rel="stylesheet" href="<?php echo BURL; ?>/css/header.css">
    <script src="<?php echo BURL; ?>/js/client.js"></script>