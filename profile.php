<?php
    session_start();
    if(!isset($_SESSION['id_user'])){
        header('Location: login.php');
    }
    $userId = $_SESSION['id_user'];

    require_once('dbconnection.php');
    $data = GetUserProfileById($userId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./libs/style.css">
</head>
<body>
    <!-- Navbar -->
    <?php 
        require_once('user-header.php');
    ?>
    <!-- .Navbar -->

    <!-- Thông tin ảnh bìa, tên, email user -->
    <div class="container pad-0">
        <div class="big-panel pad-y-10">
            <div class="row user-info-panel mar-y-25">
                <div class="d-flex justify-content-center col-lg-2 mar-l-50 pad-t-75">
                    <img src="<?php echo $data['avatar']?>" alt="Avatar" class="user-avatar">
                    <div class="align-self-end btn-add-avatar">
                        <button id="add-avatar-btn" class="pad-0 btn btn-outline-success btn-square fas">&#xf0fe;</button>
                    </div>
                    <!-- Cập nhật ảnh đại diện -->
                    <div id="add-avatar-panel" class="top-panel-dark">
                        <?php
                            if(isset($_POST['upload-btn'])){
                                $img_name = $_FILES['avatar']['name'];
                                $img_temp = $_FILES['avatar']['tmp_name'];
                                
                                $target_dir = "resources/images";
                                $target_file = $target_dir . basename($_FILES["avatar"]["name"]);

                                // Image type
                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                $extensions_arr = array("jpg","jpeg","png","gif");

                                if(in_array($imageFileType,$extensions_arr)){
                                    if(move_uploaded_file($img_temp,$target_file)){
                                        $up_result =  UploadAvatar($userId, $target_file);
                                    }
                                }
                                header('Location: profile.php');
                            }
                        ?>
                        <form action="profile.php" id="add-avatar-form" class="form-panel mar-auto pad-25 w-50 mar-t-50" method="POST" enctype='multipart/form-data'>
                            <h4>Chọn ảnh đại diện của bạn</h4>
                            <div class="col-12 d-flex justify-content-center mar-y-25">
                                <img class="placehold-img" id="user-avatar" src="resources/images/white-image.png" alt="your image">
                            </div>
                            <div class="col-12 justify-content-center">
                                <label class="d-block mar-x-auto" for="add-avatar">Chọn ảnh trong máy của bạn</label>
                                <input type="file" class="" id="add-avatar" name="avatar" onchange="ReadImageToScreen(this, '#user-avatar', 300,300);">
                            </div>
                            <div class="d-flex justify-content-between">
                                <button name="upload-btn" type="submit" id="add-avatar-submit" class="btn btn-primary d-block w-100 mar-t-25 mar-r-50">Cập nhật ảnh</button>
                                <button type="button" id="add-avatar-close" class="btn btn-danger d-block w-100 mar-t-25 ">Đóng</button>
                            </div>
                        </form>
                    </div>
                    <!-- .Cập nhật ảnh đại diện -->
                </div>
                <div class="mar-l-10 col-lg-5 col-12">
                    <div class="user-first-info">
                        <h2><?php echo $data['name'] ?></h2>
                        <h6 class="font-weight-normal"><?php echo $data['email'] ?></h6>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <!-- .Thông tin ảnh bìa, tên, email user -->

    <!-- Thông tin cá nhân cơ bản -->
    <div class="container user-info-contain">
        <h4>Thông tin cá nhân</h4>
        <div class="horizontal-divider"></div>
        <div class="container user-info-detail">
            <div class="row mar-t-25">
                <div class="col-12">
                    <div class="input-frame fas">
                        <label class="input-label mar-0 pad-0" for="name">Họ tên</label>
                        <input class="input-box pad-x-5" type="text" name="name" id="name" placeholder="<?php echo $data['name'] ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="row mar-t-25">
                <div class="col-12">
                    <div class="input-frame fas">
                        <label class="input-label mar-0 pad-0" for="birthdate">Ngày sinh</label>
                        <input class="input-box pad-x-5" type="text" name="birthdate" id="bỉthdate" placeholder="<?php echo date("d/m/Y", strtotime($data['birthdate'])); ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="row mar-t-25">
                <div class="col-12">
                    <div class="input-frame fas">
                        <label class="input-label mar-0 pad-0" for="phone">Số điện thoại</label>
                        <input class="input-box pad-x-5" type="text" name="phone" id="phone" placeholder="<?php echo $data['phone'] ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="row mar-t-25">
                <div class="col-12">
                    <div class="input-frame fas">
                        <label class="input-label mar-0 pad-0" for="gender">Giới tính</label>
                        <input class="input-box pad-x-5" type="text" name="gender" id="gender" placeholder="<?php echo $data['gender'] ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="row mar-t-25">
                <div class="col-12">
                    <button type="button" class="btn btn-success d-block width-150" id="update-info-btn">Cập nhật</button>
                    <!-- Cập nhật thông tin cá nhân -->
                    <div id="update-info-panel" class="top-panel-dark">
                        <form action="update-info.php" id="update-info-form" class="form-panel mar-auto pad-25 w-50 mar-t-75">
                            <h3 class="mar-b-25 text-center mar-t-10">Cập nhật thông tin cá nhân</h3>
                            <input type="text" class="form-control" name="id_user-f" value="<?php echo $data['id_user']; ?>"hidden>
                            <div class="form-group">
                                <label for="name-f">Họ tên</label>
                                <input type="text" class="form-control" id="name-f" name="name-f" value="<?php echo $data['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="birthdate-f">Ngày sinh</label>
                                <input type="date" class="form-control" id="birthdate-f" name="birthdate-f" value="<?php echo $data['birthdate']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone-f">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone-f" name="phone-f" value="<?php echo $data['phone']; ?>">
                            </div>
                            <div class>
                                <label>Giới tính</label>
                                <br>
                                <?php
                                    $m = '';
                                    $fm = '';
                                    if($data['gender'] == 'Nam'){
                                        $m = 'checked';
                                    }
                                    else{
                                        $fm = 'checked';
                                    }
                                ?>
                                <div class="form-check form-check-inline mar-l-10 mar-r-50">
                                    <input class="form-check-input" type="radio" name="gender-f" id="male" value="Nam" <?php echo $m;?>>
                                    <label class="form-check-label" for="male">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender-f" id="female" value="Nữ" <?php echo $fm;?>>
                                    <label class="form-check-label" for="female">Nữ</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mar-t-25">
                                <button type="submit" id="update-info-submit" class="btn btn-primary d-block w-100 mar-t-25 mar-r-50">Xác nhận</button>
                                <button type="button" id="update-info-close" class="btn btn-danger d-block w-100 mar-t-25 ">Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .Thông tin cá nhân cơ bản -->

    <!-- Thông tin email và số dư -->
    <div class="container user-account-contain">
        <h4>Tài khoản</h4>
        <div class="horizontal-divider"></div>
        <div class="container user-info-detail">
            <div class="row mar-t-25">
                <div class="col-12">
                    <div class="input-frame fas">
                        <label class="input-label mar-0 pad-0" for="email">Email</label>
                        <input class="input-box pad-x-5" type="text" name="email" id="email" placeholder="<?php echo $data['email'] ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="row mar-t-25">
                <div class="col-12">
                    <div class="input-frame fas">
                        <label class="input-label mar-0 pad-0" for="sodu">Số dư</label>
                        <input class="input-box pad-x-5" type="text" name="sodu" id="sodu" placeholder="<?php echo number_format($data['money']); ?> VNĐ" disabled>
                    </div>
                </div>
            </div>
            <div class="row mar-t-25">
                <div class="col-12">
                    <button type="button" class="btn btn-success d-block width-150" id="napthe-btn">Nạp thẻ</button>
                    <!-- Nạp thẻ -->
                    <div id="napthe-panel" class="top-panel-dark">
                        <form action="napthe.php" id="napthe-form" class="form-panel mar-auto panel-350 pad-25 w-50 mar-t-100">
                            <h4>Nạp thẻ</h4>
                            <div class="form-group">
                                <label for="email-f">Email</label>
                                <input type="email" class="form-control" id="email-f" name="email-f" value="<?php echo $data['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="seri-f">Số seri</label>
                                <input type="text" class="form-control" id="seri-f" name="seri-f" placeholder="Seri">
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" id="nap-submit" class="btn btn-primary d-block w-100 mar-t-25 mar-r-50">Nạp thẻ</button>
                                <button type="button" id="nap-close" class="btn btn-danger d-block w-100 mar-t-25 ">Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <!-- .Thông tin email và số dư -->

    <!-- Yêu cầu đổi mật khẩu -->
    <div class="container user-account-contain mar-b-25">
        <h4>Đổi mật khẩu</h4>
        <div class="horizontal-divider"></div>
        <div class="container user-info-detail">
            <div class="row mar-t-25">
                <div class="col-12">
                    <button type="button" class="btn btn-success d-block width-150" id="update-password-btn">Đổi mật khẩu</button>
                    <!-- Đổi mật khẩu -->
                    <div id="update-password-panel" class="top-panel-dark">
                        <form action="update-password.php" id="update-password-form" class="form-panel mar-auto panel-450 pad-25 w-50 mar-t-50">
                            <h4>Đổi mật khẩu</h4>
                            <input type="text" class="form-control" name="id_user" value="<?php echo $data['id_user']; ?>"hidden>
                            <div class="form-group">
                                <label for="password">Nhập mật khẩu cũ</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu hiện tại">
                            </div>
                            <div class="form-group">
                                <label for="npassword">Nhập mật khẩu mới</label>
                                <input type="password" class="form-control" id="npassword" name="npassword" placeholder="Nhập mật khẩu mới">
                            </div>
                            <div class="form-group">
                                <label for="rnpassword">Xác nhận mật khẩu mới</label>
                                <input type="password" class="form-control" id="rnpassword" name="rnpassword" placeholder="Nhập lại mật khẩu mới">
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" id="update-password-submit" class="btn btn-primary d-block w-100 mar-t-25 mar-r-50">Đổi mật khẩu</button>
                                <button type="button" id="update-password-close" class="btn btn-danger d-block w-100 mar-t-25 ">Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .Yêu cầu đổi mật khẩu -->
    
    <!-- Tài khoản developer -->
    <div class="container user-account-contain">
        <h4>Tài khoản developer</h4>
        <div class="horizontal-divider"></div>
        <div class="container user-info-detail">
        <?php
            if($data['role'] == 'user'){
        ?>
            <div class="row mar-t-25">
                <div class="col-12">
                    <h6>Bạn có muốn đưa ứng dụng của mình lên cửa hàng. Hãy đăng ký tài khoản developer ngay.</h6>
                    <small>Chi phí đăng ký 500.000đ</small>
                    <button type="buton" class="btn btn-success d-block width-150" id="signup-developer-btn">Kích hoạt</button>
        <?php
            }
            else{
        ?>
            <div class="row mar-t-25">
                <div class="col-12">
                    <div class="input-frame fas">
                        <label class="input-label mar-0 pad-0" for="dev-name">Tên nhà phát triển</label>
                        <input class="input-box pad-x-5" type="text" name="devname" id="devname" placeholder="<?php echo $data['dev_name'] ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="row mar-t-25">
                <div class="col-12">
                    <div class="input-frame fas">
                        <label class="input-label mar-0 pad-0" for="devemail">Địa chỉ liên lạc</label>
                        <input class="input-box pad-x-5" type="text" name="devemail" id="devemail" placeholder="<?php echo $data['dev_email'] ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="row mar-t-25">
                <div class="col-12">
                    <!-- Chuyển qua trang developer -->
                    <div class="container-login-button mar-y-25">
                        <div class="wrap-login-button">
                            <a href="dev/developer.php">
                                <button class="login-button">Đến trang developer  &nbsp;<i class="fas fa-arrow-right"></i></button>
                            </a>
                        </div>
                    </div>
                <?php
                    }
                ?>
                    <div id="signup-developer-panel" class="top-panel-dark">
                        <?php
                            if(isset($_POST['signup']) && isset($_POST['dev-name']) && isset($_POST['dev-email']) && isset($_POST['xpassword']) && isset($_FILES['id-card-front']) && isset($_FILES['id-card-back'])){
                                echo '<script>alert("hello")</script>';
                                $dev_mail = $_POST['dev-email'];
                                $dev_name = $_POST['dev-name'];
                                $password = $_POST['xpassword'];
                                
                                $img1_name = $_FILES['id-card-front']['name'];
                                $img1_temp = $_FILES['id-card-front']['tmp_name'];
                                
                                $img2_name = $_FILES['id-card-back']['name'];
                                $img2_temp = $_FILES['id-card-back']['tmp_name'];

                                $target_dir = "resources/images/";
                                $target_file_f = $target_dir . basename($img1_name);
                                $target_file_b = $target_dir . basename($img2_name);

                                // Image type
                                $image1FileType = strtolower(pathinfo($target_file_f,PATHINFO_EXTENSION));
                                $image2FileType = strtolower(pathinfo($target_file_b,PATHINFO_EXTENSION));
                                $extensions_arr = array("jpg","jpeg","png");

                                $signup_result = '';
                                if(in_array($image1FileType,$extensions_arr) && in_array($image2FileType,$extensions_arr)){
                                    if(move_uploaded_file($img1_temp,$target_file_f) && move_uploaded_file($img2_temp,$target_file_b)){
                                        $signup_result = SignupDeveloper($data['id_user'], $dev_name, $dev_mail, $password, $target_file_f, $target_file_b);
                                    }

                                    if($signup_result['code'] == 0){
                                        echo    '<script>
                                                    alert("'.$signup_result['message'].'");
                                                    window.location.replace("profile.php");
                                                </script>';
                                    }
                                    else{
                                        echo    '<script>
                                                    alert("'.$signup_result['message'].'");
                                                    window.location.replace("profile.php");
                                                </script>';
                                    }
                                }
                                else{
                                    echo        '<script>
                                                alert("Định dạng ảnh không hợp lệ.");
                                                window.location.replace("profile.php");
                                                </script>';
                                }
                                header('Location: profile.php');
                            }
                        ?>
                        <form action="profile.php" id="signup-developer-form" class="form-panel mar-auto panel-750 pad-x-25 pad-t-10 form-auto-width mar-t-5" method="POST" enctype='multipart/form-data'>
                            <h4 class="mar-y-5">Đăng ký developer</h4>
                            <div class="form-group mar-b-0">
                                <label for="id-card-front">Ảnh chụp mặt trước CMND/CCCD</label><br>
                                <input type="file" class="mar-b-0" id="id-card-front" name="id-card-front" onchange="ReadImageToScreen(this, '#id-img-front', 220, 150)">
                                <img class="id-card" id="id-img-front" src="resources/images/white-image.png" alt="Identity card front">
                            </div>
                            <div class="form-group mar-b-0">
                                <label for="password">Ảnh chụp mặt sau CMND/CCCD</label><br>
                                <input type="file" class="mar-b-0" id="id-card-back" name="id-card-back" onchange="ReadImageToScreen(this, '#id-img-back', 220, 150)">
                                <img class="id-card" id="id-img-back" src="resources/images/white-image.png" alt="Identity card back">
                            </div>
                            <div class="form-group">
                                <label for="password">Tên nhà phát triển</label>
                                <input type="text" class="form-control" id="dev-name" name="dev-name" placeholder="Tên nhà phát triển">
                            </div>
                            <div class="form-group">
                                <label for="npassword">Email nhà phát triển</label>
                                <input type="email" class="form-control" id="dev-email" name="dev-email" placeholder="Email nhà phát triển">
                            </div>
                            <div class="form-group">
                                <label for="npassword">Nhập mật khẩu xác nhận</label>
                                <input type="password" class="form-control" id="xpassword" name="xpassword" placeholder="Nhập mật khẩu xác nhận">
                            </div>
                            <div class="d-flex justify-content-between">
                                <button name="signup" type="submit" id="signup-developer-submit" class="btn btn-primary d-block w-100 mar-t-10 mar-r-50">Đăng ký</button>
                                <button type="button" id="signup-developer-close" class="btn btn-danger d-block w-100 mar-t-10 ">Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <!-- .Tài khoản developer -->

    <!-- Nút đăng xuất lớn -->
    <div class="container user-account-contain">
        <div class="horizontal-divider w-50 mx-auto"></div>
        <div class="container user-info-detail">
            <div class="row mar-t-25">
                <div class="col-12">
                    <div class="container-login-button mar-y-25">
                        <div class="wrap-login-button">
                            <a class="logout-link" href="logout.php">
                                <button class="logout-button" >Đăng xuất</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <!-- .Nút đăng xuất lớn -->
    
    <!-- Footer -->
    <?php
        require_once('footer.php');
    ?>
    <!-- .Footer -->

    <!-- JS core -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./libs/main.js"></script>
</body>
</html>