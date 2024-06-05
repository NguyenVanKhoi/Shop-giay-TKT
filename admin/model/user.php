<?php
require_once 'pdo.php';

function user_insert($username, $password, $email)
{
    $sql = "INSERT INTO user(username, password, email) VALUES (?, ?, ?)";
    pdo_execute($sql, $username, $password, $email);
}

function user_insert_id($username, $password, $ten, $diachi, $email, $dienthoai)
{
    $sql = "INSERT INTO user(username, password, ten,diachi, email, dienthoai) VALUES (?, ?, ?,?, ?, ?)";
    return pdo_execute_id($sql, $username, $password, $ten, $diachi, $email, $dienthoai);
}

function user_update($username, $password, $email, $diachi, $dienthoai, $role, $id)
{
    $sql = "UPDATE user SET username=?,password=?,email=?,diachi=?,dienthoai=?,role=? WHERE id=?";
    pdo_execute($sql, $username, $password, $email, $diachi, $dienthoai, $role, $id);
}

function checkuser($username, $password)
{
    $kq =  $sql = "SELECT * from user where username=? and password=?";
    return pdo_query_one($sql, $username, $password);
    // if(is_array($kq)&&(count($kq))){
    //     return $kq["id"];
    // }else{
    //     return 0;
    // }
}
function get_user($id)
{
    $sql = "Select * from user where id=? ";
    return pdo_query_one($sql, $id);
}




function get_user_tv($limit)
{
    $sql = "SELECT * FROM user ORDER BY id DESC limit " . $limit;
    return pdo_query($sql);
}





function showuser($user)
{
    $html_user = '';
    $i = 1;
    foreach ($user as $u) {
        extract($u);
        if ($vai_tro == 1) {
            $role = "Admin";
        }
        else {
            $role = "User";
        }
        $html_user .= '
        <tr>
        <td>' . $i . '</td>
        <td>' . $username . '</td>
        <td>' . $role . '</td>
        <td><a href="index.php?act=roleuser&id_user='.$id_user.'">Cấp quyền admin</a></td>
        <td><a href="index.php?act=deleteuser&id_user='.$id_user.'">Xóa</a></td>
    </tr>
    ';
        $i++;
    }
    return $html_user;
}

function getadmin_user($limit)
{
    $sql = "SELECT * from user ORDER BY id_user  ASC limit  " . $limit;
    return pdo_query($sql);
}

function useradmin_update( $id_user)
{
    $sql = "UPDATE user SET vai_tro=1 WHERE id_user=?";
    pdo_execute($sql, $id_user);
}

function user_delete($id)
{
    $sql = "DELETE FROM user WHERE  id_user=?";

    pdo_execute($sql, $id);
}

// function get_user($limi){
//     $sql = "SELECT * FROM sanpham ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }

// function user_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
//     $sql = "UPDATE user SET mat_khau=?,ho_ten=?,email=?,hinh=?,kich_hoat=?,vai_tro=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat==1, $vai_tro==1, $ma_kh);
// }

// function user_delete($ma_kh){
//     $sql = "DELETE FROM user  WHERE ma_kh=?";
//     if(is_array($ma_kh)){
//         foreach ($ma_kh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_kh);
//     }
// }

// function user_select_all(){
//     $sql = "SELECT * FROM user";
//     return pdo_query($sql);
// }

// function user_select_by_id($ma_kh){
//     $sql = "SELECT * FROM user WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function user_exist($ma_kh){
//     $sql = "SELECT count(*) FROM user WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function user_select_by_role($vai_tro){
//     $sql = "SELECT * FROM user WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function user_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE user SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }