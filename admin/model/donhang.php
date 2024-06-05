<?php

function bill_insert_id($madh, $iduser, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_tel, $total, $ship, $voucher, $tongthanhtoan, $pttt)
{
    $sql = "INSERT INTO bill(madh,iduser, nguoidat_ten,nguoidat_email, nguoidat_tel, nguoidat_diachi,nguoinhan_ten,nguoinhan_diachi,nguoinhan_tel,total,ship,voucher,tongthanhtoan,pttt) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    return pdo_execute_id($sql, $madh, $iduser, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_tel, $total, $ship, $voucher, $tongthanhtoan, $pttt);
}



// ADMIN 
// show ds don hang 

function getdonhang($limit)
{
    $sql = "SELECT * FROM don_hang 
    order by id_don_hang desc limit " . $limit;
    return pdo_query($sql);
}

function showdonhang($dsdh)
{
    $html_dh = '';
    $i = 1;
    foreach ($dsdh as $ds) {
        extract($ds);
        if ($trang_thai_don_hang == 0 ) {
            $trang_thai = "đang vận chuyển";
        }
        else {
            $trang_thai = "đã vận chuyển";
        }
        $html_dh .= '
        <tr>
                        <td>'.$i.'</td>
                        <td>'.$ho_ten.'</td>
                        <td>'.$ma_dh.'</td>
                        <td>'.$email.'</td>
                        <td>'.$phone.'</td>
                        <td>'.$dia_chi.'</td>
                        <td>'.$trang_thai.'</td>
                    </tr>
        ';
        $i++;
    }
    return $html_dh;
}
