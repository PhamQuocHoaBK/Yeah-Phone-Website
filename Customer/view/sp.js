var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);
var username = localStorage.getItem("vOneLocalStorage");
if(username != "")
{
	$("#link-dn").attr("href", "hoso.html");
	$("#icon-dn").attr("class", "fa fa-user fa");
	$("#text-dn").text("Tài Khoản Của Tôi");
	var soluong = $("#sl").val();
	$("#down").click(function()
	{
		var soluong = $("#sl").val();
		soluong  = parseInt(soluong);
		if(soluong > 1)
		{
			soluong = soluong - 1;
		}
		$("#sl").val(soluong);
	});

	$("#up").click(function()
	{
		var soluong = $("#sl").val();
		soluong  = parseInt(soluong);
		soluong = soluong + 1;
		$("#sl").val(soluong);
	});
}
$(document).ready(function()
{
	$("#them").click(function()
		{
			if(username != "")
			{
				var msp = $("#msp").attr("name");
				var soluong = $("#sl").val();
				$.ajax({
					url: "../controller/cart.php",
					method: "POST",
					dataType: 'html',
					data: {username: username, msp: msp, soluong: soluong},
					success:function(data)
					{
						alert("Đã thêm sản phẩm vào giỏ hàng");
					}
				});
			}
			else
			{
				alert("Vui lòng đăng nhập");
			}
		});
});