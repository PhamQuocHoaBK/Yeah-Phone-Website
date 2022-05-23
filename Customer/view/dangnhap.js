var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);
if(localStorage.getItem("vOneLocalStorage") != "")
{
	window.location.replace('main.html'); 
}
var username;
$(document).ready(function()
{
	$("#dk").click(function()
	{
		if(check_account() == true && check_pass() == true)
		{			
			var phone_account = $('#phone_account').val();
			var pass = $('#pass').val();
			$.ajax({
				url: "../controller/dangnhap.php",
				method: "POST",
				dataType: 'html',
				data: {phone_account: phone_account, pass: pass},
				success:function(data)
				{
					var x = JSON.parse(data);
					if(x[0].status == 300)
					{
						alert("Đăng nhập thành công");
						username = x[0].name;
						localStorage.setItem("vOneLocalStorage", username);
						window.location.replace('main.html'); 
					}
					else
					{
						alert("Tài khoản hoặc mật khẩu không đúng");
					}
				}
			});
		}
	});
});

function check_account()
{
	var ck = $("#phone_account").val();
	if(ck.length == 0)
	{
		alert("Bạn chưa điền tài khoản");
		return false;
	}
	return true;
}

function check_pass()
{
	var ck = $("#pass").val();

	if(ck.length == 0)
	{
		alert("Bạn chưa điền mật khẩu");
		return false;
	}
	return true;
}