<?php
session_start();
ob_start();
if (isset($_SESSION['s_user']) && (is_array($_SESSION['s_user'])) && (count($_SESSION['s_user']) > 0)) {
    $admin = $_SESSION['s_user'];
} else {
    header('location: ../index.php');
}
include_once 'model/pdo.php';
include_once 'model/danhmuc.php';
include_once 'model/sanpham.php';
include_once 'model/user.php';
include_once 'model/binhluan.php';
include_once 'model/thong-ke.php';
include_once 'model/donhang.php';
include_once 'model/giohang.php';
include_once 'model/gobal.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'trangchu':
            include_once 'view/main.php';
            break;
        case 'danhmuc':
            $danhmuc = danhmuc_all();
            include_once 'view/danhmuc/danhsachdanhmuc.php';
            break;
        case 'dmadd':
            include_once 'view/danhmuc/themdanhmuc.php';
            break;
        case 'themdm':
            if (isset($_POST['themdm'])) {
                $ten_danh_muc = $_POST['ten_danh_muc'];

                danhmuc_insert($ten_danh_muc);
                $danhmuc = danhmuc_all();
                include 'view/danhmuc/danhsachdanhmuc.php';
            } else {
                include 'view/danhmuc/danhsachdanhmuc.php';
            }

            break;
        case 'dmsua':
            include_once 'view/danhmuc/suadanhmuc.php';
            break;
        case 'suadm':

            if (isset($_POST['suadm'])) {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $id_danh_muc = $_POST['id_danh_muc'];
                danhmuc_update($ten_danh_muc, $id_danh_muc);
                $danhmuc = danhmuc_all();
                include 'view/danhmuc/danhsachdanhmuc.php';
            } else {
                include 'view/danhmuc/danhsachdanhmuc.php';
            }
            break;
        case 'xoadm':
            if (isset($_GET['id_danh_muc']) && ($_GET['id_danh_muc'] > 0)) {
                $id_danh_muc = $_GET['id_danh_muc'];
                danhmuc_delete($id_danh_muc);
            }
            $danhmuc = danhmuc_all();
            include 'view/danhmuc/danhsachdanhmuc.php';
            break;
            //xong danh muc
            // bắt đầu sản phẩm
        case 'sanpham':
            $sanpham = get_dssp_all(100);
            include_once 'view/sanpham/danh_sach_san_pham.php';
            break;
        case 'addsp':

            $danhmuc = danhmuc_all();
            include_once 'view/sanpham/them_san_pham.php';
            break;
        case 'spadd':
            $danhmuc = danhmuc_all();
            if (isset($_POST['spadd'])) {
                $id_danhmuc = $_POST['id_danhmuc'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $size = $_POST['size'];
                $mau_sac = $_POST['mau_sac'];
                $anh = $_FILES['anh']['name'];
                $mo_ta = $_POST['mo_ta'];
                $img = IMG_PATH_ADMIN . $anh;
                move_uploaded_file($_FILES['anh']['tmp_name'], $img);
                sanpham_insert($ten_san_pham, $anh, $gia, $id_danhmuc, $mau_sac, $mo_ta, $size);
            } else {
                include_once 'view/sanpham/them_san_pham.php';
            }
            $sanpham = get_dssp_all(10);
            include_once 'view/sanpham/danh_sach_san_pham.php';
            break;
        case 'deletesp':
            if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {
                $id_san_pham = $_GET['id_san_pham'];
                sanpham_delete($id_san_pham);
            }
            $sanpham = get_dssp_all(10);
            include_once 'view/sanpham/danh_sach_san_pham.php';
            break;

        case 'updatesp':
            if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {
                $id_san_pham = $_GET['id_san_pham'];
                $sanpham = get_sanphamchitiet($id_san_pham);
            }
            $danhmuc = danhmuc_all();
            include_once 'view/sanpham/sua_san_pham.php';
            break;
        case 'spupdate':
            if (isset($_POST['spupdate'])) {
                $id_san_pham = $_POST['id_san_pham'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $id_danhmuc = $_POST['id_danhmuc'];
                $gia = $_POST['gia'];
                $size = $_POST['size'];
                $mau_sac = $_POST['mau_sac'];
                $mo_ta = $_POST['mo_ta'];
                $anh = $_FILES['anh']['name'];
                if ($anh != "") {
                    $img = IMG_PATH_ADMIN . $anh;
                    move_uploaded_file($_FILES['anh']['name'], $img);
                } else {
                    $anh = "";
                }
                sanpham_update($ten_san_pham, $anh, $gia, $id_danhmuc, $mau_sac, $mo_ta, $size, $id_san_pham);
            }
            $sanpham = get_dssp_all(10);
            include_once 'view/sanpham/danh_sach_san_pham.php';
            break;
            // Xong sản phẩm
            // Bắt đầu khách hàng
        case 'khachhang':
            $khachhang = getadmin_user(10);
            include_once 'view/user/user.php';
            break;
        case 'deleteuser':
            if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                $id_user = $_GET['id_user'];
                user_delete($id_user);
            }
            $khachhang = getadmin_user(10);
            include_once 'view/user/user.php';
            break;
        case 'roleuser':
            if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                $id_user = $_GET['id_user'];
                useradmin_update($id_user);
            }
            $khachhang = getadmin_user(10);
            include_once 'view/user/user.php';
            break;
            // xong user
            // bắt đầu bình luận
        case 'binhluan':
            $binhluan = binhluan_select_all();
            include_once 'view/binhluan/binhluan.php';
            break;
        case 'deletebl':
            if (isset($_GET['id_binh_luan']) && ($_GET['id_binh_luan'] > 0)) {
                $id_binh_luan = $_GET['id_binh_luan'];
                binhluan_delete($id_binh_luan);
            }
            $binhluan = binhluan_select_all();
            include_once 'view/binhluan/binhluan.php';
            break;
            // xong bl
            // bắt đầu đơn hàng
        case 'donhang':
            $don_hang = getdonhang(10);
            include_once 'view/donhang/donhang.php';
            break;
            // xong đơn hàng 
            // bắt đầu thống kê
        case 'thongke':
            $thongke = thong_ke_sp_danhmuc();
            include_once 'view/thongke/thongke.php';
            break;
        case 'bieudo':
            $thongke = thong_ke_sp_danhmuc();
            include_once 'view/thongke/bieudo.php';
            break;
        case 'logout':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                unset($_SESSION['s_user']);
            }
            header('location: ../index.php');
            break;

            //chi tiet san pham 

        default:
            include_once 'view/main.php';
            break;
    }
} else {
    include_once 'view/main.php';
}
?>
<h3 style='text-align:center'>Bạn đang đăng nhập vào trang Admin: <?= $admin["username"] ?> </h3>