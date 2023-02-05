<?php
session_start();
$theUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="inde.css" >
    <link rel="stylesheet" type="text/css" href="includes/fonts/css/all.css">
    <title>Karak Car Service</title>
</head>
<body>
  


    <div class="container-fluid header">
                <div class="row ">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-sm fixed-top">
                            <div class="navbar-brand">
                                <h3 class="logo">KCS</h3>
                                <small>Travel Fast</small>
                            </div>




                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsiblenavbar">
                    <span class="navbar-toggler-icon" style="color:white; font-size: 1em;" ><i class="fa fa-bars"></i></span>
                    </button>


                                <div class="collapse navbar-collapse navbar" id="collapsiblenavbar"
                    >  

                <ul class="navbar-nav nav-pills ml-auto">


                    <?php
                    if(isset($_SESSION['UserName'])){
                        ?>
                         <li class="nav-item dropdown"><img src="includes/imag.png" class="nav-link dropdown-toggle img" data-toggle="dropdown">
                        <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="USERS/updateUser.php" class="nav-link">My Profile</a></li>
                        <li class="dropdown-item">
                        <form action="USERS/LogOut.php" method="POST">
                            <input type="submit" value="LogOut" name="logout">
                     </form></li>
                            <li class="divider"><hr></li>
                            <li class="dropdown-item"><a href="php/SignUP.php" class="nav-link">Driver Login</a></li>
                            <li class="dropdown-item"><a href="Admin/Admin.php" class="nav-link">Admin Login</a></li>

                    </ul></li>
                    <?php } else {?>


                    <li class="nav-item dropdown"><a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Login</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="php/SignUP.php" class="nav-link">Driver Login</a></li>

                            <li class="dropdown-item"><a href="USERS/users.php" class="nav-link">User Login</a></li>
                            <li class="divider bg-light"><hr></li>
                            <li class="dropdown-item"><a href="Admin/Admin.php" class="nav-link">Admin Login</a></li>
                    

                        </ul></li><?php } ?>
                          <li class="nav-item"><a href="" class="nav-link">How it works</a></li>

                    
                          <li class="nav-item"><a href="Databases/DB.php" class="nav-link">Get A RIDE</a></li>

                                                       </ul>



                            </div>
                        </nav>
                    </div>
                    <div class="col-md-6 main">
                        <h3>KARAK CAB SERVICE</h3>
                        <p>GET FAST TO YOUR DESTINATION</p>
                    </div>
                </div>
            </div>
            <section id="services" class="services container-fluid">
            <div class="row">
            <div class="col-sm-9 ml-auto">
            <h4 class=" ml-auto">IN A HURRY ? BOOK A KCS CAB</h4>
            <hr class="bg-info col-sm-6" style="height:3px;" />
            </div>
            </div>
            <div class="row">
            <div class="col-sm-9 ml-auto ">
            <p>
            We are always here to help you reach your destination fast.<br>
            Request what you need and we will serve you the best way possible.</p>
            <a href="Databases/DB.php">BOOK NOW</a>

            </div>
            </div>
            </section>
            <section id="working" class="container-fluid">
            <div class="row ">
            <div class="col-sm-9">
            <h4>HOW YOU WILL GET YOUR CAB (as a user)</h4>
            <hr class="bg-dark" />
            </div>
            </div>
            <div class="row mb-5">
            <div class="col-sm-12">
            <a href="videos.html" class="col-md-3 ml-auto">Watch the Video</a> (or read the manual below<i class="fa "></i>)<br><br>
            <p id="manual" class="ml-auto">
            <span id="number">1</span> <a href="USERS/users.php">Create your profile</a> by simply Entering your Name,Number and Password.<br>
            <span id="number">2</span> Hit the <a href="Databases/DB.php">GET RIDE</a> button to see the drivers around you(make sure your GPS location is on).<br>
            <span id="number">3</span> Click on the cab near to you to see driver info.<br>
            <span id="number">4</span> Hit the BOOK button at the top and you will have that cab in a moment.<br>
            </p>
            <hr class="bg-info">
            

            </div>
            </div>


            <div class="row mt-5">
            <div class="col-sm-9">
            <h4>HOW YOU WILL WORK WITH KCS (as a Driver)</h4>
            <hr class="bg-dark" />
            </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
            <a href="videos.html" class="col-md-3 ml-auto">Watch the Video</a> (or read the manual below<i class="fa "></i>)<br><br>
            <p id="manual" class="ml-auto">
            <span id="dnumber">1</span><a href="php/SignUP.php"> Create Your Profile</a> by Entering your Basic information like
            Name,Phone Number,License Number,CNIC,password,Your Transport Type and an Image <br>
            <span id="dnumber">2</span> Now <a href="php/SignUP.php">Login</a> to your account and hit the <button>GO ONLINE</button> <br>
            <span id="dnumber">3</span> Stay Online to recieve request .<br>
            <span id="dnumber">4</span> Upon recieving request you will be guided by the website . <br>
            <span id="dnumber">5</span> Hit the <button>GO OFFLINE </button> to take a break</p>
            <hr class="bg-info">
            

            </div>
            </div>
            </section>









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
   
                        <p class="Github"> Contribute at <a href="https://github.com/vickyktk/KCS/tree/master"><i class="fa fa-github"></i></a></p>
   
                        <p><a href="Admin/Admin.php">Admin Login</a></p>
   
                    </footer>
                </div>
            </div>
        </div>

        <script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>