<?php
$id_danh_muc = $_GET['id_danh_muc'];
$kq = get_name_dm($id_danh_muc);
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
    <link rel="stylesheet" href="../css/danhmucadmin.css">
    <title>Danh muc</title>
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
        <div class="title">
            <h1>SỬA DANH MỤC</h1>
        </div>
        <div class="inp">
            <p>DANH MỤC</p>
            <form action="index.php?act=suadm" method="post">
                <input type="hidden" name="id_danh_muc" value="<?= $_GET['id_danh_muc'] ?>">
                <input type="text" name='ten_danh_muc' value="<?= $kq ?>">
                <div class="btn">
                    <button type="submit" name="suadm">SỬA</button>
                    <a href="index.php?act=danhmuc">DANH SÁCH DANH MỤC</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>