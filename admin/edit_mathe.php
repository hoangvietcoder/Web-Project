<?php
session_start();
require_once('../dbconnection.php');

$user = "";
if(isset($_SESSION['id_user'])){
    $userId = $_SESSION['id_user'];
    $user = GetUserProfileById($userId);
}

$id = $_GET['id'];
$sql = "SELECT * FROM thecao WHERE id_thecao ='$id'";
$result = mysqli_query(OPEN_DB(), $sql);
$row = mysqli_fetch_assoc($result);
?>

<?php
if (isset($_POST['edit'])) {
    $trangthai = $_POST["trangthai"];
    $sql = "UPDATE `thecao` SET `trangthai`='$trangthai' WHERE id_thecao = '$id'";
    if (mysqli_query(OPEN_DB(), $sql)) {
        echo "<script> alert('Thay đổi trạng thái thành công') </script>";
        echo "<script> window.location='admin.php?select=quanlymathe'; </script>";
    } else {
        echo "<script> window.location='admin.php?select=quanlymathe'; </script>";
    }
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
                <p class="mb-3"><a href="admin.php?select=quanlymathe">Quay lại</a></p>
                    <div class="row" style="width: 600px;">
                        <div class="col-lg-12">
                        <h2>Chỉnh Sửa Trạng thái</h2>
                    <form action="" method="POST">
                            <div class="form-group" style="margin: 15px;">
                            <div class="mb-3 ">
                                <label class="form-label" for="inputZip">Trạng thái:</label>
                                <select class="form-control" aria-label="Default select example" name="trangthai">
                                    <option value="">--Chọn trạng thái</option>
                                    <option value="free">Chưa được nạp</option>
                                    <option value="used">Đã được nạp</option>
                                </select>
                            </div>
                        <button name="edit" type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                    </form>
                        </div>
                    </div>
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
    <script src="../dev/js/sb-admin-2.js"></script>
</body>

</html>