$(document).ready(function(){
    
    // Hiển thị thông tin admin
    $('.admin').click(function(){
        window.location.replace("main.php");
    })

    // Hiển thị danh sách thành viên
    $("#member-btn").click(function(){
        window.location.replace("member.php");
    })

    // Hiển thị danh sách sản phẩm
    $("#product-btn").click(function(){
        window.location.replace("product.php");
    })

    // Hiển thị danh sách bình luận
    $("#comment-btn").click(function(){
        window.location.replace("comment.php");
    })

    // Hiển thị danh sách đơn hàng
    $("#cart-btn").click(function(){
        window.location.replace("cart.php");
    })

    // Đăng xuất
    $("#logout-btn").click(function(){
        $.ajax({
            url: "../Controller/RequestController.php",
            method: "GET",
            data : {logout_admin : "true"},
            success: function(e) {
                console.log(e);
                if(e == "OK") window.location.replace("./index.html");
            }
        })
    })

})