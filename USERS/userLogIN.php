<?php
  session_start();
   include "../Databases/conn.php";

   if(isset($_POST['submit'])){
       $userName=mysqli_real_escape_string($conn,$_POST['name']);
       $password=mysqli_real_escape_string($conn,$_POST['Password']);



       $query="SELECT * FROM `users` WHERE `name`=? OR `number`=?;";
       $stmt=mysqli_stmt_init($conn);
       mysqli_stmt_prepare($stmt,$query);
       mysqli_stmt_bind_param($stmt,'ss',$userName,$userName);
       mysqli_stmt_execute($stmt);
       $result=mysqli_stmt_get_result($stmt);
       $row=mysqli_fetch_assoc($result);
       $varify=password_verify($password,$row['password']);
       if($varify==true){
           $_SESSION['Userid']=$row['id'];
           $_SESSION['UserName']=$row['name'];
           header("Location:../index.php?LOGGED");
           
       }
       else{
           header("Location:users.php?password=wrong");
           exit();
       }

   }
?>