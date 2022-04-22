                <?php    if(!isset($_SESSION)) 
                {  session_start(); } 
                if(  isset($_SESSION['is_logedin']) && $_SESSION['is_logedin'] == 1){
                header('Location: '.BURL.'admin/homeAdmin');
                }?>

<html lang="en">
    

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminLogin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
        <div class="container-fluid vh-100" style="margin-top:80px">
            <div class="" style="margin-top:200px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                                <?php if(isset($msg) && $msg==0):?> 
                                <div class="alert alert-danger" role="alert">
                                Incorrect username or password.
                                </div>  <?php endif;?>


                            <h3 class="text-primary">Login Admin</h3>
                        </div>
                        <form action="<?php echo BURL?>admin/verifyLogin/" Method="POST">
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text"  name ="username"class="form-control" placeholder="Username">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" class="form-control" name="pass" placeholder="password">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                                <button class="btn btn-primary text-center mt-2" type="submit" name="submit">
                                    Login
                                </button>
                                </p>
                                <p class="text-center text-primary">Forgot your password?</p>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>