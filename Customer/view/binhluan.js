var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script); 
var username = localStorage.getItem("vOneLocalStorage")

function check_cmt()
{
	var cmt = $("#body-cmt").val();
	if(cmt.length < 15)
	{
		alert("Vui lòng bình luận hơn 15 ký tự")
		return false;
	}
	return true;
}
function view_cmt()
{
	var msp = $("#msp").attr("name");
	$.ajax({
		url: "../controller/binhluan.php",
		method: "POST",
		dataType: 'html',
		data: {msp: msp},
		success:function(data)
		{
			x = JSON.parse(data);
			for(var i = 0; i < x.length; i++)
			{
				var comment = '<div class="comment-box-1">' +
								'<small><i>'+ x[i].time +'</i></small>'+
								'<div>' +x[i].username +': '+ x[i].cmt + '</div>'+
							  '</div>';
				$("#load-cmt").append(comment); 
			}
		}
	});
}
$(document).ready(function()
{
	view_cmt();
	$("#add-cmt").click(function()
	{
		if(username != "")
		{
		var today = new Date();
		var day = today.getDate() + '-'+(today.getMonth()+1)+'-'+ today.getFullYear();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var date = 'Time: '+ time + ' / Day: ' + day;
		var msp = $("#msp").attr("name");
		var cmt = $("#body-cmt").val();
		if(check_cmt() == true)
		{
			$.ajax({
				url: "../controller/binhluan.php",
				method: "POST",
				dataType: 'html',
				data: {username: username, msp: msp, cmt: cmt, date: date},
				success:function(data)
				{
					$('.comment-box-1').remove();
					view_cmt();
				}
			});
		}
		}
		else
		{
			alert("Vui lòng đăng nhập")
		}
	});
});
