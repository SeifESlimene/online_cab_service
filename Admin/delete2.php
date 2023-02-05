<?php
session_start();
  if(isset($_SESSION['AdminName'])){
      $id=$_GET['id'];
      $user="root";
      $host="localhost";
      $password="";
      $dbname="stops";
      $dsn="mysql:host=".$host.";dbname=".$dbname.";charset=utf8;";
   
      $conn=new PDO($dsn,$user,$password);
      $param=[$id];

    
           
   
            $query="DELETE FROM `users` WHERE id=?;";
          
            $statement2=$conn->prepare($query);
            $statement2->execute($param); 
            header("Location:Adminshow.php?Deleted");
            exit();






  }

?>
<!--

$select="SELECT * FROM `Driver` WHERE id='$uid'";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($result);
$img=$row['image'];
$path="../images/".$img;
if(!unlink($path)){
    header("Location:../php/SignUP.php?notDltd");
exit();
}-->