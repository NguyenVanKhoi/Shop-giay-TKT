<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/dangnhap.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
    </style>
</head>

<body>
    <div class="tong">

        <header>
            <h1>Đăng nhập</h1>
            <a href="index.php?act=dangky">Tạo tài khoản ngay</a>
            <?php
                if(isset($_SESSION['tb_dangnhap'])&&($_SESSION['tb_dangnhap']!="")){
                    echo $_SESSION['tb_dangnhap'];
                    unset($_SESSION['tb_dangnhap']);
                 } 
            ?>
        </header>
        <main>
            <form action="index.php?act=login" method="post">
                <div class="input">
                    <label for="">Username:</label>
                    <div class="input1"><input style="padding-left: 10px; font-size: 18px;" type="text" name="username" id=""></div>
                </div>
                <div class="input">
                    <label for="">Mật khẩu:</label>
                    <div class="input2" ><input style="padding-left: 10px; font-size: 20px;" type="password" name="password" id=""><br></div>

                </div>
                <a href="index.php?act=quenmatkhau">Bạn quên mật khẩu?</a>
                <br>
                <button type="submit" name="dangnhap" value="submit" >Đăng nhập</button>
            </form>
        </main>
    </div>
</body>

</html>