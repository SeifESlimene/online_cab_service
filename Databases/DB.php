<?php
include "../USERS/userLogIN.php";
if(isset($_SESSION['Userid'])){
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Styledb.css" >
    <title>Karak Cab Service</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
        width: 600px;
        margin-bottom:40px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #coming,#cancel,#waiting,#safe,#cash{
        display:none;
        
      }
      </style>

</head>
<body>
<div class="container-fluid">
<div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-sm bg-dark">
                        <div>
                            <a href="" class="navbar-brand text-center logo">KCS<br>
                            <p>Travel Fast</p></a>
                            
                        </div>
    
    
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsiblenavbar">
                    <span class="navbar-toggler-icon" style="color:white; background-color:green; font-size: 1em;" ><i class="fas fa-bars"></i></span>
                    </button>
    
    
                            <div class="collapse navbar-collapse navbar" id="collapsiblenavbar"
                >  
    
            <ul class="navbar-nav nav-pills ml-auto">
                <li class="nav-item"><a href="../index.php" class="nav-link ">Home</a></li>
                
                <li class="nav-item dropdown"><a href="" class="nav-link dropdown-toggle active" data-toggle="dropdown">MY PROFILE</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">Rides</li>
                        <li class="dropdown-item"><a href="../USERS/updateUser.php">Profile Setting</a></li>
    
                        <li class="dropdown-item"><form action="../USERS/LogOut.php" method="POST">
                        <input type="submit" name="logout" class="btn" value="LOGOUT">
                        </form>
                        </li>
                    </ul></li>
                                
                </ul>
    
    
    
                        </div>
                    </nav>
                </div>
            </div>
            <form action="add.php" method="POST" id="form" class="ml-auto mr-auto col-md-6 mb-2" >
              <input type="text" style="display:none;" name="name" placeholder="drivername" id="name">
              <input type="number" style="display:none;"  value="<?php echo $_SESSION['Userid'];  ?>" name="uid" placeholder="userid" id="id">
              <input type="text"  style="display:none;" value="<?php echo $_SESSION['UserName'];  ?>" name="uname" placeholder="userid" id="uname">
              <input type="text" style="display:none;"  name="user_lat" placeholder="User lat" id="lat">
              <input type="text" style="display:none;" name="user_lng" placeholder="User lng" id="lng">
              <input type="submit" style="display:none;"  id="book" name="user_submit" class="btn btn-success" value="BOOK NOW">
            
            
            </form>
            <div id="coming" class="ml-auto mr-auto col-md-6 mb-2"> YOUR DRIVER IS ON HIS WAY,PLEASE WAIT!!!</div>
            <div id="cancel" class="ml-auto mr-auto col-md-6 mb-4" ><button class="btn btn-danger  ml-auto" id="cancel-btn">Cancel the Ride</button></div>
            <div id="waiting" class="ml-auto mr-auto col-md-6 mb-4">YOUR DRIVER IS WAITING ,PLEASE GET THERE FAST</div>
            <div id="safe" class="col-md-6 mr-auto ml-auto mb-3" >HAVE A SAFE JOURNEY WITH KCS</div>
            <div id="cash" class="col-md-6 mr-auto ml-auto mb-3" >PLEASE PAY THE FARE IN CASH</div>
            <div id="map" class="ml-auto mr-auto mt-5">
               
             </div>
         
         
         <script>
      var map,coords,coords2,names,numbers,type,images;
      function initMap() {
 
        var x=navigator.geolocation;
      x.getCurrentPosition(success,failure);
      function success(pos){
        
      var y=pos.coords.latitude;
      var z=pos.coords.longitude;
        var coords= {lat:y,lng:z};
      map = new google.maps.Map(document.getElementById('map'), {
          center:coords,
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        
        var marker= new google.maps.Marker({position:coords,map:map,
            title:'MY POSITION'});
            
  
  
var infowindow=new google.maps.InfoWindow;

            

           
    var interval= setInterval(
          function(){
            var xttp=new XMLHttpRequest();
         xttp.open('GET','Ondriver.php',true);
           

         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
               

              var data=JSON.parse(this.responseText);
              for(var i in data){
                
                
             var Name=data[i].Name;
             var Number=data[i].Number;
             var Image=data[i].Image;
             var Coords=data[i].Coords;
             Coords=JSON.parse(Coords);
             var Type=data[i].Type;
             
              
  var content='<div><b>name</b>:' +  Name +  ' ,  <b>Number:</b> '+ Number +  '<img style="height:50px;" src="../Images/'+ Image+'">';
    
    addmarker(Type,map,Coords,content,infowindow,Name);//This fun will add marker and will label thhem
              
              
            
              
              
             }


              }
                
         }

         xttp.send();

        }, 5000);

 }//success Function ends

 



 
 function addmarker(path,mp,coords,cs,infowindow,name){
   

   //Changing marker logo
  if(path=='Car'){
    var marker2= new google.maps.Marker({position:coords,map:mp,
      title:'click for more info',
        icon:'../Images/car.jpg'});
        


  }   
  else if(path=='Bike'){
    
    var marker2= new google.maps.Marker({position:coords,map:mp,
      title:'click for more info',
        icon:'../Images/Bike.png'});
        
  }
  

                var btn=document.getElementById('form');
                marker2.addListener('click',
                function(){
                  infowindow.setContent(cs);
                  infowindow.open(map,marker2);
                  document.getElementById('name').value=name;
                  document.getElementById('lat').value=coords.lat;
                  document.getElementById('lng').value=coords.lng;
                  document.getElementById('book').style.display='block';

                }
                );
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
        
        else if(error.code==0){
          alert("Unknown Error");
        }

      }
        
      }//INITMAP ENDS
      
      
      //WILL track the driver movements every 10 Seconds
      var interval= setInterval(
          function(){
            var xttp=new XMLHttpRequest();
         xttp.open('GET','add.php',true);
           

         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {

              var data=this.responseText;
              if(data.length != 0){
                
               if(data==2){
                document.getElementById('coming').style.display='block';
                document.getElementById('cancel').style.display='block';

               } 
               if(data==0){
                alert('The Driver is busy ,please look for another taxi around');
                clear();
               } 
               if(data==3){
                 
                document.getElementById('cancel').style.display='none';
                document.getElementById('coming').style.display='none';
                document.getElementById('waiting').style.display='block';
                
               } 
               
               if(data==4){
                
                document.getElementById('waiting').style.display='none';
                document.getElementById('safe').style.display='block';
               }
               if(data==5){
                 
                document.getElementById('safe').style.display='none';
                document.getElementById('cash').style.display='block';
                
               }
               if(data==6){
                 
                document.getElementById('cash').style.display='none';
                 alert('THANK YOU!!! Looking forward to have you on KCS again');
                 cleardb();
                 Marker2.remove();
                 clear();
                 
                } 
              
      
             }


              }
                
         }

         xttp.send();

        }, 10000);

        function cleardb(){
          var xttp=new XMLHttpRequest();
         xttp.open('GET','add.php?clear',true);


         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
                 
             }
                
         }

         xttp.send();
        }

        function clear(){
          clearInterval(interval);
        }

        //WHEN THEY ARE REACHED THEIR DESTINATION
     document.getElementById('cancel-btn').addEventListener('click',CANCEL);
     function CANCEL(){
                document.getElementById('cancel').style.display='none';
                document.getElementById('coming').style.display='none';
                
                document.getElementById('cash').style.display='none';
                
                document.getElementById('waiting').style.display='none';
                document.getElementById('safe').style.display='none';

        var xttp=new XMLHttpRequest();
         xttp.open('GET','add.php?cancel',true);


         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
                 
             }
                
         }

         xttp.send();

     }
     
              



	</script>
            
            

    <script src="https://maps.googleapis.com/maps/api/js?key=YourKey"
    async defer></script>
        


    
    
 
    <script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php

}
else{  ?>
    <script>
    alert('Please Login first to use this service');
    location.assign('../USERS/users.php');
    </script>
    <?php
}
?>





<!-- 


  

     //SENDING REQUEST TO THE DRIVER
    //  document.getElementById('book').addEventListener('click',getcoords);
    //       function getcoords(){
            
    //         var xttp=new XMLHttpRequest();
    //      xttp.open('GET','../php/Show.php?name='+name,true);


    //      xttp.onreadystatechange=function(){
    //          if (this.readyState==4 && this.status==200) {
    //              alert("PAk");
    //          }
                
    //      }

    //      xttp.send();
    //       }
//The following will work too
  //   var name=JSON.stringify(names[i].innerHTML);
  //   var number=JSON.stringify(numbers[i].innerHTML);
  //   var type2=JSON.stringify(type[i].innerHTML);
  //   var image2=JSON.stringify(image[i].innerHTML); -->
