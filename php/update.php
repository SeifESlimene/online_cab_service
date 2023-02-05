<?php
include "LogIN.php";
if(!isset($_SESSION['Dname'])){
    header("Location:../php/SignUP.php");
  }

include "../Databases/conn.php";

$uid=$_SESSION['Drid'];




   $query="Select * FROM `Driver` WHERE id='$uid';";
   $result=mysqli_query($conn,$query);
    $data=mysqli_fetch_assoc($result);


?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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

					<li class="dropdown-item"><a href="../Admin/Admin.php" class="nav-link ">Admin Login</a></li>
				</ul></li>
							<li class="nav-item"><a href="../index.php#working" class="nav-link">How it works</a></li>
			</ul>



					</div>
				</nav>
			</div>
		</div>

	<!----------------------- Form ---------------------------------- -->
	<div class="row mt-3 ">
	<div class="col-md-4 bg-dark">


	</div>
	

	</div>

	<div class="conatiner data">
	  <div class="row">
	  <div class="col-sm-4 grey">
	  <h4>Update Your account here</h4>
	<?php $theUrl="http://S_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($theUrl,"submit=nameError")==true){ ?>

            <div class="alert alert-danger" role="alert">
            Please Enter a name of at least 4 characters</div>
            <?php }
            elseif(strpos($theUrl,"submit=namePresent")==true){ ?>
            
            <div class="alert alert-danger" role="alert">
            you cant update to this name !!!Try anonther name please</div>
            <?php } 
             elseif(strpos($theUrl,"submit=numberPresent")==true){ ?>
            
				<div class="alert alert-danger" role="alert">
				you cant update to this number !!!Try another number please</div>
				<?php } 
             elseif(strpos($theUrl,"submit=LicencePresent")==true){ ?>
            
				<div class="alert alert-danger" role="alert">
				you cant update to this Licence !!!Try anonther Licence please</div>
				<?php } 
				
				elseif(strpos($theUrl,"submit=imgSizeErr")==true){ ?>
            
					<div class="alert alert-danger" role="alert">
					This image exceeds the length,try low size img</div>
					<?php } 
					
					elseif(strpos($theUrl,"submit=imgbasicErr")==true){ ?>
            
						<div class="alert alert-danger" role="alert">
						Try another image ,this one have some err</div>
						<?php } 
						
						elseif(strpos($theUrl,"submit=imgExtErr")==true){ ?>
            
							<div class="alert alert-danger" role="alert">
							Upload an image with extension of jpg,jpeg or png</div>
							<?php } 
							
							elseif(strpos($theUrl,"submit=nameError")==true){ ?>
            
								<div class="alert alert-danger" role="alert">
								Please Enter correct name of at least 4 characters</div>
								<?php } 
								
								elseif(strpos($theUrl,"submit=NumberError")==true){ ?>
            
									<div class="alert alert-danger" role="alert">
									Please Enter a 10 or 11 digit number</div>
									<?php } 
									
									elseif(strpos($theUrl,"submit=PassError")==true){ ?>
            
										<div class="alert alert-danger" role="alert">
										Please Enter at least 6 characters password</div>
										<?php } 



                   elseif(strpos($theUrl,"updated")){
                       ?>
                       <script>
                         alert("Your Account has been Updated successfully");
                       </script>
                       <?php
                   }
             ?>

<div class="div-signup">
<form action="updateData.php" class="Signup ml-auto mr-auto" enctype="multipart/form-data" method="POST">
   
       
   
   <input type="text" name="Name" placeholder="Your Full name" value="<?php echo $data['Name']; ?>" class="form-control-sm" required><br>
   <input type="text" name="number" placeholder="mobile number" value="<?php echo $data['Number']; ?>"
   class="form-control-sm" required><br>
   
   
   <input type="text" name="Licence" placeholder="Driving License number" 
   class="form-control-sm" value="<?php echo $data['Licence']; ?>" required><br>
  
   <input type="password" name="pass" placeholder="Password"
   class="form-control-sm" required><br>
   Your Vehical Type:<br>
       <select name="select">
       <option>Car</option>
       <option>Bike</option>
       </select><br>
   

   Your Picture:<input type="file"  name="image" class="form-control-sm" required><br>
   

<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
   <input type="submit" name="submit" value="Update" class="btn btn-info submit form-control-sm"> 
   </form>

   <hr class="bg-light">
		<a  type="submit" href="delete.php" class="btn btn-danger ml-auto mr-auto col-sm-7" name="delete" value="Delete">Delete Your Account</a>

</div>

	  </div>

	  
	  <div class="col-sm-7">
	  <h4>Your Data is following</h4>
	     <table class="table table-responsive">
		 <tr>
		 <th>Picture</th>
		 <th>Name</th>
		 <th>Number</th>
		 <th>Licence</th>
		 <th>CNIC</th>
		 <th>Car Type</th>
		 </tr>
		 
		 
		 <tr>
		 <td class="pic"><img src="../Images/<?php echo $data['image']; ?>" style="width:50px; height:50px;"  /></td>
		 <td><?php echo $data['Name']; ?></td>
		 
		 <td><?php echo $data['Number']; ?></td>
		 <td><?php echo $data['Licence']; ?></td>
		 <td><?php echo $data['CNIC']; ?></td>
		 <td><?php echo $data['Type']; ?></td>
		 
		 </tr>




		 </table>
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

