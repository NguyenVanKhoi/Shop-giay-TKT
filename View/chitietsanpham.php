<?php
$danhmuc = danhmuc_all();
$html_dm = showdm($danhmuc);
$html_dssplq = showsplq($sanphamlq);
// var_dump($html_dssplq);
// die;

extract($result);
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
    <link rel="stylesheet" href="css/chitietsanpham.css">
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
                    <form action="index.php?act=timkiem" method="post">
                        <input type="text" placeholder="Tìm kiếm tại đây?" required="required">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                </section>
                <section class="giohang">
                    <a href="index.php?act=giohang"><img src="./img/giohang.png" alt=""></a>
                </section>
            </div>
        </header>

        <!-- main -->
        <main>
            <div class="tong">
                <section class="nd1">
                    <section class="image">
                        <img width="350px" src="./img/<?php echo $anh ?>" alt="">
                    </section>
                </section>
                <section class="nd1">
                    <section class="pro">
                        <p><?php echo $ten_san_pham ?></p>
                        <h3><?php echo $gia_goc ?>đ</h3>
                    </section>
                    <section class="color">
                        <p>Màu sắc:</p>
                        <div class="cl">
                            <input type="checkbox" value="<?php echo $mau_sac ?>"><?php echo $mau_sac ?>
                        </div>
                    </section>
                    <section class="size">
                        <p>Size:</p>
                        <div class="sz">
                            <input type="checkbox" value="<?php echo $size ?>"><?php echo $size ?>
                        </div>
                    </section>
                    <form action="index.php?act=addToCart" method="post">
                        <section class="number">
                            <p>Số lượng</p>
                            <input type="number" min="1" name="sl" value="1" step="1">
                            <input type="hidden" value="<?php echo $id_san_pham ?>" name="id_san_pham">
                            <input type="hidden" value="<?php echo $ten_san_pham ?>" name="ten_san_pham">
                            <input type="hidden" value="<?php echo $gia_goc ?>" name="gia">
                            <input type="hidden" value="<?php echo IMG_PATH_USER . $anh ?>" name="anh">
                            <input type="hidden">
                        </section>
                        <section class="muasp">
                            <input type="submit" value="Đặt hàng" name="addToCart">
                        </section>
                    </form>
                </section>
            </div>

        </main>
        <br>
        <section class="mota">
            <h1>MÔ TẢ SẢN PHẨM</h1>
        </section>
        <p class=""><?php echo $mo_ta ?></p>
        <br><br>
        <hr>
        <div class="bl" id="binhluan">
            <iframe src="View/binhluan.php?id_san_pham=<?= $id ?>" width="100%" height="500px" frameborder="0"></iframe>
        </div>
        <hr>
        <br>
        
        <h1>SẢN PHẨM LIÊN QUAN</h1>
        
        <div class="containerfullmr30">
                    <?= $html_dssplq ?>
                    
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
            <div  class="nd2">
                <h4>THÔNG TIN</h4>
            </div>
        </footer>
    </div>
</body>


</html>