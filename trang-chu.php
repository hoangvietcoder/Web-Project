<?php
    session_start();
    require_once('dbconnection.php');
    $user = "";
    if(isset($_SESSION['id_user'])){
        $userId = $_SESSION['id_user'];
        $user = GetUserProfileById($userId);
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang chủ</title>
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
                <div class="col-sm-10">
                <!---->
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href="chi-tiet.php?id_product=14">
                                <img class="carousel-image" src="resources/images/app14_big.jpg" alt="Carousel image">
                                <div class="carousel-caption">
                                    <h3>Candy crush soda saga</h3>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="chi-tiet.php?id_product=5">
                                <img class="carousel-image" src="resources/images/app5_big.jpg" alt="Carousel image">
                                <div class="carousel-caption">
                                    <h3>TikTok</h3>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                        <img class="carousel-image" src="resources/images/app49_big.png" alt="Carousel image">
                        <div class="carousel-caption">
                            <h3>Game nhái Liên Quân</h3>
                        </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                    </div> <!-- Carousel -->
                    <!---->
                    <div class="main-content">
                        <div class="lists">
                            <div class="page-header">
                                <h1>Game mới<a href="category-product.php?id_danhmuc=1" class="btn btn-danger">Xem thêm</a></h1>
                            </div>
                            <div class="page-content">
                                <div class="lists-content">
                                <?php
                                    $data =  GetNewProductByIdCategory(1);
                                    $n = 0;
                                    if(count($data) >= 4){
                                        $n = 4;
                                    }
                                    else{
                                        $n = count($data);
                                    }
                                    for($i = 0; $i < $n; $i++){
                                ?>
                                    <div class="item mar-auto">
                                        <a href="chi-tiet.php?id_product=<?php echo $data[$i]['id_product'] ?>" class="img">
                                            <img class="app-icon-img" src="<?php echo $data[$i]['image_logo'] ?>" >
                                        </a>
                                        <h4 class="title"><a href="chi-tiet.php?id_product=<?php echo $data[$i]['id_product'] ?>"><?php echo $data[$i]['name'] ?></a></h4>
                                        <div class="desc"><?php echo GetCategoryByID($data[$i]['id_danhmuc'])['tendanhmuc'] ?></div>
                                        <div class="desc"><?php echo GetDevByID($data[$i]['id_developer'])['dev_name'] ?></div>
                                        <div class="footer d-flex">
                                            <?php
                                                $rate = GetRateByProductId($data[$i]['id_product']);

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
                                        <?php
                                            $prc = '';
                                            if($data[$i]['price'] == 0){
                                                $prc = 'Miễn phí';
                                            }
                                            else{
                                                $prc = number_format($data[$i]['price']).' đ';
                                            }
                                        ?>
                                        <p class="desc">Lượt tải: <?php echo $data[$i]['downloads'] ?></p>
                                        <p class="price"><?php echo $prc ?></p>
                                    </div>
                                <?php 
                                    }   
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="lists">
                            <div class="page-header">
                                <h1>Mạng xã hội phổ biến<a href="category-product.php?id_danhmuc=2" class="btn btn-danger">Xem thêm</a></h1>
                            </div>
                            <div class="page-content">
                                <div class="lists-content">
                                    <?php
                                        $data =  GetPopularProductByIdCategory(2);
                                        $n = 0;
                                        if(count($data) >= 4){
                                            $n = 4;
                                        }
                                        else{
                                            $n = count($data);
                                        }
                                        for($i = 0; $i < $n; $i++){
                                    ?>    
                                    <div class="item mar-auto">
                                        <a href="chi-tiet.php?id_product=<?php echo $data[$i]['id_product'] ?>" class="img">
                                            <img class="app-icon-img" src="<?php echo $data[$i]['image_logo'] ?>" >
                                        </a>
                                        <h4 class="title"><a href="chi-tiet.php?id_product=<?php echo $data[$i]['id_product'] ?>"><?php echo $data[$i]['name'] ?></a></h4>
                                        <div class="desc"><?php echo GetCategoryByID($data[$i]['id_danhmuc'])['tendanhmuc'] ?></div>
                                        <div class="desc"><?php echo GetDevByID($data[$i]['id_developer'])['dev_name'] ?></div>
                                        <div class="footer d-flex">
                                            <?php
                                                $rate = GetRateByProductId($data[$i]['id_product']);

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
                                        <?php
                                            $prc = '';
                                            if($data[$i]['price'] == 0){
                                                $prc = 'Miễn phí';
                                            }
                                            else{
                                                $prc = number_format($data[$i]['price']).' đ';
                                            }
                                        ?>
                                        <p class="desc">Lượt tải: <?php echo $data[$i]['downloads'] ?></p>
                                        <p class="price"><?php echo $prc ?></p>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="lists">
                            <div class="page-header">
                                <h1>Ứng dụng văn phòng<a href="category-product.php?id_danhmuc=3" class="btn btn-danger">Xem thêm</a></h1>
                            </div>
                            <div class="page-content">
                                <div class="lists-content">
                                <?php
                                    $data =  GetProductByIdCategory(3);
                                    $n = 0;
                                    if(count($data) >= 4){
                                        $n = 4;
                                    }
                                    else{
                                        $n = count($data);
                                    }
                                    for($i = 0; $i < $n; $i++){
                                ?>
                                   <div class="item mar-auto">
                                        <a href="chi-tiet.php?id_product=<?php echo $data[$i]['id_product'] ?>" class="img">
                                            <img class="app-icon-img" src="<?php echo $data[$i]['image_logo'] ?>" >
                                        </a>
                                        <h4 class="title"><a href="chi-tiet.php?id_product=<?php echo $data[$i]['id_product'] ?>"><?php echo $data[$i]['name'] ?></a></h4>
                                        <div class="desc"><?php echo GetCategoryByID($data[$i]['id_danhmuc'])['tendanhmuc'] ?></div>
                                        <div class="desc"><?php echo GetDevByID($data[$i]['id_developer'])['dev_name'] ?></div>
                                        <div class="footer d-flex">
                                            <?php
                                                $rate = GetRateByProductId($data[$i]['id_product']);

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
                                        <?php
                                            $prc = '';
                                            if($data[$i]['price'] == 0){
                                                $prc = 'Miễn phí';
                                            }
                                            else{
                                                $prc = number_format($data[$i]['price']).' đ';
                                            }
                                        ?>
                                        <p class="desc">Lượt tải: <?php echo $data[$i]['downloads'] ?></p>
                                        <p class="price"><?php echo $prc?></p>
                                    </div>
                                <?php
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="lists">
                            <div class="page-header">
                                <h1>Mua sắm thả ga<a href="category-product.php?id_danhmuc=4" class="btn btn-danger">Xem thêm</a></h1>
                            </div>
                            <div class="page-content">
                                <div class="lists-content">
                                <?php
                                    $data =  GetProductByIdCategory(4);
                                    $n = 0;
                                    if(count($data) >= 4){
                                        $n = 4;
                                    }
                                    else{
                                        $n = count($data);
                                    }
                                    for($i = 0; $i < $n; $i++){
                                ?>
                                   <div class="item mar-auto">
                                        <a href="chi-tiet.php?id_product=<?php echo $data[$i]['id_product'] ?>" class="img">
                                            <img class="app-icon-img" src="<?php echo $data[$i]['image_logo'] ?>" >
                                        </a>
                                        <h4 class="title"><a href="chi-tiet.php?id_product=<?php echo $data[$i]['id_product'] ?>"><?php echo $data[$i]['name'] ?></a></h4>
                                        <div class="desc"><?php echo GetCategoryByID($data[$i]['id_danhmuc'])['tendanhmuc'] ?></div>
                                        <div class="desc"><?php echo GetDevByID($data[$i]['id_developer'])['dev_name'] ?></div>
                                        <div class="footer d-flex">
                                            <?php
                                                $rate = GetRateByProductId($data[$i]['id_product']);

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
                                        <?php
                                            $prc = '';
                                            if($data[$i]['price'] == 0){
                                                $prc = 'Miễn phí';
                                            }
                                            else{
                                                $prc = number_format($data[$i]['price'],0,',').' '.'đ';
                                            }
                                        ?>
                                        <p class="desc">Lượt tải: <?php echo $data[$i]['downloads'] ?></p>
                                        <p class="price"><?php echo $prc?></p>
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
        </div>
    </div>
    <?php
        require_once('footer.php');
    ?>
</body>
</html>