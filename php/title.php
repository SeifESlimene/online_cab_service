<?php
session_start();
include "../Databases/conn.php";




$uid=$_SESSION['Drid'];
$name=$_SESSION['Dname'];
if(!isset($uid)){
  header("Location:SignUP.php");
}



  if(isset($uid)){
      
      $query="SELECT * FROM `Driver` WHERE `id`='$uid'";
      $result=mysqli_query($conn,$query);

      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
                   
              ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="SignUP.css">
	<title>Map</title>
  <style>
  /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 70%;
        width: 70%;
        margin-top:30px;
        margin-bottom:100px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
</head>
  <body>


  
<div class="row">
			<div class="col-sm-12">
				<nav class="navbar navbar-expand-sm bg-dark">
					<div>
						<a href="" class="navbar-brand text-center logo">KCS<br>
						<p>Travel Fast</p></a>
						
					</div>



			<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsiblenavbar">
          	<span class="navbar-toggler-icon">@</span>
            </button>


                        <div class="collapse navbar-collapse navbar" id="collapsiblenavbar"
            >  

		<ul class="navbar-nav nav-pills ml-auto">
			<li class="nav-item"><a href="../index.php" class="nav-link ">Home</a></li>
			<li class="nav-item"><a href="../index.php#services" class="nav-link">Services</a></li>
			<li class="nav-item dropdown"><a href="" class="nav-link dropdown-toggle active" data-toggle="dropdown">Login</a>
				<ul class="dropdown-menu">
					<li class="dropdown-item"><a href="../php/SignUP.php" class="nav-link ">Driver Login</a></li>

					<li class="dropdown-item"><a href="../Admin/Admin.php" class="nav-link ">Admin Login</a></li>
				</ul></li>
							<li class="nav-item"><a href="" class="nav-link">How it works</a></li>
			</ul>



					</div>
				</nav>
      </div>
      
		</div>

    <div id="map"></div>
    






    <script>
      

      var map,coords;
      function initMap() {
        var x=navigator.geolocation;
      x.getCurrentPosition(success);
      function success(pos){
        
      var y=pos.coords.latitude;
      var z=pos.coords.longitude;
        var coords= {lat:y,lng:z};
      map = new google.maps.Map(document.getElementById('map'), {
          center: coords,
          zoom: 8,
        });
        var marker= new google.maps.Marker({position:coords,map:map,
        title:'my pos'});

        
      
      }
        
      }

      
      

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7YmmfaFmNmTeGs6H752bQtvxHrJk7yLk&callback=initMap"
    async defer></script>


    
      
    <script type="text/javascript" src="../Bootstrap/js/JQuery.js"></script>

<script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
      }
    }
  
      
?>