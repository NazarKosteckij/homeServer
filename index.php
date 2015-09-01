<html>
<head>
<title>My Home Server</title>
<script src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<script src="js/jquery.canvasjs.min.js"> </script>
<script src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('.parallax').parallax();
      $('.slider').slider({full_width: true});
    });

</script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style type="text/css">
.sensors-data #value{
  font-weight: bolder;
    color: #4527a0;
}
.sensors-data #units{
    font-size: 75%;
}
.home-info{
    height: 550px;
    padding-top: 10px;
}
 .parallax-container {
      height: 450px;
    }
input[type=checkbox]:checked+.lever {
  background-color: red;
}
footer.page-footer{

    background-color: #4527A0;
}
nav .brand-logo {
    margin-left: 30px;
}
.sensors-icon{
  height:36px;
   margin-bottom:15px;
}
</style>
</head>
<body>
  
  <nav>
    <div class="nav-wrapper deep-purple darken-3">
    
        <a href="#!" class="brand-logo">Home automation system</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="HomeServer/owncloud/"><i class="material-icons left">cloud</i>OwnCloud</a></li>
          <li><a href="badges.html"><i class="material-icons right">view_module</i>Link with Right Icon</a></li>
        </ul>
      
    </div>
  </nav>
<main>
  
  <div class=" parallax-container">
    <div class="parallax">
      <img src="http://bestinspired.com/wp-content/uploads/2015/05/Modern-House.1.jpg">
    </div>
    <div class="col s10 center">
      <H1 class="center" style="color:white;   font-weight: 100;  font-size: 120px;">
        My Smart Home</H1>
      <p><H5 class="hide-on-small" style="width: 1020px;  margin: 0 auto; color:white;   font-weight: 300;">  is the residential extension of building automation. It is automation of the home, housework or household activity. Home automation may include centralized control of lighting, HVAC (heating, ventilation and air conditioning), appliances, security locks of gates and doors and other systems, to provide improved convenience, comfort, energy efficiency and security. Home automation for the elderly and disabled can provide increased quality of life for persons who might otherwise require caregivers or institutional care.  </H5></p>
   </div>
  </div>
<div class="container">
  <div class="home-info ">
     <div class="wether">
      <div class=" col  s6 m6 l4 offset-m4">
        <div class="sensors-data row  card-panel center grey lighten-5 z-depth-1 center">
          <i class="row card-title">Sensors data</i>
          
          <div class="flow-text col s6 tooltipped" data-position="bottom" data-delay="50" data-tooltip="">
          <i id="row">
            <img  class="sensors-icon" src="png\thermometer.png">
          </i>
          <div class="row">
          <span id="value"><?php
              $json = file_get_contents("http://192.168.1.100/sensors/temperature");
              $data = json_decode($json);
              $temperature =  $data->data;
              if (is_null($temperature)) {
                $temperature = "NaN";
              } else{
                print  $temperature;
              
              }
          ?> </span><span id="units">C</span>
          </div>
        </div>
          <div class="flow-text col s6 tooltipped" data-position="bottom" data-delay="50" data-tooltip="">
          <i id="row">
            <img  class="sensors-icon" src="png\Humidity.png">
          </i>
          <div class="row">
          <span id="value"><?php
                $json = file_get_contents("http://192.168.1.100/sensors/humidity");
                $data = json_decode($json);
                $humidity =  $data->data;
                if (is_null($humidity)) {
                  $humidity = "NaN";
                } else{
                  print  $humidity;
                }
            ?> </span><span id="units">%</span>
          </div>
          </div>
        </div>
      </div>

     </div><div class="server-info">
      <div class=" col  s6 m6 l4 offset-m4">
        <div class="sensors-data row  card-panel center grey lighten-5 z-depth-1 center">
          <i class="row card-title">Core temperature</i>
          
          <div class="flow-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="">
          <i id="row">
            <img  class="sensors-icon" src="png\thermometer.png">
          </i>
          <div class="row">
          <span id="value"><?php
              $json3 = file_get_contents("http://localhost/sensors/getCoreTemperature.php");
              $data3 = json_decode($json3);
              $coreTemperature =  $data3->temperature;
              print  $coreTemperature;
          ?> </span><span id="units">C</span>
          </div>
        </div>
        </div>
      </div>

     </div>
      <div class=" col s12 m5">
        <div class="sensors-data row   card-panel center grey lighten-5 z-depth-1 center">
           <i class="row card-title">Computers controll</i>
         
           <!-- Switch -->
            <div class="col  s6 switch center">
              Home-PC
              <br>
              <label>
                Off
                <input type="checkbox">
                <span class="lever"></span>
                On
              </label>
            </div>
            <div class="col  s6 switch center">
              Server
              <br>
              <label>
                Off
                <input type="checkbox" checked>
                <span class="lever"></span>
                On
              </label>
            </div>
        </div>
       </div>

</div>
</div>

    <div class="parallax-container">
      <div >
        <div class="slider">
    <ul class="slides">
      <li>
        <img src="http://cdn2.itpro.co.uk/sites/itpro/files/server_room.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big DataStorage!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our servers cluster.</h5>
        </div>
      </li>
      <li>
        <img src="http://blog.samanage.com/wp-content/uploads/2011/02/Cloud-Platter.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3>Cloud technologies</h3>
          <h5 class="light grey-text text-lighten-3">Our owncloud</h5>
        </div>
      </li>
      <li>
        <img src="https://blog.digicert.com/wp-content/uploads/2014/08/shutterstock_140095138.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3>Verry fast home network</h3>
          <h5 class="light grey-text text-lighten-3">All films and other media in verry fast acces</h5>
        </div>
      </li>
      <li>
        <img src="http://arduino.ua/img/hardware/ArduinoADKFront.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>Arduino based platform</h3>
          <h5 class="light grey-text text-lighten-3">In the future we will maintenance another avr's</h5>
        </div>
      </li>
    </ul>
  </div>
  </div>
 </div>
 <div class="container">
<div class="row">
  
 </div>    
</div>
</main>
  <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
             2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
</body>
</html>
 

