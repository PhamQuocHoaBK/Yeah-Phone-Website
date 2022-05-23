<?php
require "header.php";
require "../Controller/ResponseController.php";
?>

<!-- Thêm css vào file này -->
<link rel="stylesheet" href="CSS/adminPage/table.css">
<script src="JS/product.js"></script>
</head>

<?php
require "leftside.php";

$data = getData("Product", "");
if ($data == "Fail") exit();
?>


<div class="content">
    <div class="label-bar">
        <div>
            <label class="top-label">Sản phẩm</label>
        </div>
    </div>
    <table class="table-product">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
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
                    <td> <?= $row['msp'] ?> </td>
                    <td> <?= $row['tensp'] ?></td>
                    <td> <?= $row['gia'] ?></td>
                    <td>
                        <a href="product_edit.php?msp=<?= $row['msp'] ?>"><button class="btn-edit">Sửa</button></a>
                        <button class="btn-delete" onclick="del('<?= $row['msp'] ?>')">Xóa</button>
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
</body>

</html>