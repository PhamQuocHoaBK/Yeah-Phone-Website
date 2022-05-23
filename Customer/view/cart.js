var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);
var username = localStorage.getItem("vOneLocalStorage");
var total = 0;
var gia_sp = [];
var soluong = [];
function thanhtoan()
{
		if(confirm('Sau khi thanh toán. Bạn sẽ không thể hủy đơn hàng!')) 
		{
			return true;
		}
		return false;
}
function delete_sp(msp)
{
	if(msp.length != 0)
	{
		$.ajax({
		url: "../controller/delete_sp.php",
		method: "POST",
		data: {username: username, msp: msp},
		success: function(data)
		{
			var x = JSON.parse(data);
			if(x.delete == 200)
			{	
				$(".product").remove();
				$(".money").remove();
				total = 0;
				view();
			}
			if(x.delete == 301)
			{
				alert("Lỗi: không thể xóa sản phẩm khỏi giỏ hàng");
			}
		}
		});
	}
}
function caculate(gia, slg)
{
	var tmp = gia*slg;
	total = total + tmp;
}

$(document).ready(function()
{
	if(username != "")
	{
		view();
	}
	else
	{
		window.location.replace('login.html'); 
	}
});

function view()
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
					if(x == "")
					{
						$("#thanhtoan").hide();
					}
					for(var i = 0; i < x.length; i++)
					{
					if(x[i] != null)
					{
						if(soluong != null)
						{
							var sl = soluong[i];
						}
						sl = parseInt(sl);
						var tensp = x[i].tensp;
						var gia = x[i].gia;
						gia_sp[i] = parseInt(x[i].gia);
						gia_tmp = gia_sp[i].toLocaleString('vi', {style : 'currency', currency : 'VND'});
						var hinh = x[i].hinh;
						var msp = x[i].msp;
						var product = '<div class="product">' + 
											'<img src="' + hinh +'">' +
											'<div class="product-info">'+
												'<h3 class="product-name">' + tensp + '</h3>' +
										 		'<h3 class="product-costs">' + gia_tmp + '</h3>' +
										 		'<p class="product-num">Số lượng: <input type="number" value="'+ sl +'" readonly> </p>' +
										 		'<p class="product-remove">' +
	                                    			'<button class="fa fa-trash" onclick="delete_sp(\'' + msp + '\')"></button>' +
	                                    			'<span class="remove">Remove</span>' +
	                                			'</p>' +
										 	'</div>' +
										'</div>';
						$("#all_product").append(product);
						if(soluong != null && gia_sp != null)
						{
							soluong[i] = parseInt(soluong[i]);
							caculate(gia_sp[i], soluong[i]);
							if(i == (x.length - 1))
							{
								total = total.toLocaleString('vi', {style : 'currency', currency : 'VND'});
								tien = '<span class="money">' + total + '</span>';
								$("#tongcong").append(tien);
							}
						}
					}
					}
				}
		});
}