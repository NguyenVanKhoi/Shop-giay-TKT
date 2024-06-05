<?php
$danhmuc = danhmuc_all();
$html_dm = showdm($danhmuc);
$html_dm1 = showdm($danhmuc);
$kq = get_name_dm($id_danhmuc);

$html_dssp = showsp1($sanpham);

if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
    extract($_SESSION['s_user']);
    $html_account='
    <section class="dangky">
                <a href="index.php?act=dangky">'.$username.'</a>
            </section>

            <section class="dangnhap">
                <a href="index.php?act=logout">Thoat</a>
            </section>';

}else{
    $html_account='<section class="dangky">
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
    <link rel="stylesheet" href="css/danhmuc.css">
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
                            <li><a href="index.php?act=sale">Sale</a></li>
                        </ul>
                    </nav>
                </section>
                <section class="timkiem">
                    <form action="index.php?act=timkiem" method="post">
                        <input type="text" placeholder="Tìm kiếm tại đây?" required="required" >
                        <button style="width: 100px;" type="submit">Tìm kiếm</button>
                    </form>
                </section>
                <section class="giohang">
                    <a href="index.php?act=giohang"><img src="./img/giohang.png" alt=""></a>
                </section>
            </div>
        </header>

        <!-- end header -->
        <div class="main">
            <div class="content">
                <div class="item-1">
                    <h3>Danh mục sản phẩm <?= $kq ?></h3>
                    <ul>
                        <?= $html_dm ?>
                        <li><a href="index.php?act=sale">Sale</a></li>
                    </ul>
                </div>
                <div class="item-2">
                    <div class="noidung">
                        <?= $html_dssp?>
                        <!-- <div class="item-img">
                            <a href="index.php?act=chitietsanpham"><img src="./img/adidas/image 91.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao nam nữ Adidas Forum 84 đủ size 36-43 Thời Trang Trẻ Trung Dễ Phối Đồ </b></p>
                                <p style="color: red;"><b>160.000 đ</b></p>
                            </section>
                        </div> -->
                        <!-- <div class="item-img">
                            <a href="#"><img src="./img/adidas/image 94.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao Đế Bằng Siêu Nhẹ Kiểu Retro Đức Thời Trang Xuân Thu Cho Nữ</b></p>
                                <p style="color: red;"><b>300.000 đ</b></p>
                            </section>
                        </div>
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 95.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao nam nữ Adidas Forum 84 đủ size 36-43 Thời Trang Trẻ Trung Dễ Phối Đồ </b></p>
                                <p style="color: red;"><b>260.000 đ</b></p>
                            </section>
                        </div>
                    </div>

                    <div class="noidung">
                        <div class="item-img">
                            <a href="#"><img src="./img/adidas/image 95.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao Đế Bằng Siêu Nhẹ Kiểu Retro Đức Thời Trang Xuân Thu Cho Nữ</b></p>
                                <p style="color: red;"><b>390.000 đ</b></p>
                            </section>
                        </div>
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 94.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Sneaker Nike_Blazer Mid 77 Vintage White Black thấp cổ-cao cổ Full Size Nam Nữ </b></p>
                                <p style="color: red;"><b>369.000 đ</b></p>
                            </section>
                        </div>
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 91.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Sneaker Nike_Blazer Mid 77 Vintage White Black thấp cổ-cao cổ Full Size Nam Nữ </b></p>
                                <p style="color: red;"><b>100.000 đ</b></p>
                            </section>
                        </div>
                    </div>

                    <div class="noidung">
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 94.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao nam nữ Adidas Forum 84 đủ size 36-43 Thời Trang Trẻ Trung Dễ Phối Đồ</b></p>
                                <p style="color: red;"><b>400.000 đ</b></p>
                            </section>
                        </div>
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 91.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao nam nữ Adidas Forum 84 đủ size 36-43 Thời Trang Trẻ Trung Dễ Phối Đồ </b></p>
                                <p style="color: red;"><b>200.000 đ</b></p>
                            </section>
                        </div>
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 95.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao nam nữ Adidas Forum 84 đủ size 36-43 Thời Trang Trẻ Trung Dễ Phối Đồ </b></p>
                                <p style="color: red;"><b>360.000 đ</b></p>
                            </section>
                        </div>
                    </div>

                    <div class="noidung">
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 91.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao nam nữ Adidas Forum 84 đủ size 36-43 Thời Trang Trẻ Trung Dễ Phối Đồ </b></p>
                                <p style="color: red;"><b>930.000 đ</b></p>
                            </section>
                        </div>
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 94.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao nam nữ Adidas Forum 84 đủ size 36-43 Thời Trang Trẻ Trung Dễ Phối Đồ </b></p>
                                <p style="color: red;"><b>760.000 đ</b></p>
                            </section>
                        </div>
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 95.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao nam nữ Adidas Forum 84 đủ size 36-43 Thời Trang Trẻ Trung Dễ Phối Đồ </b></p>
                                <p style="color: red;"><b>960.000 đ</b></p>
                            </section>
                        </div>
                    </div>

                    <div class="noidung">
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 95.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao nam nữ Adidas Forum 84 đủ size 36-43 Thời Trang Trẻ Trung Dễ Phối Đồ </b></p>
                                <p style="color: red;"><b>380.000 đ</b></p>
                            </section>
                        </div>
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 94.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao nam nữ Adidas Forum 84 đủ size 36-43 Thời Trang Trẻ Trung Dễ Phối Đồ </b></p>
                                <p style="color: red;"><b>370.000 đ</b></p>
                            </section>
                        </div>
                        <div class="item-img">
                            <a href="#"> <img src="./img/adidas/image 91.png" alt="" srcset="" width="251px" height="208px"></a>
                            <section class="block">
                                <p><b>Giày Thể Thao nam nữ Adidas Forum 84 đủ size 36-43 Thời Trang Trẻ Trung Dễ Phối Đồ </b></p>
                                <p style="color: red;"><b>660.000 đ</b></p>
                            </section>
                        </div>
                    </div> -->
                </div>
            </div>

        </div>
        <!-- end main -->

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
        <!-- end footer -->
    </div>
</body>

</html>