<?php
require_once 'pdo.php';

function binhluan_insert($iduser, $idpro, $noidung, $ngaybl)
{
    $sql = "INSERT INTO binhluan(iduser, idpro, noidung, ngaybl) VALUES (?,?,?,?)";
    var_dump($sql);
    die;
    pdo_execute($sql, $iduser, $idpro, $noidung, $ngaybl);
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

function binhluan_select_all()
{
    $sql = "SELECT * FROM binh_luan join san_pham on binh_luan.id_sp = san_pham.id_san_pham   ORDER BY id_binh_luan ASC";
    return pdo_query($sql);
}

function show_bl_admin($dsbl)
{
    $html_bl = '';
    $i = 1;
    foreach ($dsbl as $binh_luan) {
        extract($binh_luan);
        $html_bl .= '
        <tr>
                        <td>' . $i . '</td>
                        <td>' . $noi_dung . '</td>
                        <td>' . $ten_san_pham . '</td>
                        <td><a href="index.php?act=deletebl&id_binh_luan=' . $id_binh_luan . '">Xóa</a></td>
                    </tr>
        ';
        $i++;
    }
    return $html_bl;
}

function binhluan_delete($id_binh_luan)
{
    $sql = "DELETE FROM binh_luan WHERE id_binh_luan=?";
    return pdo_execute($sql, $id_binh_luan);
}

// function binhluan_select_by_id($ma_bl){
//     $sql = "SELECT * FROM binhluan WHERE ma_bl=?";
//     return pdo_query_one($sql, $ma_bl);
// }

// function binhluan_exist($ma_bl){
//     $sql = "SELECT count(*) FROM binhluan WHERE ma_bl=?";
//     return pdo_query_value($sql, $ma_bl) > 0;
// }
//-------------------------------//
// function binhluan_select_by_hang_hoa($ma_hh){
//     $sql = "SELECT b.*, h.ten_hh FROM binhluan b JOIN hang_hoa h ON h.ma_hh=b.ma_hh WHERE b.ma_hh=? ORDER BY ngay_bl DESC";
//     return pdo_query($sql, $ma_hh);
// }