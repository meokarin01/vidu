<?php
    session_start();
    include 'config.php';
    if( isset($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != '' && $_POST["repassword"] != '' ) {
        //Thực hiện xử lý khi người dùng nhấn nít submit và điền đầy đủ thông tin
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $level = 0;
        if( $password != $repassword ) {
            $_SESSION["thongbao"] = "Password nhap lai khong chinh xac";
            header("location:register.php");
            die();
        }
        $sql = "SELECT * FROM user WHERE username='$username' ";
        $old = mysqli_query($conn,$sql);
        $password = md5($password);
        if( mysqli_num_rows($old) > 0 ) {
            $_SESSION["thongbao"] = "Username da ton tai";
            header("location:register.php");
            die();
        }
        $sql = "INSERT INTO user (username,password,level) VALUES ('$username','$password','$level') ";
        mysqli_query($conn,$sql);
        $_SESSION["thongbao"] = "Da dang ky thanh cong";
        header('location:login.php');
    }else {
        $_SESSION["thongbao"] = "Vui long nhap day du thong tin";
        header("location:register.php");
    }
?>