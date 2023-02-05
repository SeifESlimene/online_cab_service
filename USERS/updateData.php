<?php
session_start();
   include "../Databases/conn.php";
   $uid=$_SESSION['Userid'];

   if(isset($_POST['Update'])){
       $userName=mysqli_real_escape_string($conn,$_POST['username']);
       $Number=mysqli_real_escape_string($conn,$_POST['NUM']);
       $Password=mysqli_real_escape_string($conn,$_POST['pass']);

       $passHashed=password_hash($Password,PASSWORD_DEFAULT);

       //Error Handlers

       if(empty($userName) || empty($Number) || empty($Password) ){
        header("Location:updateUser.php?submit=passError");
           exit();
       }
       elseif(strlen($userName) < 4 || strlen($userName) > 15 || !preg_match("/^[a-zA-Z ' ']*$/",$userName)){
        header("Location:updateUser.php?submit=nameError");
        exit();
       }
       elseif(strlen($Number)<10 || strlen($Number)>11){
        header("Location:updateUser.php?submit=numberError");
        exit();
       }
       elseif(strlen($Password)<6 || !preg_match("/^[a-zA-Z0-9 ' ']*$/",$Password)){
        header("Location:updateUser.php?submit=passError");
        exit();
       }





       else{

        $query="SELECT * FROM `users` WHERE `id` != $uid";
        $result=mysqli_query($conn,$query);
        
       while ($row3 =mysqli_fetch_assoc($result)) 
{
            if($row3['name']==$userName){
                header("Location:updateUser.php?submit=namePresent");
                    exit();
                   }
                   elseif($row3['number']==$Number)
                   {
                    header("Location:updateuser.php?submit=numberPresent");
                    exit();
                   }

            
            
        }
        if(strlen($userName) < 4 || strlen($userName) > 15 || !preg_match("/^[a-zA-Z ' ']*$/",$userName)){
            header("Location:users.php?submit=nameError");
            exit();
           }
           elseif(strlen($Number)<10 || strlen($Number)>11 || !preg_match("/^[0-9]*$/",$Number)){
            header("Location:users.php?submit=numError");
            exit();
           }
           elseif(strlen($Password)<6 || !preg_match("/^[a-zA-Z0-9]*$/",$Password)){
            header("Location:users.php?submit=passError");
            exit();
           }
           else{
               
        $update="UPDATE `users` SET `name`=?,`number`=? ,`password`=? WHERE `id`=?";
        $stmmt=mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmmt,$update);
        mysqli_stmt_bind_param($stmmt,'sssi',$userName,$Number,$passHashed,$uid);
         if(mysqli_stmt_execute($stmmt)==true){
        header("Location:updateUser.php?Updated");
        exit();
         }
           }





        }

   }
   

   if(isset($_GET['Delete'])){
       $delete="DELETE FROM `users` WHERE `id`=?";
       $stmt=mysqli_stmt_init($conn);
       mysqli_stmt_prepare($stmt,$delete);
       mysqli_stmt_bind_param($stmt,'i',$uid);
       mysqli_stmt_execute($stmt);
       unset($_SESSION['Userid']);
       unset($_SESSION['UserName']);
       header("Location:../index.php?Deleted");
       exit();
   }

?>