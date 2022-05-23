var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script); 
var username = "";
var pass = "";
$(document).ready(function()
{
	username = localStorage.getItem("vOneLocalStorage");
	if(username.length != 0)
	{
		$("#link-dn").attr("href", "hoso.html");
		$("#icon-dn").attr("class", "fa fa-user fa");
		$("#text-dn").text("Tài Khoản Của Tôi");
		$.ajax({
		url: "../controller/hienthi.php",
		method: "POST",
		dataType: 'html',
		data: {username: username},
		success:function(data)
		{
			var x = JSON.parse(data);
			if(x != null)
			{
				pass = x.matkhau; 
				$("#hienthi-tdn").attr("value", x.username);
				$("#hienthi-sdt").attr("value", x.phone);
				$("#hienthi-mail").attr("value", x.mail);
				$("#hienthi-diachi").attr("value", x.diachi);
				if(x.hinh != "")
				{
					var txt = "./anh/";
					txt = txt.concat(x.hinh);
					$("#hienthi-avatar").attr("src", txt);
				}
			}
		}
		});
	}

	$("#hienthi-luu").click(function()
	{
		var newname = $("#hienthi-tdn").val();
		var newphone = $("#hienthi-sdt").val();
		var newmail = $("#hienthi-mail").val();
		var newdiachi = $("#hienthi-diachi").val();
		if(check_mail() == true && check_phone() == true)
		{
		$.ajax({
			url: "../controller/update_hienthi.php",
			method: "POST",
			dataType: 'html',
			data: {username: username, newname: newname, newmail: newmail, newphone: newphone, newdiachi: newdiachi},
			success:function(data)
			{
				var x = JSON.parse(data);
				if(x.update == 203)
				{
					alert("Số điện thoại và mail đã sử dụng")
				}
				else if(x.update == 202)
				{
					alert("Mail đã sử dụng");
				}
				else if(x.update == 201)
				{
					alert("Số điện thoại đã sử dụng");
				}
				else if(x.update == 200)
				{
					alert("Cập nhật thành công");
				}
			}
		});
		}	
	});
	$("#luu-matkhau").click(function()
	{
		var newpass = $("#new_pass").val();
		if(check_pass()==true)
		{
		$.ajax({
			url: "../controller/update_pass.php",
			method: "POST",
			dataType: 'html',
			data: {username: username, newpass: newpass},
			success:function(data)
			{
				var x = JSON.parse(data);
				if(x.update == 200)
				{
					alert("Đổi mật khẩu thành công")
				}
			}
		});
		}
	});

	$("#upload_img").click(function()
	{
		var file_data = $("#img_file").prop('files')[0];
		var form_data = new FormData();
        form_data.append("img", file_data);
        form_data.append("name", username);
        form_data.append("table", "member");
        $.ajax({
            url: "../controller/update_avatar.php",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(e)
            {
            	if(e == "error")
            	{
            		alert(e);
            	}
            	else
            	{
            		alert("Cập nhật ảnh đại diện thành công");
            		//$("#hienthi-avatar").attr("src", e);
            		location.reload();
            	}
            }
         });
	});

	$("#img_file").change(function(){
   	 	readURL(this);
	});

	$("#dx").click(function()
	{
		if(confirm('Bạn sẽ đăng xuất khỏi hệ thống!')) 
		{
			localStorage.setItem("vOneLocalStorage", "");
            return true;
        }
        return false;
    });


	function readURL(input) {
    	if (input.files && input.files[0]) 
    	{
	        var reader = new FileReader();
	        reader.onload = function (e) 
	        {
	            $('#hienthi-avatar').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
    	}
	}

	function check_mail() 
	{
		var ck_mail = $("#hienthi-mail").val();
		const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(ck_mail.length == 0)
		{
			return true;
		}
  		else if(re.test(ck_mail) != true)
  		{
  			alert("Mail không hợp lệ")
  			return false;
  		}
  		else
  		{
  			return true;
  		}
	}

	function check_phone()
	{
		var ck_phone = $("#hienthi-sdt").val();
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

	function check_pass()
	{
		var ck = $("#old_pass").val();

		if(ck != pass)
		{
			alert("Mật khẩu cũ chưa đúng");
			return false;
		}

		var new_ck = $("#new_pass").val();
		var pass_regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
		if(new_ck.length == 0)
		{
			alert("Bạn chưa điền mật khẩu mới");
			return false;
		}

		if(pass_regex.test(ck) == false)
		{
			alert("Mật khẩu mới phải có ít nhất 8 ký tự, bao gồm cả chữ và số");
			return false;
		}

		var ck_again = $("#new_pass_again").val();
		if(new_ck != ck_again)
		{
			alert("Nhập lại mật khẩu mới chưa đúng");
			return false;
		}
		return true;
	}
});
