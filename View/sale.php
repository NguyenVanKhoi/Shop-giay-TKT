<?php
$danhmuc = danhmuc_all();
$html_dm = showdm($danhmuc);
$sanpham = get_dssp_all(8);
$html_dssp = showsp($sanpham);

$sanphamsale = get_dssp_sale(12);
$html_dsspsale = showspsale($sanphamsale);

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
</head>

<body>
    <!-- header -->
    <div class="container">
        <header>
            <div class="menu-1">
                <p>Cửa hàng TKT Shoes store</p>
                <?= $html_account ?>
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
                        <input type="text" name="kyw" placeholder="Tìm kiếm">
                        <button type="submit" name="timkiem">Tìm kiếm</button>
                    </form>
                </section>
                <section class="giohang">
                    <a href="index.php?act=giohang"><img src="./img/giohang.png" alt=""></a>
                </section>
            </div>
            <div class="banner">
                <img src="./img/Component 40.png" alt="img">
            </div>
        </header>

        <!-- main -->
        <main>
            <div>
                <h2>ƯU ĐÃI GIÁ SỐC</h2>
            </div>
            <div class="tong">
                <section class="noidung1">

                    <?= $html_dsspsale ?>
                    <!-- <article>
                        <section class="one">
                            <section class="w13">
                                <a href="#"><img src="./img/S1.png" alt=""></a></a>
                                <section class="block">
                                    <p>Giày thể thao Jordan cổ cao, Giày JD1
                                        Panda</p>
                                    <h3><del>500.000₫</del>200.000₫</h3>
                                </section>
                            </section>
                        </section>
                    </article> -->
                    <!-- 
                    <article>
                        <section class="w13">
                            <a href="#"><img src="./img/S2.png" alt=""></a>
                            <section class="block">
                                <p>Giày thể thao Jordan cổ cao, Giày JD1
                                    Panda</p>
                                <h3><del>600.000₫ </del>300.000₫</h3>
                            </section>
                        </section>
                    </article>

                    <article>
                        <section class="w13">
                            <a href="#"><img src="./img/img3.png" alt=""></a>
                            <section class="block">
                                <p>Nike Jordan 1 Low DA Đen Trắng REP 1:1</p>
                                <h3><del>850.000₫</del>550.000₫</h3>
                            </section>
                        </section>
                    </article>

                    <article>
                        <section class="w13">
                            <a href="#"><img src="./img/S3.png" alt=""></a>
                            <section class="block">
                                <p>Giày thể thao Jordan cổ cao, Giày JD1
                                    Panda</p>
                                <h3><del>600.000₫</del>420.000₫</h3>
                            </section>
                        </section>
                    </article>

                </section>

                <section class="noidung1">
                    <article>
                        <section class="w13">
                            <a href="#"><img src="./img/S5.png" alt=""></a>
                            <section class="block">
                                <p>Giày MLB LA DODGERS Kem REP</p>
                                <h3><del>600.000₫</del>320.000₫</h3>
                            </section>
                        </section>
                    </article>

                    <article>
                        <section class="w13">
                            <a href="#"><img src="./img/S7.png" alt=""></a>
                            <section class="block">
                                <p>Giày mlb chunky liner 3 phối màu, Giày mlb nam nữ
                                    đế cao 5cm</p>
                                <h3><del>1000.000₫</del>620.000₫</h3>
                            </section>
                        </section>
                    </article>

                    <article>
                        <section class="w13">
                            <a href="#"><img src="./img/S8.png" alt=""></a>
                            <section class="block">
                                <p>Giày mlb chunky liner 3 phối màu, Giày mlb nam nữ
                                    đế cao 5cm</p>
                                <h3><del>500.000₫</del>320.000₫</h3>
                            </section>
                        </section>
                    </article>

                    <article>
                        <section class="w13">
                            <a href="#"><img src="./img/S9.png" alt=""></a>
                            <section class="block">
                                <p>Giày Thể Thao Nam Nữ _Adidas Campus 00s
                                    Phong Cách Vintage</p>
                                <h3><del>700.000₫</del>400.000₫</h3>
                            </section>
                        </section>
                    </article>

                </section>

                <section class="noidung1">
                    <article>
                        <section class="w13">
                            <a href="#"><img src="./img/S10.png" alt=""></a>
                            <section class="block">
                                <p>Nike Air Force 1 07 Undefeated Trắng Xanh Ngọc REP 1:1</p>
                                <h3><del>800.000₫</del>650.000₫</h3>
                            </section>
                        </section>
                    </article>

                    <article>
                        <section class="w13">
                            <a href="#"><img src="./img/img10.png" alt=""></a>
                            <section class="block">
                                <p>Adidas Superstar Cappuccino Kem Mũi Sò REP 1:1</p>
                                <h3><del>700.000₫</del>450.000₫</h3>
                            </section>
                        </section>
                    </article>

                    <article>
                        <section class="w13">
                            <a href="#"><img src="./img/S11.png" alt=""></a>
                            <section class="block">
                                <p>Giày Thể Thao Nam Nữ _Adidas Campus 00s
                                    Phong Cách Vintage</p>
                                <h3><del>900.000₫</del>720.000₫</h3>
                            </section>
                        </section>
                    </article>

                    <article>
                        <section class="w13">
                            <a href="#"><img src="./img/img12.png" alt=""></a>
                            <section class="block">
                                <p>Giày MLB Chunky P Boston Đỏ REP 1:1</p>
                                <h3><del>1000.000₫</del>580.000₫</h3>
                            </section>
                        </section>
                    </article>

                </section> -->
            </div>
        </main>
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

</html>