<?php
$html_dssp = showsp_admin($sanpham);
?>
<?php
if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
    extract($_SESSION['s_user']);
    $html_account = '
        <section class="dangky">
                    <a href="index.php?act=dangky">' . $username . '</a>
                </section>

                <section class="dangnhap">
                    <a href="index.php?act=logout">Thoat</a>
                </section>';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/danhsach.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="admin">
            <h1>Admin</h1>
            <?= $html_account ?>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php?act=trangchu">Trang Chủ</a></li>
                <li><a href="index.php?act=danhmuc">Danh mục</a></li>
                <li><a href="index.php?act=sanpham">Sản phẩm</a></li>
                <li><a href="index.php?act=khachhang">Khách hàng</a></li>
                <li><a href="index.php?act=binhluan">Bình luận</a></li>
                <li><a href="index.php?act=donhang">Đơn hàng</a></li>
                <li><a href="index.php?act=thongke">Thống Kê</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="danh_sach_danh_muc">
            <h1>DANH SÁCH SẢN PHẨM</h1>
        </div>
        <form action="" method="post">
            <table border="1">
                <thead>
                    <tr>

                        <th>STT</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>GÍA</th>
                        <th>ẢNH</th>
                        <th>MÔ TẢ</th>
                        <th>MÀU SẮC</th>
                        <th>SIZE</th>
                        <th>BEST SELLER</th>
                        <th>DANH MỤC</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?= $html_dssp ?>
                    <!-- <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>1</td>
                        <td>Jordan</td>
                        <td>...</td>
                        <td>...</td>
                        <td><a href="sua_san_pham.html">Sửa</a></td>
                        <td><a href="">Xóa</a></td>
                    </tr> -->

                    <!-- <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>1</td>
                        <td>Jordan</td>
                        <td>...</td>
                        <td><a href="sua_san_pham.html">Sửa</a></td>
                        <td><a href="">Xóa</a></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>1</td>
                        <td>Jordan</td>
                        <td>...</td>
                        <td><a href="sua_san_pham.html">Sửa</a></td>
                        <td><a href="">Xóa</a></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>1</td>
                        <td>Jordan</td>
                        <td>...</td>
                        <td><a href="sua_san_pham.html">Sửa</a></td>
                        <td><a href="">Xóa</a></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>1</td>
                        <td>Jordan</td>
                        <td>...</td>
                        <td><a href="sua_san_pham.html">Sửa</a></td>
                        <td><a href="">Xóa</a></td>
                    </tr> -->

                </tbody>
            </table>
            <div class="them">
                <a href="index.php?act=addsp">THÊM</a>
            </div>
        </form>

    </main>
</body>

</html>