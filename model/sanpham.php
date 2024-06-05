<?php
require_once 'pdo.php';

function sanpham_insert($name, $img, $price, $iddm)
{
    $sql = "INSERT INTO sanpham(name, img, price, iddm) VALUES (?,?,?,?)";
    pdo_execute($sql, $name, $img, $price, $iddm);
}

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
    $sql = "SELECT * FROM san_pham ORDER BY id_san_pham DESC limit " . $limi;
    return pdo_query($sql);
}
function get_dssp_best($limi)
{
    $sql = "SELECT * FROM san_pham WHERE bestseller=1 ORDER BY id_san_pham DESC limit " . $limi;
    return pdo_query($sql);
}
function get_dssp_view($limi)
{
    $sql = "SELECT * FROM sanpham ORDER BY view DESC limit " . $limi;
    return pdo_query($sql);
}

function get_dssp($iddm, $limi)
{
    $sql = "SELECT * FROM san_pham WHERE 1";
    if ($iddm > 0) {
        $sql .= " AND id_danhmuc=" . $iddm;
    }
    // if ($kyw != "") {
    //     $sql .= " AND name like '%" . $kyw . "%'";
    // }

    $sql .= " ORDER BY id_danhmuc ASC limit " . $limi;
    return pdo_query($sql);
}

function get_dssp1($kyw, $limi)
{
    $sql = "SELECT * FROM san_pham WHERE 1";
    if ($kyw != "") {
        $sql .= " AND ten_san_pham like '%" . $kyw . "%'";
    }

    $sql .= " ORDER BY id_san_pham ASC limit " . $limi;
    return pdo_query($sql);
}

function get_iddm($id)
{
    $sql = "SELECT id_danhmuc FROM san_pham WHERE id_san_pham=?";
    return pdo_query_value($sql, $id);
}
function get_dssp_lienquan($iddm, $id, $limi)
{
    $sql = "SELECT * FROM san_pham WHERE id_danhmuc= $iddm and id_san_pham<>$id  ORDER BY  id_san_pham DESC limit " . $limi;
    return pdo_query($sql);
}
function get_sanphamchitiet($id_san_pham)
{
    $sql = "SELECT * FROM san_pham WHERE id_san_pham=?";
    return pdo_query_one($sql, $id_san_pham);
}

function get_dssp_sale($limi)
{
    $sql = "SELECT * FROM san_pham WHERE sale=1 ORDER BY id_san_pham DESC limit " . $limi;
    return pdo_query($sql);
}

function showsp($dssp)
{
    $html_dssp = '';
    foreach ($dssp as $sp) {
        extract($sp);
        // if ($bestseller == 1) {
        //     $best = '<div class="best"></div>';
        // } else {
        //     $best = '';
        // }
        $html_dssp .= '
                            <section class="w13">
                                <form action="index.php?act=addToCart" method ="post">
                                <a href="index.php?act=chitietsanpham&id_san_pham=' . $id_san_pham . '"><img src="' . IMG_PATH_USER . $anh . '" alt=""></a></a>
                                <section class="block">
                                
                                    <p>' . $ten_san_pham . '</p>
                                    <h3><del>' . $gia_goc . 'đ</del>' . $gia . 'đ</h3>
                                    <div>
                                        <input " type="submit" 
                                        value ="Thêm vào giỏ hàng" name="addToCart" >
                                    </div>
                                </section>
                                    <input type="hidden" value="' . $id_san_pham . '" name="id_san_pham" >
                                    <input type="hidden" value="' . $ten_san_pham . '" name="ten_san_pham" >
                                    <input type="hidden" value="' . $gia . '" name="gia" >
                                    <input type="hidden" value="' . IMG_PATH_USER . $anh . '" name="anh" >
                                </form>
                            </section>
        ';
    }
    return $html_dssp;
}

