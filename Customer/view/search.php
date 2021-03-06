<?php
    $host = "localhost";
    $root = "root";
    $password = "";
    $database = "assignment";

    $connect = new mysqli($host, $root, $password, $database);

    if($connect->connect_error) {
        die("Error: " . $connect->connect_error);
    }

    if(isset($_GET['search'])) {
        $v = $_GET['search'];
        $sql = "SELECT * FROM product WHERE CONCAT(msp,tensp) LIKE '%$v%'";

        $result = $connect->query($sql);

        if($result->num_rows <= 0) {
            $result = "Không tìm thấy";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS//style.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/base-min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/grids-min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/grids-responsive-min.css">
    <script src="https://kit.fontawesome.com/edefe0e6e7.js" crossorigin="anonymous"></script>
    <title>Shop Điện Thoại</title>
</head>

<body>
    <div class="big-container">
        <div class="header">
            <div class="pure-g">
                <div class="pure-u-1-6">
                    <a href="main.html"><img src="apple_b.jfif" class="logo" alt="#"></a>
                    <br>
                    <p>Yeah Phone</p>
                </div>
                <div class="pure-u-2-5">
                    <form class="search-bar">
                        <input type="text" placeholder="Nhập tên sản phẩm cần tìm" name="search">
                        <button value="search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="pure-u-1-12"><a href="contact-us.html" class="header-icon"><i
                            class="fas fa-phone-alt"></i>&nbsp;Hotline<br>1800 5508</a></div>
                <!-- <div class="pure-u-1-8"><a href="#" class="header-icon"><p style="float: right; margin: 0; line-height:18px; font-size: 17px;"><br><br>Của hàng gần nhất</p></a></div> -->
                <div class="pure-u-1-8"><a href="contact-us.html" class="header-icon"><i
                            class="fas fa-map-marker-alt"></i><br>Cửa hàng gần đây</a></div>
                <div class="pure-u-1-12"><a href="cart.html" class="header-icon"><i
                            class="fas fa-shopping-cart"></i><br>Giỏ hàng</a></div>
                <!-- <div class="pure-u-1-8"><a href="#" class="header-icon"><i class="fas fa-sign-in-alt"></i><br>Tài khoản của tôi</a></div> -->
                <div class="pure-u-1-8"><a href="login.html" class="header-icon"><i
                            class="fas fa-sign-in-alt"></i><br>Đăng nhập</a></div>
            </div>
            <div class="header-bar">
                <div class="container">
                    <div class="pure-g">
                        <div class="pure-u-1-5" style="margin-left: 120px;">
                            <a class="index" href="flash-sale.html">flash sale</a>
                        </div>
                        <div class="pure-u-1-5" style="border-left: black solid 1px;">
                            <a class="index" href="flagship.html">flag ship</a>
                        </div>
                        <div class="pure-u-1-5" style="border-left: black solid 1px;">
                            <a class="index" href="old.html">Điện thoại cũ</a>
                        </div>
                        <div class="pure-u-1-5" style="border-left: black solid 1px;">
                            <a class="index" href="item.html">Phụ kiện</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content">

            <div class="poster-slide">
                <div class="mySlides fade">
                    <img src="Poster/poster.png" class="poster" alt="#">
                </div>
                <div class="mySlides fade">
                    <img src="Poster/poster3.png" class="poster" alt="#">
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <div class="tab-single">
                <?php
                    if($result == "Không tìm thấy") {
                ?>
                    <h1>Không tìm thấy</h1>
                <?php
                    }
                    else {
                        $endTag = true;
                        $i = 1;
                        while($row = $result->fetch_assoc()) {
                            if($endTag == true) {?>
                                <div class="pure-g">
                                    <div class="container-product">
                <?php
                        $endTag = false;}
                ?>
                        <div class="pure-u-1-5">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="<?=$row['link']?>">
                                        <img class="default-img" src="<?=$row['hinh']?>" alt="#">
                                    </a>
                                    <!-- <div class="dec">Giảm 13%</div> -->
                                </div>
                                <div class="product-content">
                                    <h3><a href="<?=$row['link']?>"><?=$row['tensp']?></a></h3>
                                    <p>Thông tin thêm:</p>
                                    <div class="pure-g">
                                        <div class="container-price">
                                            <div class="pure-u-3-5">
                                                <div class="product-price">
                                                    <span><?=$row['gia']?></span>
                                                    <!-- <span class="old">26.990.000</span> -->
                                                </div>
                                            </div>
                                            <div class="pure-u-1-5">
                                                <a href="#" class="product-icon"><i
                                                        class="fas fa-cart-arrow-down"></i></a>
                                            </div>
                                            <div class="pure-u-1-5">
                                                <a href="#" class="product-icon"><i class="far fa-heart"></i></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                        if($i % 5 == 0) {
                            $endTag = true;?>
                                    </div>
                                </div>
                        <?php
                        $i++;}
                        }
                    }
                ?>
            </div>

            <div class="footer">
                <div class="container">
                    <div class="pure-g">
                        <div class="pure-u-2-5">
                            <img src="apple.jpg" class="footer-img" alt="#">
                            <div class="about-box">
                                <p class="footer-title">About us:</p>
                                <p id="about">Apple Inc. là một tập đoàn công nghệ đa quốc gia của Mỹ có trụ sở chính
                                    tại Cupertino, California, chuyên thiết kế, phát triển và bán thiết bị điện tử tiêu
                                    dùng, phần mềm máy tính và các dịch vụ trực tuyến. Nó được coi là một trong Năm công
                                    ty lớn của ngành công nghệ thông tin Hoa Kỳ, cùng với Amazon, Google, Microsoft và
                                    Facebook.
                                    Các dòng sản phẩm phần cứng của hãng bao gồm điện thoại thông minh iPhone, máy tính
                                    bảng iPad, máy tính xách tay Macbook, máy tính cá nhân Mac, máy nghe nhạc di động
                                    iPod, đồng hồ thông minh Apple Watch, máy phát đa phương tiện kỹ thuật số Apple TV,
                                    tai nghe không dây AirPods, tai nghe AirPods Max và loa thông minh HomePod.
                                    Phần mềm của Apple bao gồm hệ điều hành macOS, iOS, iPadOS, watchOS và tvOS, trình
                                    phát đa phương tiện iTunes, trình duyệt web Safari, mã nhận dạng nhạc Shazam, gói
                                    làm việc năng suất và sáng tạo iLife và iWork, cũng như các ứng dụng chuyên nghiệp
                                    như Final Cut Pro, Logic Pro và Xcode. Các dịch vụ trực tuyến của nó bao gồm iTunes
                                    Store, iOS App Store, Mac App Store, Apple Arcade, Apple Music, Apple TV +, iMessage
                                    và iCloud.
                                    Các dịch vụ khác bao gồm Apple Store, Genius Bar, AppleCare, Apple Pay, Apple Pay
                                    Cash và Apple Card.</p>
                            </div>
                        </div>
                        <div class="pure-u-1-5">
                            <p class="footer-title">Dành cho khách hàng</p>
                            <ul>
                                <li><a href="#" class="footer-link">Xuất khẩu</a></li>
                                <li><a href="#" class="footer-link">Bảo vệ người mua</a></li>
                                <li><a href="#" class="footer-link">Hướng dẫn mua hàng</a></li>
                                <li><a href="#" class="footer-link">Phương thức thanh toán</a></li>
                                <li><a href="#" class="footer-link">Chính sách đổi trả hàng</a></li>
                                <li><a href="#" class="footer-link">Câu hỏi thường gặp</a></li>
                                <li><a href="#" class="footer-link">Cách thức giao nhận</a></li>
                                <li><a href="#" class="footer-link">Chính sách giao dịch</a></li>
                                <li><a href="#" class="footer-link">Chính sách bảo mật</a></li>
                                <li><a href="#" class="footer-link">Chính sách đại lý</a></li>
                                <li><a href="#" class="footer-link">Chính sách giải quyết<br>khiếu nại</a></li>
                            </ul>
                        </div>
                        <div class="pure-u-1-5">
                            <p class="footer-title">Phương thức thanh toán</p>
                            <ul>
                                <li><a href="#" class="footer-link">VISA</a></li>
                                <li><a href="#" class="footer-link">Master Card</a></li>
                                <li><a href="#" class="footer-link">JCB</a></li>
                                <li><a href="#" class="footer-link">Momo</a></li>
                                <li><a href="#" class="footer-link">ZaloPay</a></li>
                            </ul>
                        </div>
                        <div class="pure-u-1-5">
                            <p class="footer-title">Các chi nhánh</p>
                            <ul>
                                <li><a href="#" class="footer-link">Hà Nội</a></li>
                                <li><a href="#" class="footer-link">Đà Nẵng</a></li>
                                <li><a href="#" class="footer-link">TP.HCM</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }
    </script>
</body>

</html>