<?php
    session_start();
    if(isset($_SESSION['id_user'])){
        header('Location: profile.php');
    }
    require_once("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./libs/style.css">
</head>
<body class="bg-green">
    <?php        
        if(isset($_POST['email'])  && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];           
            
            $email = strip_tags(mysqli_real_escape_string(OPEN_DB(), $email));
            $password = strip_tags(mysqli_real_escape_string(OPEN_DB(), $password));

            $result = Login($email, $password);
            if($result['code'] == 0){
                $data = $result['data'];
                $_SESSION['id_user'] = $data['id_user'];
                header('Location: trang-chu.php');
                exit();
            }
            else{
                echo '<script>alert("'.$result['error'].'")</script>';
            }            
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="form-panel mar-t-75 pad-25 mx-auto">
                <form class="login-form" action="login.php" method="POST">
                    <!-- form title -->
                    <span class="form-title pad-b-25">Đăng nhập</span>
                    <!-- username input -->
                    <div class="input-frame mar-b-25 fas">
                        <label class="input-label" for="email">Email</label>
                        <input class="input-box pad-r-5 pad-l-45" type="text" name="email" id="email" placeholder="Email">
                        <span class="input-symbol" data-symbol="&#xf007;"></span>
                    </div>
                    <!-- password input -->
                    <div class="input-frame fas">
                        <label class="input-label" for="password">Mật khẩu</label>
                        <input class="input-box pad-r-5 pad-l-45" type="password" name="password" id="password" placeholder="Mật khẩu">
                        <span class="input-symbol fas" data-symbol="&#xf023;"></span>
                    </div>
                    <!-- forgot password link -->
                    <div class="text-right mar-t-10">
                        <a class="forgot-password-link" href="#">Quên mật khẩu ?</a>
                    </div>
                    <!-- submit button -->
                    <div class="container-login-button mar-y-50">
                        <div class="wrap-login-button">
                            <button class="login-button">Đăng nhập</button>
                        </div>
                    </div>
                    <hr class="mar-y-50">
                    <!-- sign up link -->
                    <div class="text-center">
                        <a class="sign-up-link" href="signup.php">Đăng ký tài khoản</a>
                    </div>
                    <hr class="mar-y-10 w-50 mar-x-auto">
                    <!-- To store -->
                    <div class="text-center">
                        <a class="sign-up-link" href="trang-chu.php">Vào cửa hàng</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="./libs/main.js"></script>
</body>
</html>