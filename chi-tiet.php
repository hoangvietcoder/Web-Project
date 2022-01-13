<?php
    session_start();
    require_once('dbconnection.php');

    $user = "";
    if(isset($_SESSION['id_user'])){
        $userId = $_SESSION['id_user'];
        $user = GetUserProfileById($userId);
    } 

    if(isset($_GET['id_product'])){
        $id_product = $_GET['id_product'];
    }

    if(isset($_POST['comment']) && isset($_POST['star']) && isset($_POST['id_sanpham']) && isset($_POST['id_user']) && isset($_POST['ngaydang'])){
        $comment = $_POST['comment'];
        $star = $_POST['star'];
        $id_sanpham = $_POST['id_sanpham'];
        $id_user = $_POST['id_user'];
        $ngaydang = $_POST['ngaydang'];
        
        $comment_result = ProductRating($comment, $star, $ngaydang, $id_sanpham, $id_user);
        echo "
            <script>
                window.location.replace('chi-tiet.php?id_product=".$id_sanpham."');
            </script>
        ";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chi tiết</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="libs/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        include('navbar.php');
    ?>    
    <div class="mar-t-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2">
                    <?php
                        include('sidebar.php');
                    ?>
                </div>
                <?php
                    $data = GetProductByID($id_product);
                ?>
                <div class="col-sm-10">
                    <div class="box-breadcrumb mar-t-25">
                        <ol class="breadcrumb">
                            <li><a href="trang-chu.php">Trang chủ</a></li>
                            <li><a href="category-product.php?id_danhmuc=<?php echo $data['id_danhmuc']; ?>"><?php echo GetCategoryByID($data['id_danhmuc'])['tendanhmuc']; ?></a></li>
                            <li class="active"><?php echo $data['name']; ?></li>
                        </ol>
                    </div>
                    
                    <div class="main-content">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="content row d-flex">
                                    <div class="avatar col-sm-3">
                                        <a href="" class="img">
                                            <img class="app-icon-img image-logo-detail" src="<?php echo $data['image_logo'] ?>">
                                        </a>
                                    </div>
                                    <div class="info col-sm-9">
                                        <h1><?php echo $data['name'] ?></h1>
                                        <p class="mar-b-5">Nhà phát triển: <?php echo GetDevByID($data['id_developer'])['dev_name'] ?></p>
                                        <p class="mar-b-5">Danh mục: <?php echo GetCategoryByID($data['id_danhmuc'])['tendanhmuc'] ?></p>
                                        <p class="mar-b-5">Thể loại:
                                            <?php
                                                $theloai = GetTypeProductById($data['id_product']);
                                                if($theloai['code'] == 0){
                                                    for($type_count = 0; $type_count < count($theloai['data'])-1; $type_count++){
                                                        echo $theloai['data'][$type_count]['tentheloai'].", ";
                                                    }
                                                    echo $theloai['data'][count($theloai['data'])-1]['tentheloai'].".";
                                                }
                                            ?>
                                        </p>
                                        <p class="text-gray-7 pad-t-25"><?php echo $data['shortinfo'] ?></p>
                                        
                                        <small class="mar-l-5">Lượt tải: <?php echo $data['downloads']; ?></small>
                                        <?php
                                            if(isset($_SESSION['id_user'])){
                                                if(!CheckOwnApp($_SESSION['id_user'], $data['id_product'])['data']){
                                                    if($data['price'] != 0){
                                        ?>
                                        <p class="info-footer">
                                            <button id="buy-app-btn" class="btn btn-customer text-color-white"><?php echo "Mua ".number_format($data['price'])." VNĐ"; ?></button>
                                        </p>
                                        <!-- Mua ứng dụng -->
                                        <div id="buy-app-panel" class="top-panel-dark">
                                            <form action="buy-app.php" id="buy-app-form" class="form-panel mar-auto panel-350 pad-25 width-50p mar-t-250">
                                                <h4>Mua sản phẩm</h4>
                                                <h5>Bạn có muốn mua sản phẩm này với giá <?php echo number_format($data['price'])." VNĐ."; ?></h5>
                                                <input type="text" class="" name="id_user" value="<?php echo $user['id_user']; ?>" hidden>
                                                <input type="text" class="" name="id_product" value="<?php echo $data['id_product']; ?>" hidden>
                                                <div class="form-group">
                                                    <label for="sodu">Số dư hiện tại</label>
                                                    <input type="text" class="form-control" id="sodu" value="<?php echo number_format($user['money'])." VNĐ" ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Mật khẩu xác nhận</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Vui lòng nhập mật khẩu để xác nhận">
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <button type="submit" id="buy-app-submit" class="btn btn-primary dis-block width-100p mar-t-25 mar-r-50">Mua</button>
                                                    <button type="button" id="buy-app-close" class="btn btn-danger dis-block width-100p mar-t-25 ">Đóng</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- .Mua ứng dụng -->
                                        <?php
                                                    }
                                                    else{
                                        ?>
                                        <p class="info-footer">
                                            <a class="download-btn text-color-white" href="download-file.php?file=<?php echo urlencode($data['file']); ?>&id_product=<?php echo $data['id_product']; ?>" class="btn btn-customer">
                                                  <button class="btn btn-customer text-color-white">Tải về</button>  
                                            </a>
                                        </p>
                                        <?php
                                                    }
                                                }
                                                else{
                                        ?>
                                        <p class="info-footer">
                                            <a class="download-btn text-color-white" href="download-file.php?file=<?php echo urlencode($data['file']); ?>&id_product=<?php echo $data['id_product']; ?>" class="btn btn-customer">
                                                  <button class="btn btn-customer text-color-white">Tải về</button>  
                                            </a>
                                        </p>
                                        <?php            
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div>
                                    <h3>Chi tiết</h3>
                                    <div jsname="bN97Pc" class="description" itemprop="description" style="max-height: none;">
                                        <?php echo $data['detail'] ?>
                                    </div>
                                </div>
                                <hr>
                                <?php 
                                    if(isset($_SESSION['id_user'])){
                                ?>
                                <!---->
                                <form method="POST" class="form-inline">
                                    <input name="id_sanpham" type="text" value="<?php echo $id_product ?>" hidden>
                                    <input name="id_user" type="text" value="<?php echo $user['id_user']; ?>" hidden>
                                    <input name="ngaydang" type="date" value="<?php echo date('Y-m-d') ?>" hidden>
                                    <input name="comment" class="form-control mar-l-0 search-bar-custom pad-l-25" type="search" placeholder="Đánh giá cho sản phẩm này">
                                    <button class="btn my-2 my-sm-0 mar-t-15 search-button" type="submit"><i class="fas fa-cloud"></i></button>
                                    <p class="start mar-l-25">
                                        <?php
                                            for($sao = 0; $sao < 5; $sao++){
                                                echo '<button type="button" id="sao-'.$sao.'" class="glyphicon glyphicon-star mar-r-10 mar-y-10" aria-hidden="true"></button>';
                                            }
                                        ?>
                                        <input id="star-rate" type="number" name="star" value="0" hidden>
                                    </p>
                                </form>
                                <!---->
                                <?php
                                    }
                                ?>
                                <h3>Đánh giá</h3>
                                <div class="rating">
                                    <?php
                                        $rate = GetRateByProductId($id_product);

                                        if($rate['code'] != 0){
                                            echo "<h5>".$rate['message']."</h5>";
                                        }
                                        else{
                                    ?>
                                    <div>
                                        <h4 class="number-start">
                                        <?php
                                            $tongsao = 0;
                                            for($i = 0; $i < count($rate['data']); $i++){
                                                $tongsao += (int)$rate['data'][$i]['sosao'];
                                            }
                                            $tongsao = $tongsao/count($rate['data']);
                                            echo $tongsao;
                                        ?>
                                        </h4>
                                        <div class="start">
                                            <?php
                                                for($j = 0; $j < (int)$tongsao; $j++){
                                                    echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                                                }
                                            ?>
                                        </div>
                                        <div><i class="glyphicon glyphicon-user"></i>&nbsp;<?php echo count($rate['data']);  ?></div>
                                    </div>
                                    <div class="lists">
                                        <?php
                                            for($i = 0; $i < count($rate['data']); $i++){
                                                $rater = GetUserByID($rate['data'][$i]['id_user']);
                                        ?>
                                        <div class="item mar-b-15">
                                            <div class="avatar small-avatar">
                                                <img src="<?php echo $rater['avatar'] ?>">
                                            </div>
                                            <div class="content">
                                                <p><?php echo $rater['name'] ?></p>
                                                <p class="start">
                                                    <?php
                                                        for($j = 0; $j < (int)$rate['data'][$i]['sosao']; $j++){
                                                            echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                                                        }
                                                    ?>
                                                </p>
                                                <p><?php echo $rate['data'][$i]['noidung']; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                    <?php
                                        }
                                    ?>
                                    </div>         
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h1 class="mar-t-0 mar-b-25">Sản phẩm tương tự</h1>
                            <?php
                                $rand_products = GetRandomProductByIdCategory($data['id_danhmuc'],2);
                                foreach($rand_products as $rand_product){
                            ?>
                            <div class="item mar-b-25 pad-r-5">
                                <div class="">
                                    <div class="row d-flex">
                                        <div class="col-sm-4 dis-inline pad-x-0">
                                            <a href="chi-tiet.php?id_product=<?php echo $rand_product['id_product'] ?>" class="img">
                                                <img class="app-icon-img image-logo-ref" src="<?php echo $rand_product['image_logo'] ?>" >
                                            </a>
                                        </div>
                                        <div class="col-sm-8">
                                            <h4><a class="link-decor-none" href="chi-tiet.php?id_product=<?php echo $rand_product['id_product'] ?>"><?php echo $rand_product['name'] ?></a></h4>
                                            <p class="mar-y-0"><?php echo GetCategoryByID($rand_product['id_danhmuc'])['tendanhmuc']; ?></p>
                                            <p><?php echo GetDevByID($rand_product['id_developer'])['dev_name'] ?></p>
                                            <div class="footer d-flex">
                                            <?php
                                                $rate = GetRateByProductId($rand_product['id_product']);

                                                if($rate['code'] != 0){
                                                    echo "<h5>".$rate['message']."</h5>";
                                                }
                                                else{
                                                    $tongsao = 0;
                                                    for($j = 0; $j < count($rate['data']); $j++){
                                                        $tongsao += (int)$rate['data'][$j]['sosao'];
                                                    }
                                                    $tongsao = $tongsao/count($rate['data']);
                                                
                                            ?>
                                            <div class="start">
                                                <?php
                                                        for($k = 0; $k < (int)$tongsao; $k++){
                                                            echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                                                        }
                                                ?>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include('footer.php');
    ?>
    <script src="./libs/main.js"></script>
</body>
</html>