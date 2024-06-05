<?php
require_once 'pdo.php';

function loadall_binhluan($id_san_pham)
{
    $sql = "
            SELECT * FROM binh_luan 
            JOIN user ON binh_luan.id_user = user.id_user
            JOIN san_pham ON binh_luan.id_sp = san_pham.id_san_pham
            WHERE san_pham.id_sp = $id_san_pham
            order by id
        ";
    $result =  pdo_query($sql);
    return $result;
}

function binhluan_insert($iduser, $id_sp, $noidung, $ngaybl){
    $sql = "INSERT INTO binh_luan(id_user, id_sp, noi_dung, ngay_binh_luan) VALUES ('$iduser', '$id_sp','$noidung','$ngaybl')";
    pdo_execute($sql);
}

function loadal_binhluan($id_san_pham)
{
    $sql = "select * from binh_luan where 1";
    if ($id_san_pham > 0) $sql .= " AND $id_san_pham=.'" . $id_san_pham . "'";
    $sql .= " order by id desc";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
// function binhluan_update($ma_bl, $ma_kh, $ma_hh, $noi_dung, $ngay_bl){
//     $sql = "UPDATE binhluan SET ma_kh=?,ma_hh=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
//     pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);
// }

// function binhluan_delete($ma_bl){
//     $sql = "DELETE FROM binhluan WHERE ma_bl=?";
//     if(is_array($ma_bl)){
//         foreach ($ma_bl as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_bl);
//     }
// }

function binhluan_select_all($id){
    $sql = "SELECT * FROM binh_luan
    join san_pham on binh_luan.id_sp = san_pham.id_san_pham
    join user on binh_luan.id_user = user.id_user
    where binh_luan.id_sp = $id
    ORDER BY id_binh_luan DESC";
    return pdo_query($sql);
}

// function binhluan_select_by_id($ma_bl){
//     $sql = "SELECT * FROM binh_luan WHERE ma_bl=?";
//     return pdo_query_one($sql, $ma_bl);
// }

// function binhluan_exist($ma_bl){
//     $sql = "SELECT count(*) FROM binhluan WHERE ma_bl=?";
//     return pdo_query_value($sql, $ma_bl) > 0;
// }
//-------------------------------//
// function binhluan_select_by_hang_hoa($ma_hh){
//     $sql = "SELECT b.*, h.ten_hh FROM binh_luan b JOIN hang_hoa h ON h.ma_hh=b.ma_hh WHERE b.ma_hh=? ORDER BY ngay_bl DESC";
//     return pdo_query($sql, $ma_hh);
// }