<?php
session_start();
$uid=$_SESSION['Userid'];
include "conn.php"; 
if(isset($_POST['user_submit'])){
    $uid=$_POST['uid'];
    $name=$_POST['name'];
    $uname=$_POST['uname'];
    $lat=$_POST['user_lat'];
    $lng=$_POST['user_lng'];

    $query="DELETE FROM `coord` WHERE `coord`.`uid`='$uid'";
    mysqli_query($conn,$query);
$query="INSERT INTO `coord`(`Name`,`uname`, `uid`, `user_lat`, `user_lng`, `Status`)
 VALUES ('$name','$uname','$uid','$lat','$lng','1')";

 mysqli_query($conn,$query);
 header('Location:DB.php?waiting');

      
}
if(isset($_GET['accept'])){
    
    $query="UPDATE `coord` SET `Status`=2 WHERE `coord`.`uid`='$uid'";
    mysqli_query($conn,$query);
    
    
 }
 
if(isset($_GET['accept'])){
    
    $query="UPDATE `driver` SET `Status`=2 WHERE `Name`='$name'";
    mysqli_query($conn,$query);
    
 }
 //If the driver reject the request
 if(isset($_GET['reject'])){
 $query="UPDATE `coord` SET `Status`=0 WHERE `coord`.`uid`='$uid'";
 mysqli_query($conn,$query);
}


//CLEAR the data in Database
if(isset($_GET['clear'])){
    $query="DELETE FROM `coord` WHERE `coord`.`uid`='$uid'";
    mysqli_query($conn,$query);
    
   }
   
//CLEAR the data in Database
if(isset($_GET['clear'])){
    
    //THE driver Status will be set back to online(1)
    $query2="UPDATE `driver` SET `Status`=1 WHERE `Name`='$name'";
    mysqli_query($conn,$query2);
   }

   
//IF THE USER CANCEL THE RIDE
if(isset($_GET['cancel'])){
    $query="DELETE FROM `coord` WHERE `coord`.`uid`='$uid'";
    mysqli_query($conn,$query);
    
   }
   
//IF THE USER CANCEL THE RIDE
if(isset($_GET['cancel'])){
    
    //THE driver Status will be set back to online(1)
    $query2="UPDATE `driver` SET `Status`=1 WHERE `driver`.`Name`='$name'";
    mysqli_query($conn,$query2);
   }
   
$selet="SELECT `Status` FROM `coord` WHERE `uid`='$uid'";
$reult= mysqli_query($conn,$selet);
$row=mysqli_fetch_assoc($reult);
echo $row['Status'];


?>