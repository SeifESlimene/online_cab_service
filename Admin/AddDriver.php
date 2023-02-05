

<?php
include_once "AdminLogin.php";
 if(!isset($_SESSION['AdminName'])){
     header("Location:Admin.php");
     exit();

 }
?><!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../php/SignUP.css">
        <link rel="stylesheet" type="text/css" href="../includes/fonts/css/all.css">
        <title></title>
    </head>
    
    <body>
    
    <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-sm bg-dark">
                        <div>
                            <a href="" class="navbar-brand mr-auto text-center">Admin Dashboard<br>
                            <p>KCS</p></a>
                            
                        </div>
    
    
    
                    </nav>
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
                    <h4 class="ml-auto mr-auto"><u>Create User Account Here</u></h4>
                   
                </div>
                <div class="row">

           <form action="AdminAdd.php" class="Signup ml-auto mr-auto" enctype="multipart/form-data" method="POST">
       
           
       
       <input type="text" name="Name" placeholder="USERNAME" class="form-control-sm" required><br>
       <input type="text" name="number" placeholder="mobile number"
       class="form-control-sm" required><br>
       
       
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
    
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> 
       </body>
    </html>
    