<?php if(isset($msg) && $msg==1):?> 
  <div class="alert alert-danger" role="alert">
  le mot de pass ou email erroné

    </div> <?php endif ?>

<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap 5 Login Form Example</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
      
        <div class="container-fluid vh-100" style="margin-top:50px">
        
            <div class="" style="margin-top:100px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Sign In</h3>
                        </div>
                        <form action="<?php echo BURL ?>voyage/signIn"  method="POST">
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" name="email" class="form-control" placeholder="email">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password"  name="password" class="form-control" placeholder="password">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                                <button class="btn btn-primary text-center mt-2" name="submit" type="submit">
                                    Login
                                </button>
                               
                                <p class="text-center text-primary">Forgot your password?</p>
                            </div>
                        </form>
                        <p class="text-center mb-4">Don't have an account?
                                    <Button  type ="submit" name="submit" class="btn btn-info text-center mt-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sign Up</Button>
                                </p>  

                    </div>
                </div>
            </div>
        </div>


        
<!-- Modal  add voyage-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      
      <div class="alert alert-danger" style="display:none"  id ="errorHeure" role="alert">
      <p id="errorHeureP">  </p>
    
    </div>
            
<div class="alert alert-danger"  style="display:none" id="errorGare" role="alert">
<p id="errorGareP">  </p>


</div>
<!-- form singUp -->
      <form action="<?php echo BURL ?>Voyage/signup" method="POST"  onsubmit="return formCheck();">

        <div class="row g-2 ">
               <div class="col-6">
                 <input type="text" name="nom"   id="nom"class="form-control" placeholder="nom" required>
            </div>
           <div class="col-6">
                <input type="text"  name="prenom" id="prenom" class="form-control" placeholder="prenom" required>
       
                  </div>
  
          </div>

        

  <br>
  <div class="row g-2 ">
               <div class="col-6">
                 <input type="email" name="email"   id="email" class="form-control" placeholder="email@exemple.com" required>
            </div>
           <div class="col-6">
                <input type="number"  name="tel" id="tel" class="form-control" placeholder="tel" required>
       
                  </div>
  
          </div> 
          
          
          <br>

          <div class="row g-2 ">
               <div class="col-6">
                 <input type="password"  name ="password" id ="password" class="form-control" placeholder=" password" required>
                 
            </div>
          
          
  
          </div>
          
      </div>

      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button name="submit"  type="submit" class="btn btn-primary">submit</button>
      </div>
    </div>
  </div>
</div>
</form>



    </body>

</html>