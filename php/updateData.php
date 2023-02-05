<?php
session_start();
?>

<?php
include "../Databases/conn.php";

  if(isset($_POST["submit"]))
        {
            $name=$_POST["Name"];
            $Number=$_POST["number"];
            
            $Licence=$_POST["Licence"];
            $Password=$_POST["pass"];
            
            $Type=$_POST["select"];
            $uid=$_SESSION["Drid"];
            





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
                        header('Location:update.php?submit=imgSizeErr');
                        exit();
                    }
        
                }
                else{
                    header('Location:update.php?submit=imgbasicErr');
                    exit();
                }
        
        
            }
            else{
                header('Location:update.php?submit=imgExtErr');
                exit();
            }
           
            
            /*Error Handlers*///////////////////////////
            

            if(empty($name) || empty($Number) || empty($Licence) || empty($Password))
            {
                header("Location:update.php?submit=empty");
                
                exit();
            }
            elseif(strlen($name)<4 || !preg_match("/^[a-zA-Z ' ']*$/",$name)) {
                header("Location:update.php?submit=nameError");
                
                exit();
            }
            elseif (strlen($Number)<10 || strlen($Number)>12 || !preg_match("/^[0-9]*$/",$Number)){
                header("Location:update.php?submit=NumberError");
                exit();
            }
            elseif(strlen($Password)<6 || !preg_match("/^[a-zA-Z0-9]*$/",$Password))
            {
                header("Location:update.php?submit=PassError");
                exit();
            }
            else{

                //INSERTING DATA INTO TABLES OF DATABASE
                
                //Hashing the entered password
                $hashPass=password_hash($Password,PASSWORD_DEFAULT);


                
                $query="SELECT * FROM `driver` WHERE `id` != $uid";
                $result=mysqli_query($conn,$query);
                
               while ($row3 =mysqli_fetch_assoc($result)) 
{
                    if($row3['Name']==$name){
                        header("Location:update.php?submit=namePresent");
                            exit();
                           }
                           elseif($row3['Number']==$Number)
                           {
                            header("Location:update.php?submit=numberPresent");
                            exit();
                           }
                           elseif($row3['Licence']==$Licence)
                           {
                            header("Location:update.php?submit=LicencePresent");
                            exit();
                           }
                    
                    
                }


            
                       
                    //Deleting the old image
                                                
                    $select1="SELECT * FROM `Driver` WHERE id='$uid';";
                    $result1=mysqli_query($conn,$select1);
                    $row=mysqli_fetch_assoc($result1);
                    $img=$row['image'];
                    $path="../images/".$img;
                    unlink($path);
                    

                        
                    //Updating Data in Driver Table
                    $update= "UPDATE `Driver` SET `id`='$uid'
                    ,`Name`='$name',`Licence`='$Licence'
                    ,`Number`='$Number',`Password`='$hashPass'
                    ,`image`='$imgNewName',`Type`='$Type' WHERE `id`='$uid';";
                          mysqli_query($conn,$update);
                          move_uploaded_file($imgTmpName,$imgActDest);

                          
                          //Setting the Session name to rhe new name
                          $uniqueQuery="SELECT * FROM `Driver` WHERE `id`='$uid';";
                          $result=mysqli_query($conn,$uniqueQuery);
                          $row=mysqli_fetch_assoc($result);
                          $_SESSION['Dname']=$row['Name'];
                          

                          header("Location:update.php?updated");
                          exit();
                

                

     
                               
                    

            }
        }
        

        /*    Printing Error Messages   */

        $theUrl="http//:$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if(strpos($theUrl,"submit=nameError")==true)
        {
            echo "<p>Name should be at least 4 characters and shouldnt contain numbers</p>";
            exit();
        }
        elseif(strpos($theUrl,"submit=NumberError")==true){
            echo "<p>Number should be at least 10 digits starting with a zero(0)</p>";
            exit();
        }
        elseif(strpos($theUrl,"submit=PassError")){
            echo "<p>Password must contain 6 characters</p>";
            exit();
        }
        elseif(strpos($theUrl,"submit=Present")){
            echo "<p>The name or Number is already taken</p>";
            exit();
        }
        elseif(strpos($theUrl,"submit=Success")){
            ?>
            <script>
              alert("WELL DONE!!! Your Data has been Updated successfully");
            </script>
            <?php
            header("Location:../php/SignUP.php?update=success");

            
        }


?>


<!--  
                        
                        
                        
                        
                        
                        
                                                  
                          //Setting the Session name to rhe new name
                          $uniqueQuery="SELECT * FROM `Driver` WHERE `id`='$uid';";
                          $result=mysqli_query($conn,$uniqueQuery);
                          $row=mysqli_fetch_assoc($result);
                          $_SESSION['name']=$row['Name'];  -->