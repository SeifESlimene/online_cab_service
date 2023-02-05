<?php
session_start();
include "../Databases/conn.php";
$uid=$_SESSION['Drid'];
$select="SELECT * FROM `Driver` WHERE id='$uid';";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($result);
$img=$row['image'];
$path="../images/".$img;
unlink($path);
    $query="DELETE FROM `Driver` WHERE id='$uid';";
mysqli_query($conn,$query);
unset($_SESSION['Dname']);
unset($_SESSION['Drid']);

header("Location:../php/SignUP.php?accDltd");
exit();


?> 