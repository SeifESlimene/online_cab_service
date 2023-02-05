<?php
   include "../Databases/conn.php";

   if(isset($_POST['submit'])){
       $userName=mysqli_real_escape_string($conn,$_POST['username']);
       $Number=mysqli_real_escape_string($conn,$_POST['NUM']);
       $Password=mysqli_real_escape_string($conn,$_POST['pass']);

       $passHashed=password_hash($Password,PASSWORD_DEFAULT);

       //Error Handlers

       if(empty($userName) || empty($Number) || empty($Password) ){
           header("Location:users.php?submit=empty");
           exit();
       }
       elseif(strlen($userName) < 4 || strlen($userName) > 15 || !preg_match("/^[a-zA-Z ' ']*$/",$userName)){
        header("Location:users.php?submit=nameError");
        exit();
       }
       elseif(strlen($Number)<8 || strlen($Number)>11 || !preg_match("/^[0-9]*$/",$Number)){
        header("Location:users.php?submit=numError");
        exit();
       }
       elseif(strlen($Password)<6 || !preg_match("/^[a-zA-Z0-9]*$/",$Password)){
        header("Location:users.php?submit=passError");
        exit();
       }



       else{
        //    $check="SELECT * FROM `users` WHERE `name`='$userName' OR `number`='$Number';";
        //    $result=mysqli_query($conn,$check);
        //    if(mysqli_num_rows($result)>0){
        //     header("Location:users.php?submit=Present");
        //     exit();

        $check="SELECT * FROM `users` WHERE `name`=?;";
        $stmmt=mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmmt,$check);
        mysqli_stmt_bind_param($stmmt,'s',$userName);
        mysqli_stmt_execute($stmmt);
        $result=mysqli_stmt_get_result($stmmt);
        if(mysqli_fetch_assoc($result)){
            header("Location:users.php?submit=NamePresent");
            exit();
           }
           else{
             
        $check="SELECT * FROM `users` WHERE `number`=?;";
        $stmmt=mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmmt,$check);
        mysqli_stmt_bind_param($stmmt,'s',$Number);
        mysqli_stmt_execute($stmmt);
        $result=mysqli_stmt_get_result($stmmt);
        if(mysqli_fetch_assoc($result)){
            header("Location:users.php?submit=NumPresent");
            exit();
           }

            else{
              $query="INSERT INTO users(name,number,password) VALUES (?,?,?)";
            $stmt=mysqli_stmt_init($conn);
            
              if(!mysqli_stmt_prepare($stmt,$query))
                {
                  echo "no result";
               }
            else{
             mysqli_stmt_bind_param($stmt,"sss",$userName,$Number,$passHashed);
             mysqli_stmt_execute($stmt);
             header("Location:users.php?submit=success");
             exit();

           }
            }
            
         }

           }

   }

?>