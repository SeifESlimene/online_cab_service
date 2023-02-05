<?php
               include "../Database/conn.php";
               if(isset($_POST["submit"]))
               {
                   $name=$_POST["Name"];
                   $Number=$_POST["number"];
                   $Licence=$_POST["Licence"];
                   $Password=$_POST["pass"];
                   $CNIC=$_POST["CNIC"];
                   $select=$_POST["select"];
       
       
                   //EVERYthing about Image
       
       
                   $image=$_FILES['image'];
               
               //Processing the image
               
               $imgName=$image['name'];
               $imgTmpName=$image['tmp_name'];
               $imgType=$image['type'];
               $imgErr=$image['error'];
               $imgSize=$image['size'];
               
               
               
               
               $imgExt=explode('.',$imgName);
               $imgActualExt=strtolower(end($imgExt));
               
               
               $allowed=array('jpg','jpeg','png');
               
               
               
                   if(in_array($imgActualExt,$allowed)){
                       if($imgErr===0){
                           if($imgSize<5000000){
               
               
                               Global $imgNewName;
                             $imgNewName =$imgExt[0].".".uniqid('',false).".".$imgActualExt;
               
                              Global $imgActDest;
                              $imgActDest="../Images/".$imgNewName;
                               
               
               
                           }
                           else{
                               header('Location:SignUP.php?submit=imgSizeErr');
                               exit();
                           }
               
                       }
                       else{
                           header('Location:SignUP.php?submit=imgbasicErr');
                           exit();
                       }
               
               
                   }
                   else{
                       header('Location:SignUP.php?submit=imgExtErr');
                       exit();
                   }
                  
                   
                   /*Error Handlers*///////////////////////////
                   
       
                   if(empty($name) || empty($Number) || empty($Licence) || empty($Password))
                   {
                       header("Location:Signup.php?submit=empty");
                       
                       exit();
                   }
                   elseif(strlen($name)<4 || !preg_match("/^[a-zA-Z ' ']*$/",$name)) {
                       header("Location:SignUP.php?submit=nameError");
                       
                       exit();
                   }
                   elseif (strlen($Number)<10 || strlen($Number)>12 || !preg_match("/^[0-9]*$/",$Number)){
                       header("Location:SignUP.php?submit=NumberError");
                       exit();
                   }
                   elseif( strlen($CNIC)>16 || strlen($CNIC)<13 || !preg_match("/^[0-9 -]*$/",$CNIC))
                   {
                       header("Location:SignUP.php?submit=CNICError");
                       exit();
                   }
                   elseif(strlen($Password)<6 || !preg_match("/^[a-zA-Z0-9]*$/",$Password))
                   {
                       header("Location:SignUP.php?submit=PassError");
                       exit();
                   }
                   else{
       
                       //INSERTING DATA INTO TABLES OF DATABASE
                       @include "../Databases/conn.php";
                       //Hashing the entered password
                       $hashPass=password_hash($Password,PASSWORD_DEFAULT);
       
       
       
                       $check="SELECT * FROM `Driver` WHERE `Name`=?;";
                       $stmmt=mysqli_stmt_init($conn);
                       mysqli_stmt_prepare($stmmt,$check);
                       mysqli_stmt_bind_param($stmmt,'s',$name);
                       mysqli_stmt_execute($stmmt);
                       $result=mysqli_stmt_get_result($stmmt);
                       if(mysqli_fetch_assoc($result)){
                           header("Location:SignUP.php?submit=namePresent");
                           exit();
                          }
                          else{
                            $check="SELECT * FROM `Driver` WHERE `Number`=?;";
                            $stmmt=mysqli_stmt_init($conn);
                            mysqli_stmt_prepare($stmmt,$check);
                            mysqli_stmt_bind_param($stmmt,'s',$Number);
                            mysqli_stmt_execute($stmmt);
                            $result=mysqli_stmt_get_result($stmmt);
                            if(mysqli_fetch_assoc($result)){
                                header("Location:SignUP.php?submit=numberPresent");
                                exit();
                               }
                               else{
                                $check="SELECT * FROM `Driver` WHERE `CNIC`=?;";
                                $stmmt=mysqli_stmt_init($conn);
                                mysqli_stmt_prepare($stmmt,$check);
                                mysqli_stmt_bind_param($stmmt,'s',$CNIC);
                                mysqli_stmt_execute($stmmt);
                                $result=mysqli_stmt_get_result($stmmt);
                                if(mysqli_fetch_assoc($result)){
                                    header("Location:SignUP.php?submit=CNICPresent");
                                    exit();
                                   }
                                   else{
                                    $check="SELECT * FROM `Driver` WHERE `Licence`=?;";
                                    $stmmt=mysqli_stmt_init($conn);
                                    mysqli_stmt_prepare($stmmt,$check);
                                    mysqli_stmt_bind_param($stmmt,'s',$Licence);
                                    mysqli_stmt_execute($stmmt);
                                    $result=mysqli_stmt_get_result($stmmt);
                                    if(mysqli_fetch_assoc($result)){
                                        header("Location:SignUP.php?submit=LicencePresent");
                                        exit();
                                       }
                                   else{
                                    $data_Insert="INSERT INTO `Driver`(`Name`, `Licence`,`Number`,`CNIC`, `Password`, `image`,`Type`)
                                    VALUES (?,?,?,?,?,?,?)";
                                    $stmt=mysqli_stmt_init($conn);
                                    if(mysqli_stmt_prepare($stmt,$data_Insert)){
                                        mysqli_stmt_bind_param($stmt,'sssssss',$name,$Licence,$Number,$CNIC,$hashPass,$imgNewName,$select);
                                        mysqli_stmt_execute($stmt);
                                        move_uploaded_file($imgTmpName,$imgActDest);
                                        header("Location:SignUP.php?submit=Success");
                                        exit();
                                    }else{
                                        echo "Prepared Statement not prepared";
                                    }
                                   }
                               }

                              
                       
       
                          }
       
       
       
                       }
       
                   }
                }
               ?>