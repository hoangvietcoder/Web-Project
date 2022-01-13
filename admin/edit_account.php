<?php
session_start();
require_once('../dbconnection.php');

if(isset($_SESSION['id_user'])){
    $userId = $_SESSION['id_user'];
    $user = GetUserProfileById($userId);
}
if(isset($_GET['id'])){
    $info = GetUserByID($_GET['id']);
}

?>

<?php
if (isset($_POST['edit'])) {
    $id_user = $_POST["id_info"];
    $name = $_POST["name"];
    $birthdate = $_POST["birthdate"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $role = $_POST["role"];
    
    $update_result = AdminUpdateProfile($id_user,$name,$birthdate,$phone,$gender,$role);

    echo "
        <script> 
            alert('".$update_result['message']."');
            window.location='admin.php?select=quanlytaikhoan';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../dev/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../dev/css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('menu.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('../dev/header.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    <p class="mb-3"><a href="admin.php?select=quanlytaikhoan">Quay lại</a></p>
                    <h2>Chỉnh Sửa Tài Khoản</h2>
                    <form method="POST">
                    <input type="text" id="id_info" name="id_info" value="9" hidden>
                        <div class="form-group">
                            <label for="name">Họ và tên:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $info['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Ngày sinh:</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $info['birthdate']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $info['phone']; ?>">
                        </div>
                        <div class="mb-3 ">
                            <label class="form-label" for="inputZip">Giới tính:</label>
                            <select class="form-control" aria-label="Default select example" name="gender">
                                <option value="<?php echo $info['gender']; ?>">--Chọn giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="mb-3 ">
                            <label class="form-label" for="inputZip">Vai trò:</label>
                            <select class="form-control" aria-label="Default select example" name="role">
                                <option value="<?php echo $info['role']; ?>">Chọn vai trò</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="developer">Developer</option>
                            </select>
                            <button name="edit" type="submit" class="btn btn-primary mt-4">Lưu Thay Đổi</button>
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once('../dev/footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="../dev/vendor/jquery/jquery.min.js"></script>
    <script src="../dev/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../dev/js/sb-admin-2.js"></script>


</body>

</html>