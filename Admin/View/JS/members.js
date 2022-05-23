function del(tdn) {
    $.ajax({
        url : "../Controller/RequestController.php",
        method : "GET",
        data : {
            remove_member : tdn,
        },
        success: function(e) {
            console.log(e);
            location.reload();
        }
    })
}