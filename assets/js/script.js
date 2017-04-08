function checkRecievedRequest() {
    $.ajax({
        type: "GET",
        url: "ajax/checkNewRequest.php",
        dataType: "html",
        async: false,
        success: function (response) {
            $("#friendNumber").attr("data-badge", response);
        }
    });
}
var checkRequestInterval;

function checkRecievedMessage() {
    $.ajax({
        type: "GET",
        url: "ajax/checkNewMessages.php",
        dataType: "html",
        async: false,
        success: function (response) {
            $("#messageNumber").attr("data-badge", response);
        }
    });
}
var checkMessageInterval;

$(document).ready(function (){
    checkRequestInterval = setInterval(function () {
        checkRecievedRequest();
    }, 1000);

    checkMessageInterval = setInterval(function () {
        checkRecievedMessage();
    }, 500);

    var url2 = "ajax/searchFriend.php";
    $('#searchInput').on('keyup', function () {
        var query = $(this).val();

        if (query.length > 0) {
            $.ajax({
                type: 'POST',
                url: url2,
                data: {
                    query: query
                },
                success: function (response) {
                    $("#display-result").html(response).show();
                }
            });
        }
        return false;
    });
});