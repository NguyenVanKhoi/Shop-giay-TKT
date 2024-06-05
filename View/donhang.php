<?php
$danhmuc = danhmuc_all();
$html_dm = showdm($danhmuc);
$sanpham = get_dssp_all(8);
$html_dssp = showsp($sanpham);

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
    <link rel="stylesheet" href="css/donhang.css">
</head>

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
                            <li><a href="index.php?act=Sale">Sale</a></li>
                        </ul>
                    </nav>
                </section>
                <section class="timkiem">
                    <form action="" method="post">
                        <input type="text" placeholder="Tìm kiếm">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                </section>
                <section class="giohang">
                    <a href="index.php?act=giohang"><img src="./img/giohang.png" alt=""></a>
                </section>
            </div>
        </header>
        <!-- main -->
        <div class="noidung">
            <div class="t" >
            <h1>ĐƠN HÀNG</h1>
            <?php
            if (isset($_SESSION['iddh']) && ($_SESSION['iddh'] > 0)) {
                $showcart = showcart($_SESSION['iddh']);
                if ((isset($showcart)) && (count($showcart) > 0)) {
                    echo '<table border="1"> 
                    <tr>
                        <th>STT</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>HÌNH</th>
                        <th>GIÁ</th>
                        <th>SỐ LƯỢNG</th>
                        <th>THÀNH TIỀN</th>
                    </tr>
                    ';
                    $i = 0;
                    $tong = 0;
                    foreach ($showcart as $item) {
                        $tt = $item['soluong'] * $item['dongia'];
                        $tong += $tt;
                        echo '<tr>
                            <td>' . ($i + 1) . '</td>
                            <td>' . $item['tensp'] . '</td>
                            <td><img src = "'  . $item['img'] . '" alt=""></td>
                            <td>' . $item['dongia'] . '</td>
                            <td>' . $item['soluong'] . '</td>
                            <td>' . $tt . '</td>
                        </tr>';
                        $i++;
                    };
                    echo '<tr>
                    <td colspan="5">Tống giá trị đơn hàng</td>
                    <td>' . $tong . '</td>
                </tr>';
                    echo '</table>';
                }
            } else {
                echo "Giỏ hàng rỗng. <a href='index.php'>Tiếp tục mua hàng</a>";
            }
            ?>
            </div>

            <div class="tong">
                <H1>THANH TOÁN</H1>
                <div class="w12">
                    <div class="nd">
                        <?php
                        if (isset($_SESSION['iddh']) && ($_SESSION['iddh'] > 0)) {
                            $oderinfo = showorder($_SESSION['iddh']);
                            if (count($oderinfo) > 0) {

                        ?>
                            <div class="ay" >
                                <h3>THÔNG TIN LIÊN HỆ</h3>
                                <input type="hidden" name="tongdonhang" value="<?= $tong ?>">
                                <section class="w13">
                                    <label for="" class="w14">Họ Tên: <?= $oderinfo[0]['ho_ten']; ?> </label>

                                </section>
                                <section class="w13">
                                    <label for="" class="w14">Số điện thoại: <?= $oderinfo[0]['phone']; ?> </label>

                                </section>
                                <section class="w13">
                                    <label for="" class="w14">Email: <?= $oderinfo[0]['email']; ?> </label>
                                </section>
                                <section class="w13">
                                    <label for="" class="w14">Địa chỉ: <?= $oderinfo[0]['dia_chi']; ?> </label>
                                </section>
                                <section class="w1" >
                                <label style=" margin-left: 15px; margin-right:10px; font-size: 18px; font-weight: bold;" for="">Phương thức thanh toán: </label><br>
                                <?php
                                switch ($oderinfo[0]['pttt']) {
                                    case '1':
                                        $txtmess = "Thanh toán khi nhận hàng";
                                        break;
                                    case '2':
                                        $txtmess = "Thanh toán chuyển khoản";
                                        break;
                                    default:
                                        $txtmess = "Bạn chưa chọn phương thức thanh toán";
                                        break;
                                }
                                echo $txtmess;
                                ?>
                                </section>
                            </div>
                    </div>
                </div>
        <?php
                            }
                        }
        ?>

            </div>
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
        
</body>
<script src="./chitietsp.js"></script>

</html>