
//makes the panel disappear when the user clicks outside
var mouse_is_inside = false;
$(document).ready(function () {
    $('#view-ambition-panel').hover(function () {
        mouse_is_inside = true;
    }, function () {
        mouse_is_inside = false;
    });
    $("body").mouseup(function () {
        if (!mouse_is_inside)
            $("#view-ambition-panel").hide("slide", {direction: "right"}, 200);
    });
});


function setDateMask() {
    jQuery(function ($) {
        $("#AmbViewAchieveDate").mask("99/99/9999", {placeholder: "dd/mm/yyyy"});
    });
}



function hideAmbitionPanel() {
    $("#view-ambition-panel-back").click(function () {
        $("#view-ambition-panel").hide("slide", {direction: "right"}, 200);
    });
}

function showViewPanel(id, user) {
    $("#view-ambition-panel").show("slide", {direction: "right"}, 200);    
    document.getElementById("view-ambition-panel-content").innerHTML = '<br>&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../images/loading.gif" alt="Loading">';    
    var xmlhttp = new XMLHttpRequest();
    //this function defines what to do when the server respose is ready
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("view-ambition-panel-content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../../panels/view-ambition-panel.php?ambId=" + id + "&ambUser=" + user, true);
    xmlhttp.send();
}

//uploads an Ambition image
function uploadAmbImage(ambitionId, user) {
    //gets the user language
    var userLang = navigator.language || navigator.userLanguage;    
    $('#formAmbImage').ajaxSubmit({
        url: '../../actions/edit-ambition-image-action.php?ambId=' + ambitionId,
        type: 'POST',        
        dataType:'text', 
        success: function(data){
            var mydata= $.parseJSON(data);
            var response = mydata.response;
            if (response === '0') {
                if (userLang === 'pt-BR') {
                    alert('Imagem deve ser menor que 1MB');
                } else {
                    alert('Image must be smaller than 1MB');
                }
            } else {
                window.location.reload(true);
                //showViewPanel(ambitionId, user);
            }
        },
        error: function(data){
            var mydata= $.parseJSON(data);
            var response = mydata.response;
            if (response === '0') {
                if (userLang === 'pt-BR') {
                    alert('Imagem deve ser menor que 1MB');
                } else {
                    alert('Image must be smaller than 1MB');
                }
            } else {
                window.location.reload(true);
                //showViewPanel(ambitionId, user);
            }
        }
    });
}

function editAmbition(id) {
    var editedTitle = $("#AmbViewTitle").val();
    var editedDesc = $("#AmbViewDescription").val();
    var editedDate = $("#AmbViewAchieveDate").val();
    window.location.href = '../../actions/edit-ambition-action.php?id=' + id + '&title=' + editedTitle + '&desc=' + editedDesc + '&date=' + editedDate;
    return false;
}

function deleteAmbition(id) {
    var userLang = navigator.language || navigator.userLanguage;
    var confirmationText;
    if (userLang === 'pt-BR') {
        confirmationText = 'Tem certeza que deseja deletar essa Ambição?';
    } else {
        confirmationText = 'Are you sure you want to delete this Ambition?';
    }
    var r = confirm(confirmationText);
    if (r == true) {
        window.location.href = '../../actions/delete-ambition-action.php?id=' + id;
        return false;
    } else {
        return false;
    }
}

//creates the new step/stage
function newStep(ambitionId, title, user) {
    var xmlhttp = new XMLHttpRequest();
    //this function defines what to do when the server respose is ready
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            showViewPanel(ambitionId, user);
        }
    }
    xmlhttp.open("GET", "../../actions/create-step-action.php?ambId=" + ambitionId + "&title=" + title, true);
    xmlhttp.send();
}

//deletes the step/stage
function removeStep(ambitionId, user, stepId) {
    var xmlhttp = new XMLHttpRequest();
    //this function defines what to do when the server respose is ready
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            showViewPanel(ambitionId, user);
        }
    }
    xmlhttp.open("GET", "../../actions/remove-step-action.php?stepId=" + stepId, true);
    xmlhttp.send();
}


//uploads the steps stage
function changeStepState(ambitionId, user, stepId) {
    var xmlhttp = new XMLHttpRequest();
    //this function defines what to do when the server respose is ready
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            showViewPanel(ambitionId, user);
        }
    }
    xmlhttp.open("GET", "../../actions/upload-step-state-action.php?stepId=" + stepId + "&ambId=" + ambitionId, true);
    xmlhttp.send();
}


//achieves the ambition
function achieveAmbition(ambitionId, user) {
    var xmlhttp = new XMLHttpRequest();
    //this function defines what to do when the server respose is ready
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //TODO -> GO TO ACHIEVED PAGE
        }
    }
    xmlhttp.open("GET", "../../actions/achieve-ambition-action.php?ambId=" + ambitionId, true);
    xmlhttp.send();
}

//creates the new comment
function newComment(ambitionId, ambOwner, content) {
    var xmlhttp = new XMLHttpRequest();
    //this function defines what to do when the server respose is ready
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            showViewPanel(ambitionId, ambOwner);
        }
    }
    xmlhttp.open("GET", "../../actions/create-comment-action.php?ambId=" + ambitionId + "&content=" + content + "&owner=" + ambOwner, true);
    xmlhttp.send();
}

//deletes the comment AND remove users points
function removeComment(ambitionId, AmbOwner, commentId, commentOwner) {
    var xmlhttp = new XMLHttpRequest();
    //this function defines what to do when the server respose is ready
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            showViewPanel(ambitionId, AmbOwner);
        }
    }
    xmlhttp.open("GET", "../../actions/remove-comment-action.php?commentId=" + commentId + "&commentOwner=" + commentOwner, true);
    xmlhttp.send();
}

//changes the ambition state
function changeAmbState(ambitionId) {
    var state = $("#view-ambition-dropdown option:selected").val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //showViewPanel(ambitionId, AmbOwner);
        }
    }
    xmlhttp.open("GET", "../../actions/change-amb-state-action.php?ambId=" + ambitionId + "&state=" + state, true);
    xmlhttp.send();
}

/* Wait for window load */
$(window).load(function () {
    hideAmbitionPanel();    
});