function showspsale($dssp)
{
    $html_dsspsale = '';
    foreach ($dssp as $sp) {
        extract($sp);
        // if ($bestseller == 1) {
        //     $best = '<div class="best"></div>';
        // } else {
        //     $best = '';
        // }
        $html_dsspsale .= '
        <section class="w13">
        <form action="index.php?act=addToCart" method ="post">
        <a href="index.php?act=chitietsanpham&id_san_pham=' . $id_san_pham . '"><img src="' . IMG_PATH_USER . $anh . '" alt=""></a></a>
        <section class="block">
        
            <p>' . $ten_san_pham . '</p>
            <h3><del>' . $gia_goc . 'đ</del>' . $gia . 'đ</h3>
            <div>
            <input style="width: 150px; height: 30px; border-radius: 10px; border: 1px solid red; background: red; color: aliceblue; margin-top: 10px; " type="submit" value ="Thêm vào giỏ hàng" name="addToCart" >
        </div>
        </section>
            <input type="hidden" value="' . $id_san_pham . '" name="id_san_pham" >
            <input type="hidden" value="' . $ten_san_pham . '" name="ten_san_pham" >
            <input type="hidden" value="' . $gia . '" name="gia" >
            <input type="hidden" value="' . IMG_PATH_USER . $anh . '" name="anh" >
        </form>
    </section>
        ';
    }
    return $html_dsspsale;
}
function showsplq($dssp)
{
    $html_dssplq = '';
    foreach ($dssp as $sp) {
        extract($sp);
        // if ($bestseller == 1) {
        //     $best = '<div class="best"></div>';
        // } else {
        //     $best = '';
        // }
        $html_dssplq .= '
        <section class="w13">
            <form action="index.php?act=addToCart" method ="post">
            <a href="index.php?act=chitietsanpham&id_san_pham=' . $id_san_pham . '"><img src="' . IMG_PATH_USER . $anh . '" alt=""></a></a>
            <section class="block">
            
                <p>' . $ten_san_pham . '</p>
                <h3><del>' . $gia_goc . 'đ</del>' . $gia . 'đ</h3>
                <div>
                <input style="width: 150px; height: 30px; border-radius: 10px; border: 1px solid red; background: red; color: aliceblue; margin-top: 10px; " type="submit" value ="Thêm vào giỏ hàng" name="addToCart" >
            </div>
            </section>
                <input type="hidden" value="' . $id_san_pham . '" name="id_san_pham" >
                <input type="hidden" value="' . $ten_san_pham . '" name="ten_san_pham" >
                <input type="hidden" value="' . $gia . '" name="gia" >
                <input type="hidden" value="' . IMG_PATH_USER . $anh . '" name="anh" >
            </form>
        </section>
        ';
    }
    return $html_dssplq;
}
function showsp1($dssp)
{
    $html_dssp = '';
    foreach ($dssp as $sp) {
        extract($sp);
        // if ($bestseller == 1) {
        //     $best = '<div class="best"></div>';
        // } else {
        //     $best = '';
        // }
        $html_dssp .= '
        <section class="w13">
        <form action="index.php?act=addToCart" method ="post">
        <a href="index.php?act=chitietsanpham&id_san_pham=' . $id_san_pham . '"><img src="' . IMG_PATH_USER . $anh . '" alt=""></a></a>
        <section class="block">
        
            <p>' . $ten_san_pham . '</p>
            <h3><del>' . $gia_goc . 'đ</del>' . $gia . 'đ</h3>
            <div>
            <input style="width: 150px; height: 30px; border-radius: 10px; border: 1px solid red; background: red; color: aliceblue; margin-top: 10px; " type="submit" value ="Thêm vào giỏ hàng" name="addToCart" >
        </div>
        </section>
            <input type="hidden" value="' . $id_san_pham . '" name="id_san_pham" >
            <input type="hidden" value="' . $ten_san_pham . '" name="ten_san_pham" >
            <input type="hidden" value="' . $gia . '" name="gia" >
            <input type="hidden" value="' . IMG_PATH_USER . $anh . '" name="anh" >
        </form>
    </section>
        ';
    }
    return $html_dssp;
}

function showspbest($dssp)
{
    $html_spbest = '';
    foreach ($dssp as $sp) {
        extract($sp);
        if ($bestseller == 1) {
            $html_spbest .= '
            <section class="w13">
            <form action="index.php?act=addToCart" method ="post">
            <a href="index.php?act=chitietsanpham&id_san_pham=' . $id_san_pham . '"><img src="' . IMG_PATH_USER . $anh . '" alt=""></a></a>
            <section class="block">
            
                <p>' . $ten_san_pham . '</p>
                <h3><del>' . $gia_goc . 'đ</del>' . $gia . 'đ</h3>
                <div>
                <input style="width: 150px; height: 30px; border-radius: 10px; border: 1px solid red; background: red; color: aliceblue; margin-top: 10px; " type="submit" value ="Thêm vào giỏ hàng" name="addToCart" >
            </div>
            </section>
                <input type="hidden" value="' . $id_san_pham . '" name="id_san_pham" >
                <input type="hidden" value="' . $ten_san_pham . '" name="ten_san_pham" >
                <input type="hidden" value="' . $gia . '" name="gia" >
                <input type="hidden" value="' . IMG_PATH_USER . $anh . '" name="anh" >
            </form>
        </section>  
        ';
        }
    }
    return $html_spbest;
}









///////////////////////////////////////////////
// ADMIN

function showsp_admin($dssp)
{
    $html_dssp = '';
    $i = 1;
    foreach ($dssp as $sp) {
        extract($sp);
        if ($bestseller == 1) {
            $best = '<div class="best"></div>';
        } else {
            $best = '';
        }
        $html_dssp .= '<tr>
                    <td>' . $i . '</td>
                    <td><img src="' . IMG_PATH_ADMIN . $img . '"alt="' . $name . '" width="80px" alt=""></td>
                    <td>' . $name . '</td>
                    <td>' . $price . '</td>
                    <td>' . $view . '</td>
                    <td>
                    <a href="index.php?pg=sanphamupdate&id=' . $id . '" class="btn btn-warning"
                        ><i class="fa-solid fa-pen-to-square"></i> Sửa</a
                    >
                    <a href="index.php?pg=delproduct&id=' . $id . '" class="btn btn-danger"
                        ><i class="fa-solid fa-trash"></i> Xóa</a
                    >
                    </td>
                </tr>';
        $i++;
    }
    return $html_dssp;
}



function sanpham_delete($id)
{
    $sql = "DELETE FROM sanpham WHERE  id=?";
    // if(is_array($ma_hh)){
    //     foreach ($ma_hh as $ma) {
    //         pdo_execute($sql, $ma);
    //     }
    // }
    // else{
    pdo_execute($sql, $id);
    // }
}


function get_img($id)
{
    $sql = "SELECT  img FROM sanpham WHERE id=?";
    $getimg =  pdo_query_one($sql, $id);
    return $getimg['img'];
}


function sanpham_update($name, $img, $price, $iddm, $id)
{
    if ($img != "") {
        $sql = "UPDATE sanpham SET name=?,img=?,price=?,iddm=? WHERE id=? ";
        pdo_execute($sql, $name, $img, $price, $iddm, $id);
    } else {
        $sql = "UPDATE sanpham SET name=?,price=?,iddm=? WHERE id=? ";
        pdo_execute($sql, $name, $price, $iddm, $id);
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
// function load_spone($id_san_pham)
// {
//     $sql = "SELECT * from san_pham where id_san_pham =". $id_san_pham;
//     $onesp = pdo_query_one($sql);
//     return $onesp;
// }