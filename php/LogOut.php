<?php
include "Login.php";
if(isset($_POST['logout'])){
    $id=$_SESSION['Drid'];
    $name=$_SESSION['Dname'];


    $update="UPDATE `driver` SET `Status`=0 WHERE `id`='$id'";
    mysqli_query($conn,$update);
    $query="UPDATE `driver` SET `coords`='' WHERE `driver`.`id`='$uid'";
    mysqli_query($conn,$query);

    $delete="DELETE FROM `coord` WHERE `Name`='$name'";
    mysqli_query($conn,$delete);
    
    unset($_SESSION['Dname']);
    unset($_SESSION['Drid']);

    header("Location:SignUP.php");
    exit();
}
else{
    echo "couldnt complete LOGOUT";
}
?>