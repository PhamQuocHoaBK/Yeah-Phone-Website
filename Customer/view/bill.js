var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script); 
var username = "";
var total = 0;

function cal(gia, slg)
{
	var tmp = gia * slg;
	total = tmp + total;
}

$(document).ready(function()
{
	username = localStorage.getItem("vOneLocalStorage");
	if(username != "")
	{
		$.ajax({
		url: "../controller/view_bill.php",
		method: "POST",
		dataType: 'html',
		data: {username: username},
		success:function(data)
		{
			var get_item = JSON.parse(data);
			var item;
			for(var i = 0; i < get_item.length; i++)
			{
				if(get_item[i].trangthai == "wait")
				{
					var trangthai = "Đơn hàng chưa duyệt";
				}
				else
				{
					var trangthai = "Đơn hàng đã duyệt";
				}
				var gia = parseInt(get_item[i].gia)
				var soluong = parseInt(get_item[i].soluong)

				view_gia = gia.toLocaleString('vi', {style : 'currency', currency : 'VND'});
				cal(gia, soluong);
				item = "<tr>" + "<td class='bill'>" + get_item[i].tensp + "</td>" + 
							"<td class='bill'>" + view_gia + "</td>" +
							"<td class='bill'>" + soluong +  "</td>" + 
							"<td class='bill'>" + trangthai +  "</td>" + "</tr>";
				$('#table').append(item);
			}
			total = total.toLocaleString('vi', {style : 'currency', currency : 'VND'});
			item = "<tr><td colspan='4'><h3> Tổng tiền: " + total + "</h3></td></tr>";
			$('#table').append(item);
		}
		});
	}
});