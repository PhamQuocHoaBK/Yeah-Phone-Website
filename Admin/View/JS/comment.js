function del(id) {
    $.ajax({
        url : "../Controller/RequestController.php",
        method : "GET",
        data : {
            remove_comment : id,
        },
        success: function(e) {
            console.log(e);
            location.reload();
        }
    })
}