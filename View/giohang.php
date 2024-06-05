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
    <link rel="stylesheet" href="css/giohang.css">
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
                        <input type="text" required="required" placeholder="Tìm kiếm">
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
            <div class="nd_0">
                <h1>GIỎ HÀNG</h1>
                <?php
                if ((isset($_SESSION['giohang'])) && (count($_SESSION['giohang']) > 0)) {
                    echo '<table border="1"> 
                    <tr>
                        <th>STT</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>HÌNH</th>
                        <th>GIÁ</th>
                        <th>SỐ LƯỢNG</th>
                        <th>THÀNH TIỀN</th>
                        <th>HÀNH ĐỘNG</th>
                    </tr>
                    ';
                    $i = 0;
                    $tong = 0;
                    foreach ($_SESSION['giohang'] as $item) {
                        $tt = $item[2] * $item[4];
                        $tong += $tt;
                        echo '<tr>
                            <td>' . ($i + 1) . '</td>
                            <td>' . $item[1] . '</td>
                            <td><img src = "' . $item[3] . '" alt="123"></td>
                            <td>' . $item[2] . '</td>
                            <td>' . $item[4] . '</td>
                            <td>' . $tt . '</td>
                            <td><a href="index.php?act=delcart&i=' . $i . '">Xóa</a></td>
                        </tr>';
                        $i++;
                    };
                    echo '<tr>
                    <td colspan="5">Tống giá trị đơn hàng</td>
                    <td>' . $tong . '</td>
                    <td></td>
                </tr>';
                    echo '</table>';
                }
                ?>
                <div class="xoatc">
                    <a href="index.php"><button>TIẾP TỤC MUA HÀNG</button></a>
                    <a href="index.php?act=delcart"><button>XÓA TẤT CẢ</button></a>
                </div>
            </div>


            <!-- right -->
            <div class="nd_1">
                <H1>THANH TOÁN</H1>
                <form action="index.php?act=thanhtoan" method="post">

                    <div class="tong">

                        <h3>THÔNG TIN ĐẶT HÀNG</h3>
                        <input type="hidden" name="tongdonhang" value="<?= $tong ?>">
                        <section class="w13">
                            <label for="" class="w14">Họ Tên: </label>
                            <input type="text" name="ho_ten" required id="ten">
                        </section>
                        <section class="w13">
                            <label for="" class="w14">Số điện thoại: </label>
                            <input type="phone" name="phone" required id="sdt">
                        </section>
                        <section class="w13">
                            <label for="" class="w14">Email: </label>
                            <input type="email" name="email" required id="email">
                        </section>
                        <section class="w13">
                            <label for="" class="w14">Địa chỉ: </label>
                            <input type="text" name="dia_chi" required id="diachi">
                        </section>
                        <section class="iu">
                            <label for="">Phương thức thanh toán: </label><br>
                            <input style="width: 20px;" required type="radio" name="pttt" value="1">Thanh toán khi nhận hàng
                            <button type="submit"  name="redirect">Thanh toán Vnpay</button>
                        </section>
                    </div>
                    <div class="thanhtoan">
                        <input type="submit" value="Thanh Toán" name="thanhtoan">
                    </div>
                </form>
            </div>

        </div>

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
    </div>
</body>
<script src="./chitietsp.js"></script>

</html>