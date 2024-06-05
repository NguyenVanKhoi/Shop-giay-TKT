<?php
session_start();
ob_start();

if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];

include_once 'model/binhluan.php';
include_once 'model/danhmuc.php';
include_once 'model/donhang.php';
include_once 'model/giohang.php';
include_once 'model/gobal.php';
include_once 'model/pdo.php';
include_once 'model/sanpham.php';
include_once 'model/thong-ke.php';
include_once 'model/user.php';


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            // tim kiem
        case 'timkiem':
            $kyw = "";
            $titlepage = "";

            if (isset($_POST['timkiem'])) {
                $kyw = $_POST['kyw'];
                $titlepage = "kết quả tìm kiếm với từ khóa <span>" . $kyw . "</span>";
            }
            $sp =  get_dssp1($kyw, 20); //lay danh sach san pham theo tu khoa 
            include_once 'View/timkiem.php';
            break;

        case 'danhmuc':
            if (isset($_GET['id_danh_muc']) && ($_GET['id_danh_muc'] > 0)) {
                $id_danhmuc = $_GET['id_danh_muc'];
            }
            $sanpham = get_dssp($id_danhmuc, 9);
            include_once 'View/danhmuc.php';
            break;
        case 'sale':
            include_once 'View/sale.php';
            break;
            // tai khoan
        case 'login':
            // input
            if (isset($_POST["dangnhap"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];

                //xl: kiem tra
                $kq = checkuser($username, $password);
                if (isset($kq) && (is_array($kq)) && (count($kq) > 0)) {
                    extract($kq);
                    if ($vai_tro == 1) {
                        $_SESSION['s_user'] = $kq;
                        header('location: admin/index.php?act=trangchu');
                    } else {
                        $_SESSION['s_user'] = $kq;
                        header('location: index.php');
                    }
                } else {

                    $tb = "Tài khoản không tồn tại hoặc thông tin đăng nhập sai! ";
                    $_SESSION['tb_dangnhap'] = $tb;
                    header('location: index.php?act=dangnhap');
                }

                //out

            }
            break;

            //is_array ktra cái biến nào đó xem cùng 1 mảng hay k
        case 'quenmatkhau':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['password'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include 'View/quenmatkhau.php';
            break;

        case 'dangnhap':
            include 'View/dangnhap.php';
            break;
        case 'dangky':
            include 'View/dangky.php';
            break;


        case 'adduser':
            if (isset($_POST["dangky"]) && ($_POST["dangky"]) != '') {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $hoten = $_POST["hoten"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $diachi = $_POST["dia_chi"];

                user_insert($username, $password, $hoten, $email, $phone, $diachi);
            }
            include "View/dangnhap.php";

            break;

        case 'dangxuat':
            dangxuat();
            include "View/main.php";
            break;

        case 'logout':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                unset($_SESSION['s_user']);
            }
            header('location: index.php');
            break;

            //chi tiet san pham 

        case 'chitietsanpham':

            if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {

                $id = $_GET['id_san_pham'];
                $sql = "select * from san_pham where id_san_pham = $id";
                $result = pdo_query_one($sql);
                // $id_san_pham = $_GET['id_san_pham'];
                $iddm = get_iddm($id);
                $sanphamlq = get_dssp_lienquan($iddm, $id, 5);
                include "View/chitietsanpham.php";
            }
            break;
            // xong chi tiết sản phẩm
            // add to cart
        case 'giohang':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                include_once 'View/giohang.php';
            } else {
                header('location: index.php?act=dangnhap');
            }
            break;
        case 'addToCart':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                if (isset($_POST['addToCart']) && ($_POST['addToCart'])) {
                    $id_san_pham = $_POST['id_san_pham'];
                    $ten_san_pham = $_POST['ten_san_pham'];
                    $gia = $_POST['gia'];
                    $anh = $_POST['anh'];
                    if ((isset($_POST['sl'])) && ($_POST['sl'] > 0)) {
                        $sl = $_POST['sl'];
                    } else {
                        $sl = 1;
                    }
                    $fg = 0;
                    $a = 0;
                    foreach ($_SESSION['giohang'] as $item) {
                        if ($item[1] == $ten_san_pham) {
                            $_SESSION['giohang'][$a][4] += $sl;
                            $fg = 1;
                            break;
                        }
                        $a++;
                    }


                    if ($fg == 0) {
                        $item = array($id_san_pham, $ten_san_pham, $gia, $anh, $sl);
                        $_SESSION['giohang'][] = $item;
                    }


                    header('location: index.php?act=giohang');
                }
            } else {
                header('location: index.php?act=dangnhap');
            }

            include_once 'View/giohang.php';
            break;
            // dell cart
        case 'delcart':
            if (isset($_GET['i']) && ($_GET['i'] > 0)) {
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0))
                    array_splice($_SESSION['giohang'], $_GET['i'], 1);
            } else {
                if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            }

            if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                header('location: index.php?act=giohang');
            } else {
                header('location: index.php');
            }
            break;
            // xong btnCart
        case 'thanhtoan':
            if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])) {
                $tongdonhang = $_POST['tongdonhang'];
                $ho_ten = $_POST['ho_ten'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $pttt = $_POST['pttt'];
                $madh = "TKT" . rand(0, 999999999);
                // $item = array($id_san_pham, $ten_san_pham, $gia, $anh, $sl);
                $iddh = taodonhang($madh, $tongdonhang, $ho_ten, $phone, $email, $dia_chi, $pttt);
                $_SESSION['iddh'] = $iddh;
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                    foreach ($_SESSION['giohang'] as $item) {
                        addtocart($iddh, $item[0], $item[1], $item[2], $item[3], $item[4]);
                    }
                    unset($_SESSION['giohang']);
                }
            }
            if (isset($_POST['redirect'])) {
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost/duan1/index.php?act=dathangthanhcong";
                $vnp_TmnCode = "P7HHZIRC"; //Mã website tại VNPAY 
                $vnp_HashSecret = "KUZYVUJZWCGOZZJTKMXXYILHLQDBCNTE"; //Chuỗi bí mật

                $vnp_TxnRef = rand(00, 99999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = 'Nội dung thanh toán';
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = $_POST['tongdonhang'] * 1000;
                $vnp_Locale = 'vn';
                $vnp_BankCode = 'NCB';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                //Add Params of 2.0.1 Version
                // $vnp_ExpireDate = $_POST['txtexpire'];
                //Billing
                // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
                // $vnp_Bill_Email = $_POST['txt_billing_email'];
                // $fullName = trim($_POST['txt_billing_fullname']);
                // if (isset($fullName) && trim($fullName) != '') {
                //     $name = explode(' ', $fullName);
                //     $vnp_Bill_FirstName = array_shift($name);
                //     $vnp_Bill_LastName = array_pop($name);
                // }
                // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
                // $vnp_Bill_City = $_POST['txt_bill_city'];
                // $vnp_Bill_Country = $_POST['txt_bill_country'];
                // $vnp_Bill_State = $_POST['txt_bill_state'];
                // // Invoice
                // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
                // $vnp_Inv_Email = $_POST['txt_inv_email'];
                // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
                // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
                // $vnp_Inv_Company = $_POST['txt_inv_company'];
                // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
                // $vnp_Inv_Type = $_POST['cbo_inv_type'];
                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,

                    // "vnp_ExpireDate" => $vnp_ExpireDate,
                    // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
                    // "vnp_Bill_Email" => $vnp_Bill_Email,
                    // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
                    // "vnp_Bill_LastName" => $vnp_Bill_LastName,
                    // "vnp_Bill_Address" => $vnp_Bill_Address,
                    // "vnp_Bill_City" => $vnp_Bill_City,
                    // "vnp_Bill_Country" => $vnp_Bill_Country,
                    // "vnp_Inv_Phone" => $vnp_Inv_Phone,
                    // "vnp_Inv_Email" => $vnp_Inv_Email,
                    // "vnp_Inv_Customer" => $vnp_Inv_Customer,
                    // "vnp_Inv_Address" => $vnp_Inv_Address,
                    // "vnp_Inv_Company" => $vnp_Inv_Company,
                    // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
                    // "vnp_Inv_Type" => $vnp_Inv_Type
                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                }

                //var_dump($inputData);
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array(
                    'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                );
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
            }
            include_once 'View/donhang.php';
            break;
        case 'dathangthanhcong': {
                include_once 'View/dathangthanhcong.php';
                break;
            }
        default:
            include_once 'View/main.php';
            break;
    }
} else {
    include_once 'View/main.php';
}
