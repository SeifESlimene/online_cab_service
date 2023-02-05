<?php  
session_start();
include "../Databases/conn.php";
$uid=$_SESSION['Drid'];
$name=$_SESSION['Dname'];
if (isset($_GET['parser'])){
    $name=$_GET['parser'];
   $from= json_encode($name);
   $lttt=ltrim($from,"\"");
    $decode= rtrim($lttt,"\"") ;
   


       $query="UPDATE `driver` SET `coords`='$decode' WHERE `driver`.`id`='$uid'";
    mysqli_query($conn,$query);
    }


   if(isset($_GET['online'])){
      
       $query="UPDATE `driver` SET `Status`=1 WHERE `driver`.`id`='$uid'";
       mysqli_query($conn,$query);
   }

   if(isset($_GET['offline'])){
      
       $query="UPDATE `driver` SET `Status`=0 WHERE `driver`.`id`='$uid'";
       mysqli_query($conn,$query);
   }

   
   //UPDATE STATUS IN THE COORD to 3//arrived
   if(isset($_GET['arrived'])){

    $query="UPDATE `coord` SET `Status`=3 WHERE `Name`='$name'";
    mysqli_query($conn,$query);
    
 }
  //UPDATE STATUS IN THE COORD to 3//arrived
  if(isset($_GET['begin'])){

    $query="UPDATE `coord` SET `Status`=4 WHERE `Name`='$name'";
    mysqli_query($conn,$query);
    
 }
 //UPDATE STATUS IN THE COORD to 3//arrived
 if(isset($_GET['end'])){

  $query="UPDATE `coord` SET `Status`=5 WHERE `Name`='$name'";
  mysqli_query($conn,$query);
  
}

 //UPDATE STATUS IN THE COORD to 3//arrived
 if(isset($_GET['recieved'])){

  $query="UPDATE `coord` SET `Status`=6 WHERE `Name`='$name'";
  mysqli_query($conn,$query);


  
  $query2="UPDATE `driver` SET `Status`=1 WHERE `Name`='$name'";
  mysqli_query($conn,$query2);
  
}
   
  $selet="SELECT * FROM `coord` WHERE `Name`='$name' && `Status`=1";
  $reult= mysqli_query($conn,$selet);
  if($reult){
     
    $users=mysqli_fetch_all($reult,MYSQLI_ASSOC);
    echo json_encode($users);

  }
  
?>