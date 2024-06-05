

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dangky.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
    </style>

    <title>Document</title>
</head>

<body>
    <div class="tong">

        <head>
            <h1>Đăng Ký</h1>
        </head>
        <main>
            <form action="index.php?act=adduser" method="post">
                <div class="inp">
                    <label for="">Username:</label>
                    <input type="text" name="username">
                    <?php echo !empty($thongbao['username']['required']) ? $thongbao['username']['required'] : ''; ?>
                </div>
                <div class="inp">
                    <label for="">Password:</label>
                    <input type="password"  name="password" required="required">
                </div>
                <div class="inp">
                    <label for="">Họ và Tên:</label>
                    <input type="text" name="hoten"  required="required">
                </div>
                <div class="inp">
                    <label for="">Email:</label>
                    <input type="mail" name="email"  required="required">
                </div>
                <div class="inp">
                    <label for="">Phone:</label>
                    <input type="text" name="phone"  required="required">
                </div>
                <div class="inp">
                    <label for="">Địa chỉ:</label>
                    <input type="text" name="dia_chi"  required="required">
                </div>
                <button type="submit" name="dangky" value="dangky">Đăng kí ngay</button>
            </form>
        
        </main>
    </div>
</body>

</html>