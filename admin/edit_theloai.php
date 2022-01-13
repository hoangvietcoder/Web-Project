<?php
session_start();
require_once('../dbconnection.php');

if(isset($_SESSION['id_user'])){
    $userId = $_SESSION['id_user'];
    $user = GetUserProfileById($userId);
}

$id = $_GET['id'];
$sql = "SELECT * FROM theloai WHERE id_theloai ='$id'";
$result = mysqli_query(OPEN_DB(), $sql);
$row = mysqli_fetch_assoc($result);
?>

<?php
if (isset($_POST['edit'])) {
    $theloai = $_POST["tentheloai"];

    $sql = "UPDATE `theloai` SET `tentheloai`=' $theloai' WHERE id_theloai = '$id'";
    if (mysqli_query(OPEN_DB(), $sql)) {
        echo "<script> alert('Thể loại được chỉnh sửa thành công') </script>";
        echo "<script> window.location='admin.php?select=quanlytheloai'; </script>";
    } else {
        echo "<script> window.location='admin.php?select=quanlytheloai'; </script>";
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
                <p class="mb-3"><a href="admin.php?select=quanlytheloai">Quay lại</a></p>
                    <div class="row" style="width: 600px;">
                        <div class="col-lg-12">
                        <h2>Chỉnh Sửa Thể Loại</h2>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="tentheloai">Tên thể loại:</label>
                            <input type="text" class="form-control" id="tentheloai" name="tentheloai" value="<?php echo $row['tentheloai']; ?>">
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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="../dev/vendor/jquery/jquery.min.js"></script>
    <script src="../dev/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../dev/js/sb-admin-2.js"></script>

</body>

</html>