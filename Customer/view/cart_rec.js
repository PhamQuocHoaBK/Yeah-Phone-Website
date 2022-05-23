var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);
var username = localStorage.getItem("vOneLocalStorage");
var size = 0;

function insert_donhang(tensp, msp, gia, soluong)
{
	$.ajax({
		url: "../controller/insert_donhang.php",
		method: "POST",
		dataType: 'html',
		data: {username: username, tensp:tensp, msp:msp, gia:gia, soluong:soluong},
		success:function(data)
		{
		}
	});

}

var soluong = [];

function after_thanhtoan()
{
	$.ajax({
				url: "../controller/soluong.php",
				method: "POST",
				dataType: 'html',
				data: {username: username},
				success:function(data)
				{
					soluong = JSON.parse(data);	
				}
			}); 

	$.ajax({
				url: "../controller/view_cart.php",
				method: "POST",
				dataType: 'html',
				data: {username: username},
				success:function(data)
				{
					var x = JSON.parse(data);	
					for(var i = 0; i < x.length; i++)
					{
						if(x[i] != null)
						{
							insert_donhang(x[i].tensp, x[i].msp, x[i].gia, soluong[i]);
						}
					}
				}
			});
}

function delete_cart()
{
	$.ajax({
			url: "../controller/delete_cart.php",
			method: "POST",
			dataType: 'html',
			data: {username: username},
			success:function(data)
			{
			}
		});
}
$(document).ready(function()
{
	if(username != "")
	{
		$("#thanhtoan").click(function()
		{
			if (thanhtoan() == true)
			{
				alert("Đặt hàng thành công. Cảm ơn quý khách đã mua hàng!");
				after_thanhtoan();
				delete_cart();
			}
		});
	}
});