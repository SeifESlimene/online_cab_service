<?php
   include "../Databases/conn.php";

   if(isset($_POST['submit'])){
       $userName=mysqli_real_escape_string($conn,$_POST['username']);
       $Number=mysqli_real_escape_string($conn,$_POST['NUM']);
       $Password=mysqli_real_escape_string($conn,$_POST['pass']);

       $passHashed=password_hash($Password,PASSWORD_DEFAULT);

       //Error Handlers

       if(empty($userName) || empty($Number) || empty($Password) ){
           header("Location:users.php?submit=empty");
           exit();
       }
       elseif(strlen($userName) < 4 || strlen($userName) > 15 || !preg_match("/^[a-zA-Z ' ']*$/",$userName)){
        header("Location:users.php?submit=nameError");
        exit();
       }
       elseif(strlen($Number)<10 || strlen($Number)>11){
        header("Location:users.php?submit=numError");
        exit();
       }
       elseif(strlen($Password)<6 || !preg_match("/^[a-zA-Z ' ']*$/",$Password)){
        header("Location:users.php?submit=passError");
        exit();
       }



       else{
        //    $check="SELECT * FROM `users` WHERE `name`='$userName' OR `number`='$Number';";
        //    $result=mysqli_query($conn,$check);
        //    if(mysqli_num_rows($result)>0){
        //     header("Location:users.php?submit=Present");
        //     exit();

        $check="SELECT * FROM `users` WHERE `name`=? OR `number`=?;";
        $stmmt=mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmmt,$check);
        mysqli_stmt_bind_param($stmmt,'ss',$userName,$Number);
        mysqli_stmt_execute($stmmt);
        $result=mysqli_stmt_get_result($stmmt);
        if(mysqli_fetch_assoc($result)){
            header("Location:AddUser.php?submit=Present");
            exit();
           }
           else{

            $query="INSERT INTO users(name,number,password) VALUES (?,?,?)";
            $stmt=mysqli_stmt_init($conn);
            
              if(!mysqli_stmt_prepare($stmt,$query))
                {
                  echo "no result";
               }
            else{
             mysqli_stmt_bind_param($stmt,"sss",$userName,$Number,$passHashed);
             mysqli_stmt_execute($stmt);
             header("Location:AddUser.php?submit=success");
             exit();

           }
            
         }

           }

   }
include "AdminLogin.php";
 if(isset($_SESSION['AdminName'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    
    
    <title>Users SignUP</title>
</head>
<body class="bg-light">
    </section>
    <section class="down">
        <div class="SignUP conatiner ">
        <div class="row">
        <div class="col-md-6 ml-auto mr-auto mt-5 bg-dark">
        
        <h2>Add New User </h2>
            <form action="AddUser.php" method="POST" class="sigNUP">
                <input type="username" name="username" class="form-control" placeholder="username" required><br>
                <input type="text" name="NUM" class="form-control" placeholder="Mobile number" required><br>
                <input type="password" name="pass" class="form-control" placeholder="password" required><br>
                
                <input type="submit" name="submit" class="form-control btn btn-info" value="SignUP">

            </form>
            </div></div>

        </div>
    </section>


<?php

 }

$theUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  //Echoing ERROR MESSAGES


  if(strpos($theUrl,"submit=empty")==true){
      echo "<p>Please fill Out all the fields</p>";
  } elseif(strpos($theUrl,"submit=nameError")==true){
      echo "<p>Name should be 4-15 characters and shouldn't contain numbers</p>";
  }
  elseif(strpos($theUrl,"submit=numError")==true){
    echo "<p>Please Enter a correct number of 10 or 11 digits</p>";
} elseif(strpos($theUrl,"submit=passError")==true){
    echo "<p>Password should be at least 6 characters</p>";
} 
elseif(strpos($theUrl,"submit=Present")==true){
    echo "<p>Please SignUP with a Unique UserName & Number</p>";
}
 elseif(strpos($theUrl,"password=wrong")==true){
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

   
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  </body>
  </html> 
   <?php
?>