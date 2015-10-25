/**
 * Created by Назар on 24.10.2015.
 */
$(document).ready(function(){
    $('.parallax').parallax();
    $('.slider').slider({full_width: true});
    checkStatuses();
    $('#home-pc-status').change(function(){
        clickHomePcToogle();
    });
});

function checkStatuses() {
    $.ajax("api/status/led-light.php").done(function( data ) {
        if ( data ) {
            $('#led-light-status').prop("checked", data.data);
        }
    });

    $.ajax("api/status/home-pc.php").done(function( data ) {
        if ( data ) {
            $('#home-pc-status').prop("checked", data.data);
        }
    });


    $.ajax("api/status/server.php").done(function( data ) {
        if ( data ) {
            $('#server-status').prop("checked", data.data);
        }
    });
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