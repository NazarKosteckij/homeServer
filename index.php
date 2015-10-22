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

function confirmAction(title, message, url){
  if (title) {

  };

  if (message && url) {
      $("#action-url").attr("onclick", "$.ajax('" + url +"'); alert('aSome')");  
      $('#main-modal').openModal();
  } else{
    return;
  };

}
function clickLightsToogle() {
  confirmAction("Confirm your action", "Are you realy want to switch light?", "/api/control/toogle-light.php");
   $('#main-modal').closeModal();
}
</script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<?php
include "services/Sensors.php";
include "services/InsideSensorsService.php";
include "services/OutsideSensorsService.php";
    $inside = new  InsideSensorsService();
    $outside = new OutsideSensorsService();
?>
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
    <!-- Modal Structure -->
    <div id="main-modal" class="modal">
        <div class="modal-content">
            <h4 id="modal-title">Modal Header</h4>
            <p id="modal-text">Text</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action waves-effect waves-green btn-flat" id='action-url'>Agree</a>
            <a  class=" modal-action modal-close waves-effect waves-green btn-flat" >Close</a>
        </div>
    </div>

  <div class=" parallax-container">
    <div class="parallax">
      <img src="img/Modern-House.1.jpg">
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
            <div class="col s6">
                <i class="row card-title">inside</i>
                <div class="flow-text col s6 tooltipped" data-position="bottom" data-delay="50" data-tooltip="temperature">
                    <i id="row">
                        <img  class="sensors-icon" src="png\thermometer.png">
                    </i>
                    <div class="row">
              <span id="value"><?php
                  print  $inside->getTemperature();
                  ?> </span><span id="units">C</span>
                    </div>
                </div>
                <div class="flow-text col s6 tooltipped" data-position="bottom" data-delay="50" data-tooltip="humidity">
                    <i id="row">
                        <img  class="sensors-icon" src="png\Humidity.png">
                    </i>
                    <div class="row">
          <span id="value"><?php
              print  $inside->getHumidity();
              ?> </span><span id="units">%</span>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <i class="row card-title">outside</i>
                <div class="flow-text col s6 tooltipped" data-position="bottom" data-delay="50" data-tooltip="temperature">
                    <i id="row">
                        <img  class="sensors-icon" src="png\thermometer.png">
                    </i>
                    <div class="row">
                        <span id="value">
                            <?php print  $outside->getTemperature(); ?>
                        </span><span id="units">C</span>
                    </div>
                </div>
                <div class="flow-text col s6 tooltipped" data-position="bottom" data-delay="50" data-tooltip="humidity">
                    <i id="row">
                        <img  class="sensors-icon" src="png\Humidity.png">
                    </i>
                    <div class="row">
                        <span id="value">
                            <?php print  $outside->getHumidity(); ?>
                        </span><span id="units">%</span>
                    </div>
                </div>
            </div>
        </div>
      </div>

     </div><div class="server-info">
      <div class=" col  s6 m6 l4 offset-m4">
        <div class="sensors-data row  card-panel center grey lighten-5 z-depth-1 center">
          <i class="row card-title">Core temperature</i>
          
          <div class="flow-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="temperature of server's cpu">
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
          <div class="sensors-data row  card-panel center grey lighten-5 z-depth-1 center">
              <i class="row card-title">LED light controll</i>

              <div class="flow-text tooltipped" id="brightens" data-position="bottom" data-delay="50" data-tooltip="temperature of server's cpu">
                  <p class="range-field">
                      <input onchange="$.ajax('api/control/toogle-led-light.php?brightness='+this.value)" type="range" id="test5" min="0" max="255" />
                  </p>
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

    <div class="parallax-container hide">
      <div >
        <div class="slider">
    <ul class="slides">
      <li>
         <img src="img/server_room.jpg">
        <div class="caption center-align">
          <h3>This is our big DataStorage!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our servers cluster.</h5>
        </div>
      </li>
      <li>
          <img src="img/Cloud-Platter.jpg">
          <div class="caption left-align">
          <h3>Cloud technologies</h3>
          <h5 class="light grey-text text-lighten-3">Our owncloud</h5>
        </div>
      </li>
      <li>
        <img src="img/shutterstock_140095138.jpg">
        <div class="caption right-align">
          <h3>Verry fast home network</h3>
          <h5 class="light grey-text text-lighten-3">All films and other media in verry fast acces</h5>
        </div>
      </li>
      <li>
        <img src="img/ArduinoADKFront.jpg">
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
 

