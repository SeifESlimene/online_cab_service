<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'stops');

if ($conn) {
} else {
    echo 'Some Problem';
}

// $user="root";
// $host="localhost";
// $password="";
// $dbname="stops";
// $dsn="mysql:host=".$host.";dbname=".$dbname.";charset=utf8;";

// $conn=new PDO($dsn,$user,$password);

//  if($conn){
//      echo "Connected";
//  }
//  else{
//      echo "Some Problem";
//  }
