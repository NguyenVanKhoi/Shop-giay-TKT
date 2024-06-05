<?php
require_once 'pdo.php';

// /**
//  * Thêm loại mới
//  * @param String $ten_danhmuc là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
// function danhmuc_insert($ten_danhmuc){
//     $sql = "INSERT INTO danhmuc(ten_danhmuc) VALUES(?)";
//     pdo_execute($sql, $ten_danhmuc);
// }
// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $ten_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
// function danhmuc_update($ma_danhmuc, $ten_danhmuc){
//     $sql = "UPDATE danhmuc SET ten_danhmuc=? WHERE ma_danhmuc=?";
//     pdo_execute($sql, $ten_danhmuc, $ma_danhmuc);
// }
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
// function danhmuc_delete($ma_danhmuc){
//     $sql = "DELETE FROM danhmuc WHERE ma_danhmuc=?";
//     if(is_array($ma_danhmuc)){
//         foreach ($ma_danhmuc as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_danhmuc);
//     }
// }
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_all()
{
    $sql = "SELECT * FROM danh_muc ORDER BY id_danh_muc ASC";
    return pdo_query($sql);
}


function showdm($dsdm)
{
    $html_dm = '';
    foreach ($dsdm as $dm) {
        extract($dm);
        $link = 'index.php?pg=sanpham&iddm=' . $id;
        $html_dm .= '<a href="' . $link . '">' . $name . '</a>';
    }
    return $html_dm;
}

function get_name_dm($id_danh_muc)
{
    $sql = "SELECT ten_danh_muc FROM danh_muc WHERE id_danh_muc=" . $id_danh_muc;
    $kq = pdo_query_one($sql);
    return $kq["ten_danh_muc"];
}


////////////////////////////////////////////////////////////
// ADMIN

function showdm_admin($dsdm, $id_danhmuc)
{
    $html_dm = '';
    foreach ($dsdm as $danh_muc) {
        extract($danh_muc);
        if ($id_danhmuc === $id_danh_muc) {
            $s = "selected";
        } else {
            $s = "";
        }
        $html_dm .= '<option value="' . $id_danh_muc . '" ' . $s . '  >' . $ten_danh_muc . '</option>';
    }
    return $html_dm;
}

function showdm_admin1($dsdm)
{
    $html_dm = '';
    foreach ($dsdm as $danh_muc) {
        extract($danh_muc);

        // $link = 'index.php?pg=sanpham&id_danh_muc=' . $id_danh_muc;
        $html_dm .= '<option value="' . $id_danh_muc . '"  >' . $ten_danh_muc . '</option>';
    }
    return $html_dm;
}


function show_dm_admin($dsdm)
{
    $html_dm = '';
    $i = 1;
    foreach ($dsdm as $danh_muc) {
        extract($danh_muc);
        $html_dm .= '
        <tr>
                    
                        <td>' . $i . '</td>
                        <td>' . $ten_danh_muc . '</td>
                        <td><a href="index.php?act=dmsua&&id_danh_muc=' . $id_danh_muc . '">Sửa</a></td>
                        <td><a href="index.php?act=xoadm&&id_danh_muc=' . $id_danh_muc . '">Xóa</a></td>
                    </tr>
        ';
        $i++;
    }
    return $html_dm;
}

function danhmuc_sanpham_all()
{
    $sql = "SELECT * FROM danh_muc join san_pham on danh_muc.ten_danh_muc = san_pham.id_danhmuc ORDER BY id_danh_muc ASC";
    return pdo_query($sql);
}

function danhmuc_insert($ten_danh_muc)
{
    $sql = "INSERT INTO danh_muc(ten_danh_muc) VALUE (?) ";
    pdo_execute($sql, $ten_danh_muc);
}


function danhmuc_delete($id_danh_muc)
{
    $sql = "DELETE FROM danh_muc WHERE id_danh_muc=? ";
    pdo_execute($sql, $id_danh_muc);
}
function danhmuc_update($ten_danhmuc, $id_danh_muc)
{
    $sql = "UPDATE danh_muc SET ten_danh_muc=? WHERE id_danh_muc=?";
    pdo_execute($sql, $ten_danhmuc, $id_danh_muc);
}

// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_danhmuc là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_select_by_id($ma_danhmuc){
//     $sql = "SELECT * FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_one($sql, $ma_danhmuc);
// }
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_danhmuc là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_exist($ma_danhmuc){
//     $sql = "SELECT count(*) FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_value($sql, $ma_danhmuc) > 0;
// }