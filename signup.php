<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng ký</title>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./libs/style.css">
</head>
<body class="bg-green">
    <?php
        if(isset($_POST['name'])  && isset($_POST['phone']) && isset($_POST['birthdate']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['password'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $birthdate = $_POST['birthdate'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            require_once("dbconnection.php");

            $name = strip_tags(mysqli_real_escape_string(OPEN_DB(), $name));
            $phone = strip_tags(mysqli_real_escape_string(OPEN_DB(), $phone));
            $birthdate = strip_tags(mysqli_real_escape_string(OPEN_DB(), $birthdate));
            $gender = strip_tags(mysqli_real_escape_string(OPEN_DB(), $gender));
            $email = strip_tags(mysqli_real_escape_string(OPEN_DB(), $email));
            $password = strip_tags(mysqli_real_escape_string(OPEN_DB(), $password));

            $result = Register($name,$phone,$birthdate,$gender,$email,$password);

            if($result['code'] == 0){
                echo '<script>alert("'.$result['message'].'")</script>'; 
            }
            else{
                echo '<script>alert("'.$result['error'].'")</script>'; 
            }
        }
        
    ?>
    <div class="container">
        <div class="row">
            <div class="form-panel w-50 mt-5 pad-25 mx-auto">
                <form class="signup-form" action="signup.php" method="POST">
                    <!-- form title -->
                    <span class="form-title pad-b-25">Đăng ký</span>
                    <!-- input line 1 -->
                    <div class="row mar-b-10">
                        <div class="col-md-6 col-12">
                            <div class="input-frame fas">
                                <label class="input-label mar-0 pad-0" for="name">Họ tên</label>
                                <input class="input-box-small pad-x-5" type="text" name="name" id="name" placeholder="Họ tên">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="input-frame fas">
                                <label class="input-label mar-0 pad-0" for="phone">Số điện thoại</label>
                                <input class="input-box-small pad-x-5" type="text" name="phone" id="phone" placeholder="Số điện thoại">
                            </div>
                        </div>
                    </div>
                    <!-- input line 2 -->
                    <div class="row mar-b-10">
                        <div class="col-12">
                            <div class="input-frame fas">
                                <label class="input-label mar-0 pad-0" for="bỉthdate">Ngày sinh</label>
                                <input class="input-box-small pad-l-5 pad-r-25" type="date" name="birthdate" id="birthdate">
                            </div>
                        </div>
                    </div>
                    <!-- input line 3 -->
                    <div class="row mar-b-10 postition-relative">
                        <div class="input-label col-12 mar-l-10">Giới tính</div>
                        <div class="form-check col-6">
                            <input class="" type="radio" name="gender" id="male" value="Nam" checked>
                            <label class="form-check-label font-sz-12" for="male">Nam</label>
                        </div>
                        <div class="form-check col-6">
                            <input class="" type="radio" name="gender" id="female" value="Nữ">
                            <label class="form-check-label font-sz-12" for="female">Nữ</label>
                        </div>
                    </div>
                    <!-- input line 4 -->
                    <div class="row mar-b-10">
                        <div class="col-12">
                            <div class="input-frame fas">
                                <label class="input-label mar-0 pad-0" for="email">Email</label>
                                <input class="input-box-small pad-x-5" type="text" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row mar-b-10">
                        <div class="col-md-6 col-12">
                        <div class="input-frame fas">
                                <label class="input-label mar-0 pad-0" for="password">Mật khẩu</label>
                                <input class="input-box-small pad-x-5 verified-password" type="password" name="password" id="password" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="input-frame fas">
                                <label class="input-label mar-0 pad-0" for="repassword">Xác nhận mật khẩu</label>
                                <input class="input-box-small pad-x-5 verified-password" type="password" name="repassword" id="repassword" placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                    </div>
                    <!-- input line 5 -->
                    
                    <!-- submit button -->
                    <div class="container-signup-button mar-y-50">
                        <div class="wrap-signup-button">
                            <button class="signup-button">Đăng ký</button>
                        </div>
                    </div>
                    <hr class="mar-y-25">
                    <!-- sign up link -->
                    <div class="text-center">
                        <a class="login-link" href="login.php">Đăng nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="./libs/main.js"></script>
</body>
</html>