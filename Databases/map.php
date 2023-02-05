<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    
</head>
<body>
    
    <?php       $user="root";
                    $host="localhost";
                    $password="";
                    $dbname="stops";
                    $dsn="mysql:host=".$host.";dbname=".$dbname.";charset=utf8;";

                    $conn2=new PDO($dsn,$user,$password);
                                  
                $one=1;
                $query="SELECT * FROM `driver` WHERE `Status`=?";
                $statement=$conn2->prepare($query);
                $statement->execute([$one]);
                $count=0;


                while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                  $count++;
                  ?> <div class="value" style="display:none;"><?php echo $row['coords'];
                   ?></div>
                   <div class="name" style="display:none;"><?php echo $row['Name']; ?> </div>
                   <div class="number" style="display:none;"><?php echo $row['Number']; ?> </div>
                   <div class="type" style="display:none;"><?php echo $row['Type']; ?> </div>
                   <div class="image" style="display:none;"><?php echo '../Images/'.$row['image']; ?> </div>  <?php
                }
                if($count==0){
                  
                echo "Sorry There Is no Driver Online this time";

                }
                else{
                echo "There are ".$count." online Drivers";

                }


?>
<div id="map" style="height:400px; width:400px;"></div>
<script>
     var map,coords;
      function initMap() {
        var x=navigator.geolocation;
      x.getCurrentPosition(success,failure);
      function success(pos){
        
      var y=pos.coords.latitude;
      var z=pos.coords.longitude;
        var coords= {lat:y,lng:z};
      map = new google.maps.Map(document.getElementById('map'), {
          center: coords,
          zoom: 5,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });





            //Getting info about driver and showing it on user's map
            coords2=document.querySelectorAll('.value');
        names=document.querySelectorAll('.name');
        numbers=document.querySelectorAll('.number');
        type=document.querySelectorAll('.type');
        image=document.querySelectorAll('.image');
      
  

  
        var infowindow=new google.maps.InfoWindow;

  for(var i=0;i<coords2.length;i++){
    var parser=JSON.parse(coords2[i].innerHTML);
    var name=names[i].innerHTML;
    var number=numbers[i].innerHTML;
    var type2=type[i].innerHTML;
    var image2=image[i].innerHTML;
    
    
    //The following will work too
  //   var name=JSON.stringify(names[i].innerHTML);
  //   var number=JSON.stringify(numbers[i].innerHTML);
  //   var type2=JSON.stringify(type[i].innerHTML);
  //   var image2=JSON.stringify(image[i].innerHTML);

    

           
              

            var marker= new google.maps.Marker({position:parser,map:map,});
            content='<div><b>name</b>:' +  name +  '   <b>Number:</b> '+ number +  '<img style="height:50px;" src="../Images/'+ image2+'"> </div>'
            
        
            
           marker.addListener('click',
           function(){
             infowindow.setContent(content);
             infowindow.open(map,marker);
           });



          
               
       

            } 






            }

            







      }
      function failure(error){
        if(error.code==1){
          alert("Permission Denied");
        }
        else if(error.code==2){
          alert("Unavailable");
        }
        
        else if(error.code==3){
          alert("timeout");
        }
        
        else if(error.code==4){
          alert("Unknown Error");
        }

      }




	</script>
  
            
            

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7YmmfaFmNmTeGs6H752bQtvxHrJk7yLk&callback=initMap"
    async defer></script>
  
</body>
</html>