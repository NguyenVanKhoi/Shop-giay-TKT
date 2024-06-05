<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
      extract($_SESSION['s_user']);
      $userinfo=get_user($id);
      $_SESSION['s_user']=$userinfo;
      extract($userinfo);
    }
?>

    <div class="tong">

        <head>
            <h1>Đăng Ký</h1>
        </head>
        <main>
            <form action="" method="post">
                <div class="inp">
                    <label for="">Họ và Tên:</label>
                    <input type="text" name="username" id="">
                </div>
                <div class="inp">
                    <label for="">Số điện thoại:</label>
                    <input type="text" name="phone" id="">
                </div>
                <div class="inp">
                    <label for="">Địa chỉ:</label>
                    <input type="text" name="dia_chi" id="">
                </div>
                <div class="inp">
                    <label for="">Mật khẩu:</label>
                    <input type="text" name="password" id="">
                </div>
                <div class="inp">
                    <label for="">Nhập lại mật khẩu:</label>
                    <input type="text" name="repassword" id="">
                </div>
                <button type="submit">Đăng kí ngay</button>
            </form>
        </main>
    </div>