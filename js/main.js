/**
 * Created by Назар on 24.10.2015.
 */
$(document).ready(function(){
    $('.parallax').parallax();
    $('.slider').slider({full_width: true});
});

$('#home-pc-status').change(function(){
    clickHomePcToogle();
});

function requestLed(){
    clickLedLightToogle();
}

function confirmAction(title, message, url){
    if (title) {
        $("#modal-title").html(title)
    };

    if (message && url) {
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