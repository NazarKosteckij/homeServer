

var SensorsModel = {
  insideHumidity:  null,
  outsideHumidity: null,
  //init
  init: function(){ 
    this.insideHumidity = loadLiquidFillGauge("inside-humidity", 0);
    this.outsideHumidity = loadLiquidFillGauge("outside-humidity", 0);
    var config1 = liquidFillGaugeDefaultSettings();
    config1.circleColor = "#FF7777";
    config1.textColor = "#FF4444";
    config1.waveTextColor = "#FFAAAA";
    config1.waveColor = "#FFDDDD";
    config1.circleThickness = 0.2;
    config1.textVertPosition = 0.2;
    config1.waveAnimateTime = 1000;
  },
  setValueInsideHumidity: function (value) {
    if (value){
      this.insideHumidity.update(value);
    }
  },

   setValueOutsideHumidity: function (value) {
    if (value){
      this.outsideHumidity.update(value);
    }
  }

};
  var SensorsController={
   update: function (){
      //outside
       $.ajax("api/sensors/outside/temperature.php").done(function(data) {
          if ( data ) {
            //SensorsModel.setValueOutsideHumidity(data.data);
          }
      });
      
       $.ajax("api/sensors/outside/humidity.php").done(function(data) {
          if ( data ) {
               SensorsModel.setValueOutsideHumidity(data.data);
          }
      });
      
      //inside
       $.ajax("api/sensors/inside/temperature.php").done(function(data) {
          if ( data ) {
              $('.sensors-data .inside .temperature #value').html(data.data);
          }
      });
      
       $.ajax("api/sensors/inside/humidity.php").done(function(data) {
          if ( data ) {
               SensorsModel.setValueInsideHumidity(data.data);
          }
      });
      
    }
  };

$(document).ready(function($) {
  SensorsModel.init();
  $(function() {
    doUpdate();

    function doUpdate() {
       setTimeout(doUpdate,3*60000);
       SensorsController.update();
    }
});
});
    
  
