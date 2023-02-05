

<?php
include_once "Login.php";
 if(isset($_SESSION['Dname'])){
     header("Location:Show.php");
     exit();

 }
?><!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="SignUP.css">

        <link rel="stylesheet" type="text/css" href="../includes/fonts/css/all.css">
        <title></title>
    </head>
    
    <body>
    
    <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-sm bg-dark">
                        <div>
                            <a href="" class="navbar-brand text-center logo">KCS<br>
                            <p>Travel Fast</p></a>
                            
                        </div>
    
    
    
                <button class="navbar-toggler ml-auto" type="button"
                data-toggle="collapse" data-target="#collapsiblenavbar"> <span
                class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                </button>
    
    
                            <div class="collapse navbar-collapse navbar" id="collapsiblenavbar"
                >  
    
            <ul class="navbar-nav nav-pills ml-auto">
                <li class="nav-item"><a href="../index.php" class="nav-link ">Home</a></li>
                <li class="nav-item"><a href="../index.php#services" class="nav-link">Services</a></li>
                <li class="nav-item dropdown"><a href="" class="nav-link dropdown-toggle active" data-toggle="dropdown">Login</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="../USERS/users.php" class="nav-link ">User Login</a></li>
    
                        <li class="dropdown-item"><a href="../Admin/Admin.php" class="nav-link ">Admin Login</a></li>
                    </ul></li>
                                <li class="nav-item"><a href="" class="nav-link">How it works</a></li>
                </ul>
    
    
    
                        </div>
                    </nav>
                </div>
            </div>
    
        <!-------------------------SignIN Form --------------------------------->
    
        <div class="container-fluid mt-3 bg-dark form">
            <div class="col-sm-12">
                <div class="row">
                    <form class="form-inline ml-auto sign-in" action="LogIn.php" method="POST">
                        <input type="number" name="number" placeholder="Your number" class="form-control-sm">
                        <input type="password" name="Password" class="form-control-sm" placeholder="Your Password">
                        <input type="submit" name="LogIn" value="LOGIN" class="form-control-sm btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    
        <!----------------------- Form ---------------------------------- -->
    
        <div class="container-fluid mt-5 div-signup">
            <p class="col-sm-12">
            <?php $theUrl="http://S_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($theUrl,"submit=nameError")==true){ ?>

            <div class="alert alert-danger" role="alert">
            Please Enter a name of at least 4 characters</div>
            <?php }
            elseif(strpos($theUrl,"submit=NumberError")==true){ ?>
            
            <div class="alert alert-danger" role="alert">
            Please Enter a number of 10 OR 11 Digits</div>
            <?php } 
            elseif(strpos($theUrl,"submit=passError")==true){ ?>
            
            <div class="alert alert-danger" role="alert">
            Please Enter Password of at least 6 characters</div>
            <?php }
            elseif(strpos($theUrl,"submit=namePresent")==true){ ?>
            
                <div class="alert alert-danger" role="alert">
                The Entered Username is taken,try another name Please!!!</div>
                <?php }
                 elseif(strpos($theUrl,"submit=numberPresent")==true){ ?>
            
                    <div class="alert alert-danger" role="alert">
                    The Entered Number is taken</div>
                    <?php }
                     elseif(strpos($theUrl,"submit=LicencePresent")==true){ ?>
            
                        <div class="alert alert-danger" role="alert">
                        The Entered CNIC Number is taken,Enter Your own CNIC</div>
                        <?php }
                         elseif(strpos($theUrl,"submit=CNICPresent")==true){ ?>
            
                            <div class="alert alert-danger" role="alert">
                            The Entered Licence Number is taken</div>
                            <?php }
                 elseif(strpos($theUrl,"submit=CNICError")==true){ ?>
            
                    <div class="alert alert-danger" role="alert">
                Please Enter a Coorect ID Card number with dashes</div>
                 <?php }
                  elseif(strpos($theUrl,"submit=imgExtErr")==true){ ?>
            
                    <div class="alert alert-danger" role="alert">
                Please Provide an image with following extensions(jpg,jpeg,png)</div>
                 <?php }
                 elseif(strpos($theUrl,"submit=imgbasicErr")==true){ ?>
            
                    <div class="alert alert-danger" role="alert">
                Sorry there was an error with image,Please Try Again</div>
                 <?php }
                 elseif(strpos($theUrl,"submit=imgSizeErr")==true){ ?>
            
                    <div class="alert alert-danger" role="alert">
                The image size shouldnt exceeds 5MB</div>
                 <?php }
                elseif(strpos($theUrl,"submit=Success")){
                    ?>
                    <script>
                      alert("WELL DONE!!! You Are Signed Up");
                    </script>
                    <?php
                }
                elseif(strpos($theUrl,"LogIn=failed")){
                    ?>
                    <script>
                      alert("The Entered Username or Password is wrong");
                    </script>
                    <?php
                }
                   elseif(strpos($theUrl,"accDltd")){
                       ?>
                       <script>
                         alert("Your Account has been deleted successfully");
                       </script>
                       <?php
                   }
                   elseif(strpos($theUrl,"updated")){
                       ?>
                       <script>
                         alert("Your Account has been Updated successfully");
                       </script>
                       <?php
                   }
             ?>
                <div class="row">
                    <h4 class="ml-auto mr-auto"><u>Create Your Account Here</u></h4>
                   
                </div>
                <div class="row">

           <form action="DrSignup.php" class="Signup ml-auto mr-auto" enctype="multipart/form-data" method="POST">
       
           
       
       <input type="text" name="Name" placeholder="USERNAME" class="form-control-sm" required><br>
       <input type="text" name="number" placeholder="mobile number"
       class="form-control-md" required><br>
       
       
       <input type="text" name="Licence" placeholder="Driving License number" 
       class="form-control-sm" required><br>
       
       <input type="text" name="CNIC" placeholder="CNIC number"
       class="form-control-sm" required><br>
       <input type="password" name="pass" placeholder="Password"
       class="form-control-sm" required><br>
       Your Vehical Type:<br>
       <select name="select">
       <option>Car</option>
       <option>Bike</option>
       </select><br>
       
    
       Your Picture:<input type="file"  name="image" class="form-control-sm" required><br>
       <input type="submit" name="submit" value="Signup" class="submit btn btn-info form-control-sm"> 
       </form>
                </div>
            </div>
        </div>
    
        <!-- Footer  -->
        <div class="container-fluid bg-dark mt-5">
            <div class="row">
                <div class="col-md-12">
                    <p class="rights">@2019 All Rights Reserverd</p>
                    <footer class="social">
                        <p>Follow us at <ul class="list-group">
                            <li class="list-item "><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li class="list-item "><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li class="list-item "><a href=""><i class="fa fa-youtube"></i></a></li>
                            
                        </ul></p>
   
                        <p class="Github"> Contribute at <a href=""><i class="fa fa-github"></i></a></p>
   
                        <p><a href="../Admin/Admin.php">Admin Login</a></p>
   
                    </footer>
                </div>
            </div>
        </div>
        <script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
</body>
    </html>
    