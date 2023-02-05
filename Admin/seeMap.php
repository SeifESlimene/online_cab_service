<?php 
include_once "../Databases/conn.php";
  if(isset($_GET)){
      $id=$_GET['id'];
      $query="SELECT `coords` FROM `driver` WHERE `driver`.`id`='$id'";
      $result=mysqli_query($conn,$query);
      ?>

      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
          <title>Driver map</title>
      </head>
      <body>


      <div id="value" style="display:none;"><?php
                   $users=mysqli_fetch_all($result,MYSQLI_ASSOC);
                   echo json_encode($users); ?>
                    </div>
                    <h3>The Driver is currently Here</h3>
                    <div class="ml-auto mr-auto mt-5" id="map" style="width:300px; height:300px;"></div>
      
      <script>
      

        
        var map,coords,coords2;
         function initMap() {
           
          var coords=document.getElementById('value').innerHTML;
        coords=JSON.parse(coords);
        var parser=JSON.parse(coords[0].coords);
        console.log(typeof parser);
           
         map = new google.maps.Map(document.getElementById('map'), {
             center: parser,
             zoom: 8,
             mapTypeId: google.maps.MapTypeId.ROADMAP
           }); 
           var marker=new google.maps.Marker({position:parser,
           map:map,
           title:'driver'});
              
         }
   
   
   
       </script>
           

      <script src="GoogleMapKey"
    async defer></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
      </body>
      </html>


<?php
  }

?>
