function del(obj) {
    $.ajax({
        url: "../Controller/RequestController.php",
        method: "GET",
        data: {
            remove_product : obj
        },
        success: function(r) {
            console.log(r);
            if(r == 0) location.reload();
        }
    })
}


function update(id) {
    var msp = $("#msp").val();
    var tsp = $("#tensp").val();
    var gia = $("#gia").val();
    var soluong = $("#soluong").val();

    if(msp != "" && tsp != "" && gia != "" && soluong != "") {
        $.ajax({
            url: "../Controller/RequestController.php",
            method: "GET",
            data: {
                update_product : "true",
                idsp : id,
                masp : msp,
                tensp : tsp,
                giaca : gia,
                soluongsp : soluong
            },
            success : function(e) {
                console.log(e);
            }
        })
    }
    else alert("Nhập đầy đủ thông tin ");
}