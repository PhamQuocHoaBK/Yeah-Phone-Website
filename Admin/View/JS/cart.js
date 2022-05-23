function brows(id) {
    $.ajax({
        url : "../Controller/RequestController.php",
        method : "GET",
        data : { 
            update_cart : id,
            state : "done"
        },
        success: function(e){
            console.log(e);
            location.reload();
        }
    })
}

function del(id) {
    $.ajax({
        url : "../Controller/RequestController.php",
        method : "GET",
        data : { 
            remove_cart : id,
        },
        success: function(e){
            console.log(e);
            location.reload();
        }
    })
}