<?php
require_once 'pdo.php';

function thong_ke_sp_danhmuc()
{
    $sql = "SELECT dm.id_danh_muc, dm.ten_danh_muc,
            COUNT(*) 'so_luong',
            MIN(sp.gia) 'gia_min',
            MAX(sp.gia) 'gia_max',
            AVG(sp.gia) 'gia_avg'
            FROM danh_muc dm 
            JOIN san_pham sp ON dm.id_danh_muc = sp.id_danhmuc
            GROUP BY dm.id_danh_muc, dm.ten_danh_muc
            ORDER BY so_luong DESC
            ";
    return pdo_query($sql);
}

function show_thong_ke($dstk){
    $html_thongke = "";
    $i = 1;
    foreach ($dstk as $thong_ke ) {
        extract($thong_ke);
        $html_thongke .='
                        <tr>
                            <td>' . $i . '</td>
                            <td>' . $ten_danh_muc . '</td>
                            <td>' . $so_luong . '</td>
                            <td>' . $gia_min . '</td>
                            <td>' . $gia_max . '</td>
                            <td>' . $gia_avg . '</td>
                        </tr>
        ';
        $i++;
    }
    return $html_thongke;
}

function thong_ke_binh_luan()
{
    $sql = "SELECT hh.ma_hh, hh.ten_hh,"
        . " COUNT(*) so_luong,"
        . " MIN(bl.ngay_bl) cu_nhat,"
        . " MAX(bl.ngay_bl) moi_nhat"
        . " FROM binh_luan bl "
        . " JOIN hang_hoa hh ON hh.ma_hh=bl.ma_hh "
        . " GROUP BY hh.ma_hh, hh.ten_hh"
        . " HAVING so_luong > 0";
    return pdo_query($sql);
}
