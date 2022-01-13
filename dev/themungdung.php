<?php
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
    if(isset($_POST['add'])){
        // Thông tin
        if(isset($_POST['name']) && isset($_POST['id_developer']) && isset($_POST['id_danhmuc']) && isset($_POST['price']) && isset($_POST['shortinfo']) && isset($_POST['detail']) && isset($_POST['ngaydang'])){
            $name = $_POST['name'];
            $id_developer =  $_POST['id_developer'];
            $id_danhmuc = $_POST['id_danhmuc'];
            $price = $_POST['price'];
            $shortinfo = $_POST['shortinfo'];
            $detail = $_POST['detail'];
            $ngaydang = $_POST['ngaydang'];
        }
            
        $target_image = "";
        $target_file = "";

        // Ảnh logo ứng dụng
        if(isset($_FILES['image_logo'])){
            $image_logo = $_FILES['image_logo'];
            $temp_image = $image_logo['tmp_name'];
            $extension_image = pathinfo($_FILES['image_logo']['name'], PATHINFO_EXTENSION);
            $target_dir_image = "resources/images/";
        }
            
        // File ứng dụng
        if(isset($_FILES['file'])){
            $file = $_FILES['file'];
            $temp_file = $file['tmp_name'];
            $target_dir_file = "resources/files/";
        }

        $lastProduct = GetLastProduct()['data'];
        $nextProductID = $lastProduct['id_product'] + 1;

        if(!empty($image_logo['name'])){
            $target_image = $target_dir_image."app".$nextProductID.".".$extension_image;
            move_uploaded_file($temp_image, "../".$target_image);
        }


        if(!empty($file['name'])){
            $target_file = $target_dir_file.basename($file['name']);
            move_uploaded_file($temp_file,"../".$target_file);
        }
        
        $insert_result = InsertProduct($name, $target_file, $id_developer, $id_danhmuc, $price, $shortinfo, $detail, $target_image, $ngaydang);
        if($insert_result['code'] == 0){
            echo "<script>alert('".$insert_result['message']."')</script>";       
        }
        else{
            echo "<script>alert('".$insert_result['message']."')</script>";        
        }
        echo "<script> window.location='developer.php?select=upload_product'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thông tin ứng dụng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    </style>
</head>

<body>
   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8 border rounded my-5 p-4  mx-3">
                <p class="mb-5"><a href="developer.php?select=upload_product">Quay lại</a></p>
                <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Thêm sản phẩm mới</h3>
                
                <form method="POST" novalidate enctype="multipart/form-data">
                    <input type="text" value="<?php echo $userId; ?>" name="id_developer" hidden>
                    <div class="form-group">
                        <div class="custom-file">
                            <input name="image_logo" type="file" class="custom-file-input" id="customFile" accept="image/gif, image/jpeg, image/png, image/bmp">
                            <label class="custom-file-label" for="customFile">Ảnh logo</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input name="name" required class="form-control" type="text" placeholder="Tên sản phẩm" id="name">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_danhmuc">Danh mục</label>
                        <select class="form-control" aria-label="Default select example" name="id_danhmuc" id="id_danhmuc">
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
                        <label for="developer">Tên nhà phát triển</label>
                        <input class="form-control" type="text" value="<?php echo GetDevByID($userId)['dev_name'] ?>" id="developer" disabled>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá bán</label>
                        <input type="number" id="price" name="price" min="0" rows="4" class="form-control" placeholder="Giá bán"></input>
                    </div>
                    <div class="form-group">
                        <label for="shortinfo">Mô tả ngắn</label>
                        <textarea id="shortinfo" name="shortinfo" rows="4" class="form-control" placeholder="Mô tả ngắn"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="detail">Chi tiết sản phẩm</label>
                        <textarea id="detail" name="detail" rows="6" class="form-control" placeholder="Chi tiết sản phẩm"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ngaydang">Ngày đăng</label>
                        <input name="ngaydang" required class="form-control" type="date" value="<?php echo date('Y-m-d') ?>" id="ngaydang">
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
                        <button name="add" type="submit" class="btn btn-primary px-5 mr-2">Thêm</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>

</html>