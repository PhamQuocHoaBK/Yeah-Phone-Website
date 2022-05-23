var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);
if(localStorage.getItem("vOneLocalStorage") != "")
{
	window.location.replace('main.html'); 
}

$(document).ready(function()
{
	$("#dk").click(function()
	{
		if(check_account() == true  && check_phone() == true &&  check_pass() == true)
		{			
			var phone = $('#phone').val();
			var account = $('#account').val();
			var pass = $('#pass').val();
			var pass_again = $('#pass_again').val();
			$.ajax({
				url: "../controller/dangky.php",
				method: "POST",
				dataType: 'html',
				data: {phone: phone, account: account, pass: pass, pass_again: pass_again},
				success:function(data)
				{
					var x = JSON.parse(data);

					if(x.status == 203)
					{
						alert("Số điện thoại và tên đăng nhập đã được đăng ký");
					}

					if(x.status == 201)
					{
						alert("Số điện thoại đã được đăng ký");
					}

					if(x.status == 202)
					{
						alert("Tên đăng nhập đã được đăng ký");
					}

					if(x.status == 200)
					{
						alert("Đăng ký thành công");
						window.location.replace('login.html');
					}
				}
			});
		}
	});
});
var turn = 0;
function check_phone()
{
	var ck_phone = $("#phone").val();
	var vnphone_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
	if(ck_phone.length == 0)
	{
		alert("Bạn chưa điền số điện thoại");
		return false;
	}

	else if(isNaN(ck_phone) || ck_phone.length != 10 || vnphone_regex.test(ck_phone) == false)
	{
		alert("Số điện thoại không hợp lệ");
		return false;
	}
	return true;
}

function check_account()
{
	var ck = $("#account").val();
	if(ck.length == 0)
	{
		alert("Bạn chưa điền tên đăng nhập");
		return false;
	}
	return true;
}

function check_pass()
{
	var ck = $("#pass").val();

	var pass_regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
	if(ck.length == 0)
	{
		alert("Bạn chưa điền mật khẩu");
		return false;
	}

	if(pass_regex.test(ck) == false)
	{
		alert("Mật khẩu có ít nhất 8 ký tự, bao gồm cả chữ và số");
		return false;
	}

	var ck_again = $("#pass_again").val();
	if(ck != ck_again)
	{
		alert("Mật khẩu xác nhận chưa đúng");
		return false;
	}
	return true;
}



