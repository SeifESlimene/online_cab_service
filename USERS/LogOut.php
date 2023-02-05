

<?php
include "userLogIn.php";
if(isset($_POST['logout'])){
    unset($_SESSION['UserName']);
    unset($_SESSION['Userid']);
    $uid=$_SESSION['Userid'];

    
    $delete="DELETE FROM `coord` WHERE `uid`='$uid'";
    mysqli_query($conn,$delete);

    header("Location:../index.php");
    exit();
}
else{
    echo "No way";
}
?>