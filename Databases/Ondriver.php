<?php 
include "../Databases/conn.php";

$select="SELECT `Name`,`Number`,`Type`,`Image`,`Coords` FROM `driver` WHERE `Status` !=0";
$result=mysqli_query($conn,$select);

$Drivers=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($Drivers);


?>