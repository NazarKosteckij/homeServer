/**
 * Created by Nazar on 24.10.2015.
 */
$(document).ready(function(){
    getSensorsData();
    $('.parallax').parallax();
    $('.slider').slider({full_width: true});
    checkStatuses();
    $('#home-pc-status').change(function(){
        clickHomePcToogle();
    });
});

/** 
 * Gets the data via api
 */ 
function getSensorsData() {
    //outside
     $.ajax("api/sensors/outside/temperature.php").done(function(data) {
        if ( data ) {
            $('.sensors-data .outside .temperature #value').html(data.data);
        }
    });
    
     $.ajax("api/sensors/outside/humidity.php").done(function(data) {
        if ( data ) {
            $('.sensors-data .outside .humidity #value').html(data.data);
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
            $('.sensors-data .inside .humidity #value').html(data.data);
        }
    });
    
}

function checkStatuses() {
    $.ajax({
        url:"api/status/led-light.php",
        success: function(data){
            console.log(data.data);
            if ( data.data === 'true' ) {

                $('#led-light-status').prop("checked", true);
            } else {
                $('#led-light-status').prop("checked", false);
                alert("error");
            }
        }
    });

    $.ajax({
        url:"api/status/home-pc.php",
        success: function(data){
            if ( data.data === 'true' ) {
                console.log(data.data);
                $('#home-pc-status').prop("checked", true);
            } else {
                $('#home-pc-status').prop("checked", false);
                alert("error");
            }
        }
    });

    $.ajax({
        url:"api/status/server.php",
        success: function(data){
            if (  data.data === 'true' ) {
                console.log(data.data);
                $('#server-status').prop("checked", true);
            } else {
                $('#server-status').prop("checked", false);
            }
        }
    }).done(function(){
        removePreloader();
    });
}
//TODO implement it
function removePreloader(){

}

function requestLed(){
    clickLedLightToogle();
}

function confirmAction(title, message, url){
    if (title) {
        $("#modal-title").html(title)
    };

    if (message && url) {
            $("#action-url").unbind('click');
            $("#action-url").click(function(){
            $.ajax(url);
            $('#main-modal').closeModal();
        });
        $("#modal-text").html(message)
        $('#main-modal').openModal();
    } else{
        return;
    };

}

function clickLightsToogle() {
    confirmAction("Confirm your action", "Are you realy want to switch light?", "/api/control/toogle-light.php");
}

function clickHomePcToogle() {
    confirmAction("Confirm your action", "Are you realy want to switch power of Home PC?", "/api/control/toogle-home-pc.php");
}

function clickLedLightToogle() {
    confirmAction("Confirm your action", "Are you realy want to switch light?", "/api/control/toogle-led-light.php");
}
