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
      $select="SELECT * FROM `Driver` WHERE id=?;";
      $statement=$conn->prepare($select);
      $param=[$id];
      $statement->execute($param); 
      while($row=$statement->fetch(PDO::FETCH_ASSOC)){
        $img=$row['image'];
        $path="../images/".$img;
        unlink($path);
    
            $conn2=mysqli_connect($host,$user,$password,$dbname);
   
            $query="DELETE FROM `Driver` WHERE id=?;";
          
            $statement2=$conn->prepare($query);
            $statement2->execute($param); 
            header("Location:Adminshow.php?Deleted");
            exit();

      }





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
}