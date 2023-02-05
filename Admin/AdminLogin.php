
<?php
session_start();

$user="root";
$host="localhost";
$password="root";
$dbname="stops";
$dsn="mysql:host=".$host.";dbname=".$dbname.";charset=utf8;";

$conn=new PDO($dsn,$user,$password);


 if(isset($_POST['submit'])){
     $name=$_POST['name'];
     $pass=$_POST['pass'];
   

     $query="SELECT * FROM `Admin` WHERE `Name`=? && `Password`=?";
     //just & at the place of AND above made me work for 1:30 hour
     //always use && not & 
     //it Takes a lot to be Programmer
     //Chill it is amazing when it is working

     $statement=$conn->prepare($query);
     
     /*
     this code will work
     $param=[$name,$pass];
     $statement->execute($param);
     */

     //$statement->execute([$_POST['name'], $_POST['pass']]); this will work too   

     $statement->execute([$name,$pass]);
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){

       $_SESSION['Adminid']=$row['id'];
       $_SESSION['AdminName']=$row['Name'];
       header("Location:Adminshow.php");
       exit();
    }  
    if($statement->rowCount==0){
       header('Location:Admin.php?login=unsuccess');
       exit();
    }         

      





 }