<?php
    session_start();
    require_once('../dbconnection.php');
    $user = "";
    if(isset($_SESSION['id_user'])){
        $userId = $_SESSION['id_user'];
        $user = GetUserProfileById($userId);
    }
    if(isset($_GET['id_product'])){
        $id_product = $_GET['id_product'];
    }
?>

<?php
    if (isset($_POST['edit'])) {
        // Thông tin
        if(isset($_POST['id_product']) && isset($_POST['name']) && isset($_POST['id_danhmuc']) && isset($_POST['price']) && isset($_POST['shortinfo']) && isset($_POST['detail'])){
            $id_product = $_POST['id_product'];
            $name = $_POST['name'];
            $id_danhmuc = $_POST['id_danhmuc'];
            $price = $_POST['price'];
            $shortinfo = $_POST['shortinfo'];
            $detail = $_POST['detail'];
        }
        
        // Ảnh logo ứng dụng
        if(isset($_FILES['image_logo'])){
            $image_logo = $_FILES['image_logo'];
            $temp_image = $image_logo['tmp_name'];
        }
        
        // File ứng dụng
        if(isset($_FILES['file'])){
            $file = $_FILES['file'];
            $temp_file = $file['tmp_name'];
        }

        $target_dir_image = "resources/images/";
        $target_dir_file = "resources/files/";
        
        if(!empty($image_logo['name'])){
            $target_image = $target_dir_image.basename($image_logo['name']);
            move_uploaded_file($temp_image,"../".$target_image);
        }
        else{
            $target_image = GetProductByID($id_product)['image_logo'];
        }

        if(!empty($file['name'])){
            $target_file = $target_dir_file.basename($file['name']);
            move_uploaded_file($temp_file,"../".$target_file);
        }
        else{
            $target_file = GetProductByID($id_product)['file'];
        }
        
        $update_result = UpdateProduct($id_product, $name, $target_file, $id_danhmuc, $price, $shortinfo, $detail, $target_image);
        if($update_result['code'] == 0){
            echo "<script>alert('".$update_result['message']."')</script>";       
        }
        else{
            echo "<script>alert('".$update_result['message']."')</script>";        
        }
        echo "<script> window.location='developer.php?select=upload_product'; </script>";
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.css" rel="stylesheet">

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
                <?php include_once('header.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-6 col-md-8 border rounded my-5 p-4  mx-3">
                            <p class="mb-5"><a href="javascript:window.history.back()">Quay lại</a></p>
                            <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Chỉnh sửa sản phẩm</h3>
                            <?php
                                $product = GetProductByID($id_product);
                            ?>
                            <form method="POST" action="edit_product.php" enctype='multipart/form-data'>
                                <input type="text" value="<?php echo $id_product; ?>" name="id_product" hidden>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input name="image_logo" type="file" class="custom-file-input" id="customFile" accept="image/gif, image/jpeg, image/png, image/bmp">
                                        <label class="custom-file-label" for="customFile">Ảnh logo</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm</label>
                                    <input name="name" type="text" required class="form-control" id="name" value="<?php echo $product['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="inputZip">Danh mục</label>
                                    <select class="form-control" aria-label="Default select example" name="id_danhmuc">
                                        <option value="" selected>-- Chọn danh mục sản phẩm</option>
                                        <?php 
                                            $categories = GetCategoryAll();
                                            foreach($categories as $category){
                                        ?>
                                        <option value="<?php echo $category['id_danhmuc'] ?>"><?php echo $category['tendanhmuc'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá bán</label>
                                    <input type="number" id="price" name="price" rows="4" class="form-control" placeholder="Giá bán"></input>
                                </div>
                                <div class="form-group">
                                    <label for="shortinfo">Mô tả ngắn</label>
                                    <textarea id="shortinfo" name="shortinfo" rows="4" class="form-control"><?php echo $product['shortinfo']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="detail">Chi tiết sản phẩm</label>
                                    <textarea id="detail" name="detail" rows="6" class="form-control"><?php echo $product['detail']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input name="file" type="file" class="custom-file-input" id="customFile" accept="file/zip">
                                        <label class="custom-file-label" for="customFile">File sản phẩm</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (!empty($error)) {
                                        echo "<div class='alert alert-danger'>$error</div>";
                                    }
                                    ?>
                                    <button name="edit" type="submit" class="btn btn-primary px-5 mr-2">Chỉnh sửa</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include_once('footer.php') ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.js"></script>
</body>
</html>