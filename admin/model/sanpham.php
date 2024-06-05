<?php
require_once 'pdo.php';

// function sanpham_insert($name, $img, $price, $iddm)
// {
//     $sql = "INSERT INTO sanpham(name, img, price, iddm) VALUES (?,?,?,?)";
//     pdo_execute($sql, $name, $img, $price, $iddm);
// }

// function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ma_loai=?,dac_biet=?,so_luot_xem=?,ngay_nhap=?,mo_ta=? WHERE ma_hh=?";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
// }

// function hang_hoa_delete($ma_hh){
//     $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
//     if(is_array($ma_hh)){
//         foreach ($ma_hh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_hh);
//     }
// }

function get_dssp_new($limi)
{
    $sql = "SELECT * FROM sanpham ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}
function get_dssp_all($limi)
{
    $sql = "SELECT * FROM san_pham join danh_muc on san_pham.id_danhmuc = danh_muc.id_danh_muc ORDER BY id_san_pham ASC limit " . $limi;
    return pdo_query($sql);
}
function get_dssp_best($limi)
{
    $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}
function get_dssp_view($limi)
{
    $sql = "SELECT * FROM sanpham ORDER BY view DESC limit " . $limi;
    return pdo_query($sql);
}

function get_dssp($kyw, $iddm, $limi)
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($iddm > 0) {
        $sql .= " AND iddm=" . $iddm;
    }
    if ($kyw != "") {
        $sql .= " AND name like '%" . $kyw . "%'";
    }

    $sql .= " ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}

function get_sanphamchitiet($id_san_pham)
{
    $sql = "SELECT * FROM san_pham WHERE id_san_pham=?";
    return pdo_query_one($sql, $id_san_pham);
}

function get_dssp_lienquan($iddm, $id, $limi)
{
    $sql = "SELECT * FROM sanpham WHERE iddm=? AND id<>? ORDER BY id DESC limit " . $limi;
    return pdo_query($sql, $iddm, $id);
}

// function get_iddm($id)
// {
//     $sql = "SELECT iddm FROM sanpham WHERE id=?";
//     return pdo_query_value($sql, $id);
// }

function showsp($dssp)
{
    $html_dssp = '';
    foreach ($dssp as $san_pham) {
        extract($san_pham);
        // if ($bestseller == 1) {
        //     $best = '<div class="best"></div>';
        // } else {
        //     $best = '';
        // }
        $html_dssp .= '<div class="box25 mr15">
                            ' . $best . '
                            <a href="index.php?pg=sanphamchitiet&id=' . $id_san_pham . '">
                                <img  src="' . IMG_PATH_ADMIN . $anh . '" width="100px" alt="">
                            </a>    
                            <span class="price">' . $gia . ' đ</span>
                            <form action="index.php?pg=addcart" method="post">
                                <input type="hidden" name="idpro" value="' . $id . '">
                                <input type="hidden" name="name" value="' . $name . '">
                                <input type="hidden" name="img" value="' . $img . '">
                                <input type="hidden" name="price" value="' . $price . '">
                                <input type="hidden" name="soluong" value="1">
                                <button type="submit" name="addcart">Đặt hàng</button>
                            </form>
                            
                        </div>';
    }
    return $html_dssp;
}









///////////////////////////////////////////////
// ADMIN

function showsp_admin($dssp)
{
    $html_dssp = '';
    $i = 1;
    foreach ($dssp as $san_pham) {
        extract($san_pham);
        if ($bestseller == 1) {
            $best = "bestseller";
        } else {
            $best = '';
        }
        $html_dssp .= '<tr>
        
        <td>' . $i . '</td>
        <td>' . $ten_san_pham . '</td>
        <td>' . $gia . '</td>
        <td><img src="' . IMG_PATH_ADMIN . $anh . '" alt="' . $ten_san_pham . '" width ="100px" ></td>
        <td>' . $mo_ta . '</td>
        <td>' . $mau_sac . '</td>
        <td>' . $size . '</td>
        <td>' . $best . '</td>
        <td>' . $ten_danh_muc . '</td>
        <td><a href="index.php?act=updatesp&id_san_pham=' . $id_san_pham . '">Sửa</a></td>
        <td><a href="index.php?act=deletesp&id_san_pham=' . $id_san_pham . '">Xóa</a></td>
    </tr>';
        $i++;
    }
    return $html_dssp;
}

function sanpham_insert($ten_san_pham, $anh, $gia, $id_danhmuc, $mau_sac, $mo_ta, $size)
{
    $sql = "INSERT INTO san_pham(ten_san_pham, anh, gia, id_danhmuc,mau_sac,mo_ta,size) VALUES (?,?,?,?,?,?,?)";
    pdo_execute($sql, $ten_san_pham, $anh, $gia, $id_danhmuc, $mau_sac, $mo_ta, $size);
}

function sanpham_delete($id_san_pham)
{
    $sql = "DELETE FROM san_pham WHERE  id_san_pham=?";
    // if(is_array($ma_hh)){
    //     foreach ($ma_hh as $ma) {
    //         pdo_execute($sql, $ma);
    //     }
    // }
    // else{
    pdo_execute($sql, $id_san_pham);
    // }
}


function get_img($id_san_pham)
{
    $sql = "SELECT  anh FROM san_pham WHERE id_san_pham=?";
    $getimg =  pdo_query_one($sql, $id_san_pham);
    return $getimg['anh'];
}


function sanpham_update($ten_san_pham, $anh, $gia, $id_danhmuc, $mau_sac, $mo_ta, $size, $id_san_pham)
{
    if ($anh != "") {
        $sql = "UPDATE san_pham SET ten_san_pham=?,anh=?,gia=?,id_danhmuc=?,mau_sac=?, mo_ta=?,size=? WHERE id_san_pham=? ";
        pdo_execute($sql, $ten_san_pham, $anh, $gia, $id_danhmuc, $mau_sac, $mo_ta, $size, $id_san_pham);
    } else {
        $sql = "UPDATE san_pham SET ten_san_pham=?,gia=?,id_danhmuc=?,mau_sac=?, mo_ta=?,size=? WHERE id_san_pham=? ";
        pdo_execute($sql, $ten_san_pham, $gia, $id_danhmuc, $mau_sac, $mo_ta, $size, $id_san_pham);
    }
}





// function hang_hoa_select_by_id($ma_hh){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_one($sql, $ma_hh);
// }

// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }