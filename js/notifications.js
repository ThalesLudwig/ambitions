
/* if the notifications panel is visible
 * the button will hide it
 * if it's hidden, the button will show it
 */
function setShowHide(){    
    $(".notification-button").click(function(){ 
        if (jQuery('#notifications-panel').is(':visible')){        
            $("#notifications-panel").hide( "slide", { direction: "right"  }, 200 );
        }
        else{
            $("#notifications-panel").show( "slide", { direction: "right"  }, 200 );
        }
    });    
}

/* Wait for window load */
$(window).load(function() {
    setShowHide();    
});

function deleteNotification(id){
    var xmlhttp = new XMLHttpRequest();
    //this function defines what to do when the server respose is ready
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("notifications-body").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", '../../actions/delete-notification-action.php?id='+id);
    xmlhttp.send();    
}

function followUser(id, receiver){    
    var xmlhttp = new XMLHttpRequest();    
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {            
            document.getElementById("notifications-body").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", '../../actions/add-bound-action.php?id='+id+'&receiver='+receiver);
    xmlhttp.send();    
}


//makes the panel disappear when the user clicks outside
var mouse_is_inside = false;
$(document).ready(function () {
    $('#notifications-panel').hover(function () {
        mouse_is_inside = true;
    }, function () {
        mouse_is_inside = false;
    });
    $("body").mouseup(function () {
        if (!mouse_is_inside)
            $("#notifications-panel").hide("slide", {direction: "right"}, 200);
    });
});
