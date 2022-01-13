<?php
    session_start();
    require_once('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Xác nhận đăng ký</title>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./libs/style.css">
</head>
<body class="bg-green">
    <?php
        $error = '';
        $noti = '';
        if(isset($_GET['email']) && isset($_GET['token'])){
            $email = $_GET['email'];
            $token = $_GET['token'];

            if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
                $error = 'Địa chỉ email không hợp lệ';
            }
            else if(strlen($token) != 32){
                $error = 'Sai định dạng token';
            }
            else{
                $result = EmailActivate($email, $token);
                if($result['code'] == 0){
                    $noti = $result['message'];
                }
                else{
                    $error = $result['error'];
                }
            }
        }
        else{
            $error = 'Đường dẫn không hợp lệ';
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="activate-page-panel w-50 mar-t-125 pad-25 mx-auto">
                <h4 class="activate-page-title alert-heading mar-b-25">Kích hoạt tài khoản</h4>
                <?php
                    if(empty($error)){
                ?>
                <div class="success-contain">
                    <div class="panel-150">
                        <p class='text-success'>Chúc mừng bạn đã <?php echo $noti;?>!</p>
                        <p class="mb-0">Giờ đây bạn có thể mua bất cứ ứng dụng nào trên thống của chúng tôi.</p>
                        <p class="mb-0">Chúc bạn có được những trải nghiệm thú vị.</p>
                        <br>
                        <p class="mb-0">Vui lòng bấm đăng nhập để tiếp tục sử dụng.</p>
                    </div>
                </div>
                <?php
                    }
                    else{
                ?>
                <div class="fail-contain">
                    <div class="panel-150">
                        <p class='text-danger'><?php echo $error;?>.</p>
                        <p class="mb-0">Không thể thực hiện yêu cầu.</p>
                        <p class="mb-0"></p>
                        <br>
                        <p class="mb-0">Vui lòng bấm đăng nhập để tiếp tục sử dụng.</p>
                    </div>
                </div>
                <?php
                    }
                ?>
                <hr>
                <div class="col-md-12 text-center panel-100 d-flex align-items-center justify-content-center">
                    <form action="login.php">
                        <button type="submit" class="btn btn-primary" value="return login">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="./libs/main.js"></script>
</body>
</html>