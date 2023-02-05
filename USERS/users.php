
<?php
include "userLogIN.php";
 if(isset($_SESSION['Userid'])){
     header("Location:../index.php?LOGGED");
     exit();

 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../includes/fonts/css/all.css">
    <link rel="stylesheet" href="users.css" >
    <title></title>
</head>
<body>
    
      <!------------------ header ------------------->


		<div class="row">
			<div class="col-sm-12">
				<nav class="navbar navbar-expand-sm bg-dark">
					<div>
						<a href="" class="navbar-brand text-center	 logo">KCS<br>
						<p>Travel Fast</p></a>
						
					</div>



			<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsiblenavbar">
          	<span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
            </button>


                        <div class="collapse navbar-collapse navbar" id="collapsiblenavbar"
            >  

		<ul class="navbar-nav nav-pills ml-auto">
			<li class="nav-item"><a href="../index.php" class="nav-link ">Home</a></li>
			<li class="nav-item"><a href="../index.php#services" class="nav-link">Services</a></li>
			<li class="nav-item dropdown"><a href="" class="nav-link dropdown-toggle active" data-toggle="dropdown">Login</a>
				<ul class="dropdown-menu">
					<li class="dropdown-item"><a href="../php/SignUP.php" class="nav-link ">Driver Login</a></li>

					<li class="dropdown-item"><a href="" class="nav-link active disabled">User Login</a></li>
				</ul></li>
							<li class="nav-item"><a href="" class="nav-link">How it works</a></li>
			</ul>



					</div>
				</nav>
			</div>
		</div>

    <div class="container-fluid mt-5 signIn">
        <div class="row">
        <div style="color:white;" class="mr-3"><h2>Sign In Here</h2></div>
            <div class="col-md-12 ml-auto">
                
          <form action="userLogIN.php" method="POST" class="sigNIn form-inline">
          
                <input type="text" name="name" class="form-control" placeholder="username/Number" id="LogIN" required>
                <input type="password" name="Password" placeholder="password" class="form-control" required>
                <input type="submit" name="submit" value="SignIn" class="in btn btn-success form-control">
                

            </form>
            </div>

        </div>

    </div>
    
    <div class="container-fluid mt-5 mb-5  SIGNUP-FORM">
        <div class="row ">
            <div class="col-md-9 ml-auto mr-auto">
                

            <h2 class="heading">Create an Account </h2><span style="background-color:red;">(If you dont have one)</span>
            <hr class="bg-light">
            <?php $theUrl="http://S_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($theUrl,"submit=NamePresent")==true){ ?>

            <div class="alert alert-danger" role="alert">
            The Entered name is already Present ,please Enter a unique UserName</div>
            <?php }
            elseif(strpos($theUrl,"submit=NumPresent")==true){ ?>
            
            <div class="alert alert-danger" role="alert">
            The Entered number is already Present ,please Enter a unique Number</div>
            <?php } 
            elseif(strpos($theUrl,"submit=passError")==true){ ?>
            
            <div class="alert alert-danger" role="alert">
            Please enter a Strong password of at least 6 charcters including text & Digits</div>
            <?php }  
            elseif(strpos($theUrl,"submit=nameError")==true){ ?>
            
            <div class="alert alert-warning" role="alert">
            Please Enter a name of at least 4 characters</div>
            <?php }   
            elseif(strpos($theUrl,"submit=numError")==true){ ?>
            
            <div class="alert alert-warning" role="alert">
            Please Enter a valid number of 10 OR 11 digits</div>
            <?php }
            elseif(strpos($theUrl,"submit=deleted")==true){  ?>
            <script>alert('Youe account has been deleted successfully !!!')</script>
           <?php  } ?>
            
            <br><br>
            <form action="userSIGN.php" method="POST" class="sigNUP">
                <input type="username" name="username" class="form-control" placeholder="username" required><br>
                <input type="text" name="NUM" placeholder="Mobile number" class="form-control" required><br>
                <input type="password" name="pass" placeholder="password" class="form-control" required><br>
                
                <input type="submit" name="submit" value="SignUP" class="btn btn-success form-control" class="submit">
                <hr style="background-color:black;">
            </form>
                            
                 <div class="col-md-9">
                 
                 <button class="btn btn-danger google">SignIn With Google </button>
                 <button class="btn btn-info">SignIn With Facebook </button>
                 </div>
            
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
                            <li class="list-item "><a href=""><i class="fab fa-facebook"></i></a></li>
                            <li class="list-item "><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li class="list-item "><a href=""><i class="fab fa-youtube"></i></a></li>
                            
                        </ul></p>
   
                        <p class="Github"> Contribute at <a href=""><i class="fab fa-github"></i></a></p>
   
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

<?php
  $theUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  //Echoing ERROR MESSAGES


  if(strpos($theUrl,"submit=empty")==true){
      echo "<p>Please fill Out all the fields</p>";
  } elseif(strpos($theUrl,"password=wrong")==true){
    ?>
    <script>
       alert("Entered UserName or Password is Wrong");
    </script>
    <?php
} elseif(strpos($theUrl,"submit=success")==true){
    ?>
    <script>
       alert("Great!!! You have Successfully Signed Up , Now please SignIn");
    </script>
    <?php
}


?>
