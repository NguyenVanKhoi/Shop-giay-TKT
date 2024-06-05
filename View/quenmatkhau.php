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
            <h1>QUÊN MẬT KHẨU</h1>
        </head>
        <main>
            <form action="index.php?act=quenmatkhau" method="post">
                <div class="inpu">
                        <label style="font-size: 24px; font-weight: bold;" for="">Nhập Email:</label>
                        <input required style="width: 500px; height: 45px; border-radius: 10px; border: 1px solid rgb(200, 200, 200); box-shadow: 1px 3px 7px 4px #D9D9D9; padding-left: 8px; font-size: 20px; " type="email" name="email">
                    </div>
                    
                    <div class="in">
                        <input type="submit" value="Gửi" name="guiemail" >
                        <!-- <input type="submit" value="Thoát" name="thoat" > -->
                </div>
            </form>
            <a href="index.php?act=dangnhap">Thoát</a>
                <h2 class="thongbao">
                    <?php
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }   
                    ?>
                </h2> 
        </main>
    </div>
</body>

</html>