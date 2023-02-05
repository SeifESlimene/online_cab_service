<?php
     session_start();
     if(isset($_POST['logout'])){
        if(isset($_SESSION['AdminName'])){
            unset($_SESSION['Adminid']);
            unset($_SESSION['AdminName']);
            header("Location:Admin.php");
            exit();
        }
     }

?>