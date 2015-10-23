/**
 * Created by Назар on 24.10.2015.
 */
$(document).ready(function(){
    $('.parallax').parallax();
    $('.slider').slider({full_width: true});
});

function requestLed(){
    $.ajax("/api/control/toogle-led-light.php");
}

function confirmAction(title, message, url){
    if (title) {
        $("#modal-title").val(title)
    };

    if (message && url) {
        $("#action-url").click(function(url){
            $.ajax(url);
            $('#main-modal').closeModal();
        });

        $("#modal-title").val(message)
        $('#main-modal').openModal();
    } else{
        return;
    };

}

function clickLightsToogle() {
    confirmAction("Confirm your action", "Are you realy want to switch light?", "/api/control/toogle-light.php");
}

function clickLedLightToogle() {
    confirmAction("Confirm your action", "Are you realy want to switch light?", "/api/control/toogle-led-light.php");
}