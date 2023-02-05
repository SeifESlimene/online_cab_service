<?php

session_start();
if(isset($_SESSION['AdminName'])){


        ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="inde.css">
	<title></title>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
        
            
<nav class="navbar sidenav">
    <a class="navbar-brand">
        ADMIN DASHBOARD
    </a>


    <ul class="navbar-nav list">
        <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Driver</a>
    <ul class="dropdown-menu ">
    <li class="dropdown-item"><a href="#" >SEE ALL</a></li>
       <li class="dropdown-item"> <span>+</span><a href="AddDriver.php">ADD NEW</a></li>
    </ul>
    </li>
    <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Users</a>
    <ul class="dropdown-menu ">
    <li class="dropdown-item"> <a href="#" >SEE ALL</a></li>
       <li class="dropdown-item"> <span>+</span><a href="AddUser.php" >ADD NEW</a></li>
    </ul>
    
    </li>
    <li class="nav-item"><a href="../index.php" class="nav-link">GO TO HOME</a></li>
    </ul>
    <form action="logout.php" method="POST">
    <button type="submit"  class="btn btn-info logout" name="logout">LogouT</button>
    </form>
</nav>
</div>


<div class="main">
    

<div class="col-md-12 mt-5 ml-3">


<h3>Registered Drivers</h3>

<table class="table table-responsive table-hover">
<thead>
<tr>
<th>Picture</th>
<th>Name</th>
<th>Number</th>
<th>Licence</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

    
<?php

     
        
        $user="root";
        $host="localhost";
        $password="";
        $dbname="stops";
        $dsn="mysql:host=".$host.";dbname=".$dbname.";charset=utf8;";
     
        $conn=new PDO($dsn,$user,$password);
     
        $query="SELECT * FROM `Driver`";
        $statement=$conn->prepare($query);
        $statement->execute();
     
        while($row=$statement->fetch(PDO::FETCH_ASSOC)){
            if($row['Status']==1)
            {
           ?>
            <tr>
           <td><img src="../Images/<?php echo $row['image']; ?>" style="width:100px; height:100px;"  /></td>
           <td><?php echo $row['Name'];  ?></td>
           <td><?php echo $row['Number'];  ?></td>
           <td><?php echo $row['Licence'];  ?></td>
           <td><p class="online">Online <a href="seeMap.php?id=<?php echo $row['id'];  ?>">(see Map)</a></p></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>"> Delete</a></td>
           </tr>
        <?php 
            }
            elseif($row['Status']==0)
            {
           ?>
            <tr>
           <td><img src="../Images/<?php echo $row['image']; ?>" style="width:100px; height:100px;"  /></td>
           <td><?php echo $row['Name'];  ?></td>
           <td><?php echo $row['Number'];  ?></td>
           <td><?php echo $row['Licence'];  ?></td>
           <td><p class="online">OFFLINE</p></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>"> Delete</a></td>
           </tr>
        <?php 
            }
         }
         ?>
</tbody>
</table>
<div class="row">
<div class="col-md-9 mt-5">
<h2>Registered Users</h2>
<table class="table table-responsive table-hover">
<thead>
<tr>
<th>Name</th>
<th>Number</th>
<th>Action</th>
</tr></thead>

<?php
         $query="SELECT * FROM `users`";
        $statement=$conn->prepare($query);
        $statement->execute();
     
        while($row=$statement->fetch(PDO::FETCH_ASSOC)){
           ?>  <tbody>
           <tr>
          
           <td><?php echo $row['name'];  ?></td>
           <td><?php echo $row['number'];  ?></td>
           
           <td><a href="delete2.php?id=<?php echo $row['id']; ?>"> Delete</a></td>
           </tr>
           </tbody>
        


       


        <?php 
         }

         ?>  
         </table>
         </div>
         </div>
</div>

</div>
</div>
</div>
    
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
         </body>
         </html>  <?php
         
    }
    else{
        header("Location:Admin.php");
        exit();
    }
        
        ?>