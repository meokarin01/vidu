<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dang nhap</title>
</head>
<body>
    <h3>Dang nhap</h3>
    <p>
        <?php
            if( isset($_SESSION["thongbao"]) ) {
                echo $_SESSION["thongbao"];
                session_unset("thongbao");
            }
        ?>
    </p>
    <form action="login_submit.php" method="POST">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>password: </td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="submit">Login</button>
                    <button type="reset">Reset</button>
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>