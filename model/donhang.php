<?php

function taodonhang($madh,$tongdonhang, $ho_ten, $phone, $email, $dia_chi, $pttt)
{
    $sql = "INSERT INTO don_hang(ma_dh,tongdonhang,ho_ten,phone,email,dia_chi,pttt) VALUES
    ('".$madh."','" . $tongdonhang . "','" . $ho_ten . "','" . $phone . "','" . $email . "', '" . $dia_chi . "','" . $pttt . "')";
    return pdo_execute_id($sql);
}

function addtocart($iddh, $idpro, $tensp, $img, $dongia, $soluong)
{
    $sql = "INSERT INTO gio_hang(idoder, idpro,tensp, img, dongia,soluong) 
    VALUES ('" . $iddh . "','" . $idpro . "','" . $tensp . "','" . $dongia . "','" . $img . "','" . $soluong . "')";
    return pdo_execute($sql);
}

function showcart($iddh)
{
    $sql = "SELECT * from gio_hang where idoder=" . $iddh;
    return pdo_query($sql);
}
function showorder($iddh)
{
    $sql = "SELECT * from don_hang where id_don_hang=" . $iddh;
    return pdo_query($sql);
}

// ADMIN 
// show ds don hang 

function getdonhang($limit)
{
    $sql = "SELECT * FROM bill order by id desc limit " . $limit;
    return pdo_query($sql);
}

function showdonhang($dsdh)
{
    $html_dh = '';
    foreach ($dsdh as $ds) {
        extract($ds);
        $html_dh .= '
        <tr>
        <td>' . $madh . '</td>
        <td>' . $nguoidat_ten . '</td>
        <td>' . $nguoidat_email . '</td>
        <td>' . $nguoidat_tel . '</td>
        <td>' . $nguoidat_diachi . '</td>
        <td>' . $tongthanhtoan . '</td>
    </tr>
        ';
    }
    return $html_dh;
}
