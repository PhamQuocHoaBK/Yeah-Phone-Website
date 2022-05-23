<?php
require "header.php";
require "../Controller/ResponseController.php";
?>

<link rel="stylesheet" href="CSS/adminPage/table.css">
<script src="JS/members.js"></script>
</head>

<?php
require "leftside.php";

$data = getData("Member", "");
if ($data == "Fail") exit;
?>


<div class="content">
    <div class="label-bar">
        <div>
            <label class="top-label">Thành viên</label>
        </div>
    </div>
    <div class="member-content">
        <table class="table-member">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tài khoản</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = $data->fetch_assoc()) {
                ?>
                    <tr>
                        <td> <?= $i ?> </td>
                        <td> <?= $row['tendangnhap'] ?> </td>
                        <td> <?= $row['sdt'] ?></td>
                        <td> <?= $row['mail'] ?> </td>
                        <td>
                            <button class="btn-delete" onclick="del('<?= $row['tendangnhap'] ?>')">Xóa</button>
                        </td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</div>
</body>

</html>