<?php
   session_start();
   include "../Databases/conn.php";

   if(isset($_POST['LogIn'])){
          $Numb=$_POST["number"];
          $pass=$_POST['Password'];

                $query="SELECT * FROM `Driver` WHERE `Number`='$Numb'";
                $result=mysqli_query($conn,$query);

                if(mysqli_num_rows($result)>0){
                  while($row=mysqli_fetch_assoc($result)){
                    $passcheck=password_verify($pass,$row['Password']);
                    if($passcheck==true){
                      $_SESSION['Drid']=$row['id'];
                      $_SESSION['Dname']=$row['Name'];

                      header("Location:Show.php?");
                      exit();
                    }
                    else{
                      header("Location:SignUP.php?LogIn=failed");
                      exit();                      
                    }
                  }
                }
                else{
                  header("Location:SignUP.php?LogIn=failed");
                  exit();
                }
                
   }
   
?>