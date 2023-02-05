<?php
    session_start();
    if (isset($_SESSION['Userid'])){

        include "../Databases/conn.php";
    
        $uid=$_SESSION['Userid'];
    
          $query="SELECT * FROM `users` WHERE `id`=?";
          $stmt=mysqli_stmt_init($conn);
          mysqli_stmt_prepare($stmt,$query);
          mysqli_stmt_bind_param($stmt,'i',$uid);
          mysqli_stmt_execute($stmt);
          $result=mysqli_stmt_get_result($stmt);
          $row=mysqli_fetch_assoc($result); 
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
						<a href="" class="navbar-brand text-center logo">KCS<br>
						<p>Travel Fast</p></a>
						
					</div>



			<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsiblenavbar">
            <span class="navbar-toggler-icon " style="color:white;"><i class="fa fa-bars"></i></span>
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


    
    <div class="container-fluid mt-5 mb-5  SIGNUP-FORM">
        <div class="row ">
            <div class="col-md-9 ml-auto mr-auto">
                

            <h2 class="heading">Please Update Your Account Here </h2>
            <hr class="bg-light">
            <br><br>
            <form action="updateData.php" method="POST" class="sigNUP">
            <label><h3>Name:</h3></label>
                <input type="username" name="username" class="form-control" value="<?php echo $row['name']; ?>" required><br>
                <br><label><h3>Number:</h3></label>
                <input type="text" name="NUM" placeholder="Mobile number" value="<?php echo $row['number']; ?>" class="form-control" required><br>
                <br><label><h3>Password</h3></label>
                <input type="password" name="pass" placeholder="password" class="form-control" required><br>
                
                <input type="submit" name="Update" value="UPDATE" class="submit btn btn-success">
                    <input type="button" name="Delete" id="delete" value="DELETE" class="btn btn-danger">
                   

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
                            <li class="list-item "><a href=""><i class="fab fa-facebook"></i></a></li>
                            <li class="list-item "><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li class="list-item "><a href=""><i class="fab fa-youtube"></i></a></li>
                            
                        </ul></p>
   
                        <p class="Github"> Contribute at <a href=""><i class="fab fa-github"></i></a></p>
   
                        <p><a href="Admin/Admin.php">Admin Login</a></p>
   
                    </footer>
                </div>
            </div>
        </div>

<script>
document.getElementById('delete').addEventListener('click',proDelete);
function proDelete(){
    var prom=confirm('Are You sure to delete your profile !!!');
    if(prom){
        var xhr=new XMLHttpRequest();
        xhr.open('GET','updateData.php?Delete',true);
        xhr.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){
                location.href='users.php?deleted'; 
            }
        }
        xhr.send();
    }else{
        console.log('no');
    }
}
</script>
        
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</body>
</html>

<?php
    }
        
else{
    header("Location:users.php");
    exit();
}


?>