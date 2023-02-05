<?php
    include "AdminLogin.php";
    if(!isset($_SESSION['AdminName'])){
?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="inde.css">
			<title></title>
         <style>
         body{
            color:white;
            text-transform:uppercase;

         }</style>
		</head>

		<body class="bg-dark">
      <div class="container  mt-5">
      <div class="row">
      <div class=" col-md-12  ">
         <div class="row">
            <div class="col-md-6">
            <div>
            <h4 style=" font-size:26px;">Admin Login</h4>
            <form class="form mt-5 ml-auto" action="AdminLogin.php" method="POST">
               <label class="form-label" for="name">Username</label>
      <input type="text" name="name" class="form-control" required><br>
      <label class="form-label" for="pass">Password</label>
      <input type="password" name="pass" class="form-control" required><br>
      <input type="submit" name="submit" class="form-control btn btn-info" value="LogIn" required>
      </form></div>
            </div>
         </div>
      
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
      $theUrl="$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      if(strpos($theUrl,'login=unsuccess')==true){
         ?> 
         <script>
         alert('Incorrect Login Information');
         </script>
          <?php
      }

    }
    else{
       header("Location:Adminshow.php");
       exit();
    }
