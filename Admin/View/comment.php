<?php
require "header.php";
require "../Controller/ResponseController.php";
?>

<link rel="stylesheet" href="CSS/adminPage/table.css">
<script src="JS/comment.js"></script>
</head>

<?php
require "leftside.php";

$data = getData("Comment", "");
if ($data == "Fail") exit;
?>

<div class="content">
    <div class="label-bar">
        <div>
            <label class="top-label">Bình luận</label>
        </div>
    </div>
    <div class="comment-content">
        <table class="table-comment">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tài khoản</th>
                    <th>Mã sản phẩm</th>
                    <th>Bình luận</th>
                    <th>Thời gian</th>
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
                        <td> <?= $row['msp'] ?></td>
                        <td> <?= $row['cmt'] ?> </td>
                        <td> <?= $row['time'] ?> </td>
                        <td>
                            <button class="btn-delete" onclick="del('<?= $row['id'] ?>')">Xóa</button>
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