<?php
session_start();
include "../Databases/conn.php";




$uid=$_SESSION['Drid'];
$name=$_SESSION['Dname'];
if(!isset($uid)){
  header("Location:SignUP.php");
}
 
  if(isset($uid)){

    


    
                   
              ?>
              
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="SignUP.css">
  <link rel="stylesheet" type="text/css" href="../includes/fonts/css/all.css">
  
	<title>Map</title>
  <style>
  /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #coords{
        background-color:blue;

      }
      #map {
        height: 70%;
        width: 70%;
      }

      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
</head>

<body>
     
    <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-sm bg-dark">
                        <div>
                            <a href="" class="navbar-brand text-center logo">KCS<br>
                            <p>Travel Fast</p></a>
                            
                        </div>
    
    
    
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsiblenavbar">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                </button>
    
    
                            <div class="collapse navbar-collapse navbar" id="collapsiblenavbar"
                >  
    
            <ul class="navbar-nav nav-pills ml-auto">
                <li class="nav-item"><a href="update.php" class="btn btn-info">MY PROFILE</a></li>
                <li>
       <form action="LogOut.php" class="ml-auto" method="POST">
         <input type="submit" value="LOGOUT" name="logout" class="ml-auto btn btn-danger">

       </form></li>
                </ul>
    
    
    
                        </div>
                    </nav>
                </div>
            </div>


            <!--  THESE DIVS WOULD BE SHOW AND HIDE AUTO, UPDATING THE DATA IN DB -->
            <div id="on">
            <p>YOU ARE OFFLINE ,HIT THE ONLINE BUTTON TO GO ONLINE</p>
            <button id="online" class="btn btn-success">GO ONLINE</button>
            </div>
            
            <div id="off" style="display:none;">
            <p>YOU ARE ONLINE ,HIT THE OFFLINE BUTTON TO TAKE A BREAK</p>
            <button id="OFFLINE" class="btn btn-danger">GO OFFLINE</button>
            </div>
            <div id="confirm" style="display:none;" class="col-sm-9 ml-auto">
            <div class="bg-danger col-md-6">You have a Ride Request from <p id="para"></p></div>
            
            <button id="accept" class="btn btn-success mt-3 mb-3">ACCEPT THE REQUEST</button>
            <button id="reject" class="btn btn-danger mt-3 mb-3">REJECT THE REQUEST</button>
            </div>
            
            <div id="arrived" style="display:none;" class="col-sm-9 ml-auto">
            <div class="col-md-9">Click the button when you arrived at user Location</div>
            
            <button id="arriv-btn" class="btn btn-info mt-3 mb-3">ARRIVED</button>
            
            </div>
            
            <div id="begin" style="display:none;" class="col-sm-9 ml-auto">
            <div class="col-md-9">If You are Ready to go,Please press the BEGIN button</div>
            
            <button id="begin-btn" class="btn btn-info mt-3 mb-3">BEGIN THE JOURNEY</button>
            
            </div>
            
            <div id="end" style="display:none;" class="col-sm-9 ml-auto">
            <div class="col-md-9">After Reaching the destination,Please press the END button</div>
            
            <button id="end-btn" class="btn btn-info mt-3 mb-3">END THE JOURNEY</button>
            
            </div>
            
            <div id="recieve" style="display:none;" class="col-sm-9 ml-auto">
            <div class="col-md-9">Please recieve your cash</div>
            
            <button id="recieve-btn" class="btn btn-info mt-3 mb-3">Cash Recieved</button>
            
            </div>
 
  <div id="map" class="ml-auto mr-auto"></div>
 
 <script type="text/javascript">
     document.getElementById('online').addEventListener('click',goOnline);
     function goOnline(){
        document.getElementById('on').style.display='none';
        document.getElementById('off').style.display='block';
        var xttp=new XMLHttpRequest();
         xttp.open('GET','action.php?online',true);


         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
                 
             }
                
         }

         xttp.send();

     }
          document.getElementById('OFFLINE').addEventListener('click',goOffline);
     function goOffline(){
        document.getElementById('on').style.display='block';
        document.getElementById('off').style.display='none';
         var xttp=new XMLHttpRequest();
         xttp.open('GET','action.php?offline',true);


         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
                 
             }
                
         }

         xttp.send();
     }
     document.getElementById('accept').addEventListener('click',ACCEPT);
     function ACCEPT(){
      document.getElementById('confirm').style.display='none';
      document.getElementById('arrived').style.display='block';
        
         var xttp=new XMLHttpRequest();
         xttp.open('GET','../Databases/add.php?accept',true);


         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
                 
             }
                
         }

         xttp.send();
     }
     document.getElementById('reject').addEventListener('click',REJECT);
     function REJECT(){
      document.getElementById('confirm').style.display='none';
        
         var xttp=new XMLHttpRequest();
         xttp.open('GET','../Databases/add.php?reject',true);


         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
                 
             }
                
         }

         xttp.send();
     }

     //WHEN THE DRIVER ARRIVED AT USER LOCATION
     document.getElementById('arriv-btn').addEventListener('click',ARRIVED);
     function ARRIVED(){
        document.getElementById('arrived').style.display='none';
        document.getElementById('begin').style.display='block';
        var xttp=new XMLHttpRequest();
         xttp.open('GET','action.php?arrived',true);


         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
                 
             }
                
         }

         xttp.send();

     }
     
     //WHEN THEY ARE READY TO GO
     document.getElementById('begin-btn').addEventListener('click',BEGIN);
     function BEGIN(){
        document.getElementById('begin').style.display='none';
        document.getElementById('end').style.display='block';
        var xttp=new XMLHttpRequest();
         xttp.open('GET','action.php?begin',true);


         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
                 
             }
                
         }

         xttp.send();

     }
     //WHEN THEY ARE REACHED THEIR DESTINATION
     document.getElementById('end-btn').addEventListener('click',END);
     function END(){
        document.getElementById('end').style.display='none';
        document.getElementById('recieve').style.display='block';
        var xttp=new XMLHttpRequest();
         xttp.open('GET','action.php?end',true);


         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
                 
             }
                
         }

         xttp.send();

     }
          //WHEN THE DRIVER RECIEVED THE CASH
          document.getElementById('recieve-btn').addEventListener('click',RECIEVED);
     function RECIEVED(){
      document.getElementById('recieve').style.display='none';
        alert('GOOD JOB!!!  Please Refresh Your Browser');
        var xttp=new XMLHttpRequest();
         xttp.open('GET','action.php?recieved',true);


         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
                 
             }
                
         }

         xttp.send();

     }


 </script>
     







     <script type="text/javascript">
     
     var map,coords,lat,lng,coords2,oldLat,oldLng,y,z;

      function initMap() {
        var x=navigator.geolocation;
        x.watchPosition(success,failure,{
  enableHighAccuracy:true,
  maximumAge:0
});
      function success(pos){
        
      var y=pos.coords.latitude;
      var z=pos.coords.longitude;
        var coords= {lat:y,lng:z};

      map = new google.maps.Map(document.getElementById('map'), {
          center: coords,
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marker=new google.maps.Marker({position:coords,map:map,
        title:'My Position'});
        coords2={lat:lat,lng:lng};
        
        var marker2=new google.maps.Marker({position:coords2,map:map,
        title:'RIDEERRRRR',
      icon:'../images/pass.png'});

         setInterval(
           function(){
             if(y==oldLat && z==oldLng){

             }
             else{
                                
                            //Sending the data to action.php to be saved in database
                            var parse=JSON.stringify(coords);

                              
                  var xttp=new XMLHttpRequest();
                  xttp.open('GET','action.php?parser='+parse,true);


                  xttp.onreadystatechange=function(){
                  if (this.readyState==4 && this.status==200) {
                    oldLat=y;
                    oldLng=z;
                    alert('changed');
                    
                      
                  }
                      
                  }

                  xttp.send();
             }

           }
           , 5000);
         


          var interval= setInterval(
          function(){
            var xttp=new XMLHttpRequest();
         xttp.open('GET','action.php',true);
           

         xttp.onreadystatechange=function(){
             if (this.readyState==4 && this.status==200) {
               

              var data=JSON.parse(this.responseText);
              if(data.length > 0){
                
                
              lat=data[0].user_lat;
              lng=data[0].user_lng;
              var uname=data[0].uname;
              
              lat=parseFloat(lat);
              lng=parseFloat(lng);
            var coords2={lat:lat,lng:lng};
            
              map.panTo(coords2);
              
              var marker2=new google.maps.Marker({
                position:coords2,
                map:map,
                title:'RIDER',
                icon:"../images/pass.png"
              });
              document.getElementById('confirm').style.display='block';
              document.getElementById('para').innerHTML=uname;
              clear();
             }


              }
                
         }

         xttp.send();

        }, 15000);  
        
        function clear(){
          clearInterval(interval);
                  var end=10;
        var interval=setInterval(countdown,1000);
        function countdown() {
          if( end == 0){
            alert('Refresh Your Browser');
            document.getElementById('confirm').style.display='block';
          }
          else{ 

            document.getElementById('timer').innerHTML=end + ' seconds remaining';
            end--;
          }
        }
        }
            

      }//SUCCESS FUNCTION ENDS
            

      
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
    }
    

   
      </script>
  <script src="GogleMapKey"
    async defer></script>
        <script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

     </body>
     </html>  <?php   
          
    }
  ?>
