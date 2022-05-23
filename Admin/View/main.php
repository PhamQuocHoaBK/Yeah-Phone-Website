<?php
// Thêm đường dẫn header và file hỗ trợ response
require "header.php";
require "../Controller/ResponseController.php";
?>

<link rel="stylesheet" href="CSS/adminPage/main.css">
</head>

<?php
require "leftside.php";
// Lấy dữ liệu của admin bằng session
$session = $_SESSION['username'];
$data =  getData("Infor", $session);
if ($data == "Fail") exit;
$row = $data->fetch_assoc();
?>


<div class="content">
    <div class="label-bar">
        <div>
            <label class="top-label">Trang chính</label>
        </div>
    </div>
    <div class="main-content">

        <div class="show-img">
            <div class="image">
                <img src="../Model/Img/<?= $row['img'] ?>">
            </div>
            <div>
                <input type="file" id="img">
                <label for="img" id="label-img">Đổi ảnh</label>
                <input type="button" id="btn" value="OK">
            </div>
        </div>

        <div class="admin-info">
            <label><b>Tên:</b> <?= $row['user'] ?></label>
            <label><b>Mail:</b> <?= $row['mail'] ?></label>
            <label><b>Số điện thoại:</b> 0<?= $row['phone'] ?></label>
        </div>
    </div>

</div>
</div>

<script>
    $(document).ready(function() {
        $("#btn").click(function() {
            var file_data = $('#img').prop('files')[0];
            var form_data = new FormData();
            form_data.append("img", file_data);
            form_data.append("name", "<?= $session ?>");
            form_data.append("table", "admin");

            $.ajax({
                url: "../Controller/UploadController.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,

                success: function(e) {
                    console.log(e);
                    location.reload();
                }
            })
        })
    })
</script>

</body>

</html>