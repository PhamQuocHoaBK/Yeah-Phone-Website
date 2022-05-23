<?php
require "header.php";
require "../Controller/ResponseController.php";
?>

<link rel="stylesheet" href="CSS/adminPage/table.css">
<script src="JS/cart.js"></script>
</head>

<?php
require "leftside.php";

$data = getData("Cart", "");
if ($data == "Fail") exit;
?>


<div class="content">
    <div class="label-bar">
        <div>
            <label class="top-label">Đơn hàng</label>
        </div>
    </div>
    <div class="cart-content">
        <table class="table-cart">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tài khoản</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
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
                        <td> <?= $row['tensp'] ?></td>
                        <td> <?= $row['soluong'] ?> </td>
                        <td> <?= $row['trangthai'] ?></td>
                        <td>
                            <button class="btn-delete" onclick="del('<?= $row['id'] ?>')">Hủy đơn</button>
                            <button class="btn-brows" onclick="brows('<?= $row['id'] ?>')">Duyệt</button>
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