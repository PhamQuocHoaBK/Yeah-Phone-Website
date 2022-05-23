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

$data_edit = getData("Product", "");
if ($data_edit == "Fail") exit;

if (!isset($_GET['msp'])) exit;
$msp = $_GET['msp'];
$r;

while ($r = $data_edit->fetch_assoc()) {
    if ($r['msp'] == $msp) break;
}

?>

<div class="content">

    <div class="label-bar">
        <div>
            <label class="top-label">Sản phẩm > Chỉnh sửa</label>
        </div>
    </div>

    <div class="product-content">

        <h3>Chỉnh sửa sản phẩm</h3>

        <div class="edit">
            <label>Mã sản phẩm </label>
            <input type="text" id="msp" value="<?= $r['msp'] ?>">
        </div>

        <div class="edit">
            <label>Tên sản phẩm </label>
            <input type="text" id="tensp" value="<?= $r['tensp'] ?>">
        </div>

        <div class="edit">
            <label>Giá </label>
            <input type="text" id="gia" value="<?= $r['gia'] ?>">
        </div>

        <button class="btn-update" onclick="update(<?= $r['id'] ?>)">Cập nhật</button>

    </div>

</div>
</div>
</body>

</html>