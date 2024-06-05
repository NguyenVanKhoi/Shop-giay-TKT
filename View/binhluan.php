<?php
session_start();
include "../model/pdo.php";
include "../model/binhluan.php";

// if(isset($_GET['id_sp'])) {

//     $id_sp = $_GET['id_san_pham'];
// }
if (isset($_POST['guibinhluan'])) {

    $id_sp = $_POST['id_sp'];
    $noidung = $_POST['noi_dung'];
    $iduser = $_SESSION['s_user']['id_user'];
    $ngaybl = date('Y-m-d');
    
    binhluan_insert($iduser, $id_sp, $noidung, $ngaybl);
}

$id = isset($_GET['id_san_pham']) ? $_GET['id_san_pham'] : $_POST['id_sp'];
$dsbl = binhluan_select_all($id);

$html_bl = "";
foreach ($dsbl as $bl) {
    extract($bl);
    $html_bl .= '<p>' . $noi_dung . '<br>' . $username . ' - (' . $ngay_binh_luan . ')</p>';
}

?>
<style>
    h1 {
        margin-top: 15px;
        margin-left: 120px;
    }

    form {
        justify-content: center;
        margin-left: 300px;
    }

    form textarea {
        padding: 10px;
        font-size: 20px;
        width: 700px;
        margin-left: 150px;
    }

    form button {
        width: 150px;
        height: 40px;
        font-size: 18px;
        font-weight: bold;
        margin-left: 20px;
        border-radius: 10px;
        border: 0.5px solid black;
    }
</style>
<h1>BÌNH LUẬN</h1>
<?php if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) { ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="wa1">
            <input type="hidden" required="required" name="id_sp" value="<?php echo $id ?>">
        </div>
        <textarea required="required" name="noi_dung" id="" cols="100%" rows="5"></textarea>
        <br><br>
        <button type="submit" name="guibinhluan">Gửi bình luận</button>
    </form>
<?php
} else {
    $_SESSION['trang'] = "chitietsanpham";
    $_SESSION['idsp'] = $_GET['id_san_pham'];
    echo "<a href='../index.php?act=dangnhap' target='_parent'>Bạn phải đăng nhập thì mới bình luận được</a>";
}
?>
<div class="dsbl">
    <?= $html_bl ?>

</div>