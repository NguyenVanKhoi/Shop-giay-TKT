<?php
$danhmuc = danhmuc_all();
$html_dm = showdm($danhmuc);
$sanpham = get_dssp_all(8);
$html_dssp = showsp($sanpham);
$sp_bestseller = get_dssp_best(4);
$html_spbest = showspbest($sp_bestseller);

if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
    extract($_SESSION['s_user']);
    $html_account = '
    <section class="dangky">
                <a href="index.php?act=dangky">' . $username . '</a>
            </section>

            <section class="dangnhap">
                <a href="index.php?act=logout">Thoat</a>
            </section>';
} else {
    $html_account = '<section class="dangky">
    <a href="index.php?act=dangky">Đăng ký</a>
</section>

<section class="dangnhap">
    <a href="index.php?act=dangnhap">Đăng nhập</a>
</section>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/dathangthanhcong.css">
</head>
<!-- <style>
    header .timkiem form button{
        width: 100px;
    }
</style> -->

<body>
    <!-- header -->
    <div class="container">
        <header>
            <div class="menu-1">
                <p>Cửa hàng TKT Shoes store</p>
                <?= $html_account; ?>
                <!-- <section class="dangky">
                    <a href="index.php?act=dangky">Đăng ký</a>
                </section>

                <section class="dangnhap">
                    <a href="index.php?act=dangnhap">Đăng nhập</a>
                </section> -->
            </div>

            <div class="menu-2">
                <section class="logo">
                    <a href="index.php"><img src="./img/logo.png" alt="img"></a>
                </section>
                <section class="menu">
                    <nav>
                        <ul>
                            <?= $html_dm ?>
                            <li><a href="index.php?act=sale">Sale</a></li>
                        </ul>
                    </nav>
                </section>
                <section class="timkiem">
                    <form action="index.php?act=timkiem" method="post">
                        <input type="text" name="kyw" placeholder="Tìm kiếm tại đây?" required="required">
                        <button type="submit" name="timkiem">Tìm kiếm</button>
                    </form>
                </section>
                <section class="giohang">
                    <a href="index.php?act=giohang"><img src="./img/giohang.png" alt=""></a>
                </section>
            </div>
        </header>

        <!-- main -->
        <div class="tong">
            <img src="./img/giohang.png" alt="img">
            <p>Bạn đã đặt hàng thành công</p>
            <p>Quay lại Trang chủ để mua thêm các sản phẩm khác</p>
        </div>


        <!-- footer -->
        <footer>
            <div class="logo-1"><img src="./img/logo.png" alt=""></div>
            <div class="nd1">
                <p>Địa chỉ: 60 Tuyệt Tình Cốc</p>
                <p>Hotel: 0969 470 ***</p>
            </div>
            <div class="nd2">
                <h4>HỖ TRỢ</h4>
                <P>7 cách bảo quản giày thể thao tốt nhât</P>
                <p>Giữ phong độ cho sneaker trắng ra sao</p>
            </div>
            <div class="nd2">
                <h4>THÔNG TIN</h4>
            </div>
        </footer>
    </div>
</body>
<script src="./chitietsp.js"></script>

</html>