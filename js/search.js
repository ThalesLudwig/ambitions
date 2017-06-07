
$(document).ready(function () {
    
    src = '../../actions/search-action.php';
    
    //Load the users straight from the server, passing the typed char as an extra param
    $("#fixed-header-drawer-exp").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    term: request.term,
                    name: $("#fixed-header-drawer-exp").val()
                },
                success: function (data) {
                    response(data);                    
                }
            });
        },
        //takes away the default messages
        messages: {
            noResults: '',
            results: function () {
            }
        }
        //delay: 300
    }).data('ui-autocomplete')._renderItem = function (ul, item) {
        return $("<div></div>")
                .data("item.uiAutocomplete", item)
                .append("<br> &nbsp &nbsp<a href='user.php?id=" + item.id + "'><img class='img-circle' src='../../images/pics_profile/" + item.photo + "' height='42' width='42'></a> &nbsp&nbsp <a style='color: black;' href='user.php?id=" + item.id + "'> " + item.name + " " + item.surname + "</a>")
                .appendTo(ul);
    };

    $("#fixed-header-drawer-exp").autocomplete({
        minLength: 1
    });

});