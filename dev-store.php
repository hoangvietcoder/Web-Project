<?php
    session_start();
    require_once('dbconnection.php');
    $user = "";
    if(isset($_SESSION['id_user'])){
        $userId = $_SESSION['id_user'];
        $user = GetUserProfileById($userId);
    }
    if(isset($_GET['id_developer'])){
        $id_developer = $_GET['id_developer'];
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
    <div class="container-fluid mar-t-50">
        <div class="row">
            <div class="col-sm-2">
                <?php
                    include('sidebar.php');
                ?>
            </div>
            <div class="col-sm-10">
                <div class="box-breadcrumb mar-t-25">
                    <ol class="breadcrumb">
                        <li><a href="trang-chu.php">Trang chủ</a></li>
                        <li class="active">dev-store</li>
                    </ol>
                </div>
                <h2 class="category-title"><?php echo GetDevByID($id_developer)['dev_name']."'s products"; ?></h2>
                <hr class="mar-y-25">
                <div class="main-content mar-t-50">
                    <?php
                        $products = GetDevAppByState($id_developer, 'publish')['data'];
                        $item_count = 0;
                        $item_column = 0;

                        while($item_count < count($products)){
                    ?>
                        <div class="lists mar-b-25">
                            <div class="page-content">
                                <div class="lists-content">
                                    <?php
                                        if(count($products) - $item_count >= 4){
                                            $item_column = 4;
                                        }
                                        else{
                                            $item_column = count($products) - $item_count;
                                        }
                                        for($column = 0; $column < $item_column; $column++){
                                    ?>
                                    <!-- -->
                                    <div class="item mar-auto">
                                        <a href="chi-tiet.php?id_product=<?php echo $products[$item_count]['id_product'] ?>" class="img">
                                            <img class="app-icon-img" src="<?php echo $products[$item_count]['image_logo'] ?>" >
                                        </a>
                                        <h4 class="title pad-y-10"><a href="chi-tiet.php?id_product=<?php echo $products[$item_count]['id_product'] ?>"><?php echo $products[$item_count]['name'] ?></a></h4>
                                        <div class="desc"><?php echo GetCategoryByID($products[$item_count]['id_danhmuc'])['tendanhmuc'] ?></div>
                                        <div class="desc"><?php echo GetDevByID($products[$item_count]['id_developer'])['dev_name'] ?></div>
                                        <div class="footer d-flex">
                                            <?php
                                                $rate = GetRateByProductId($products[$item_count]['id_product']);
                                                if($rate['code'] != 0){
                                                    echo "<h5>".$rate['message']."</h5>";
                                                }
                                                else{
                                                    $tongsao = 0;
                                                    for($s = 0; $s < count($rate['data']); $s++){
                                                        $tongsao += (int)$rate['data'][$s]['sosao'];
                                                    }
                                                    $tongsao = $tongsao/count($rate['data']);
                                            ?>
                                            <div class="start mar-y-10">
                                                <?php
                                                    for($d = 0; $d < (int)$tongsao; $d++){
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
                                            if($products[$item_count]['price'] == 0){
                                                $prc = 'Miễn phí';
                                            }
                                            else{
                                                $prc = number_format($products[$item_count]['price']).' '.'đ';
                                            }
                                        ?>
                                        <p class="desc">Lượt tải: <?php echo $products[$item_count]['downloads'] ?></p>
                                        <p class="price"><?php echo $prc ?></p>
                                    </div>
                                    <!-- -->
                                    <?php
                                            $item_count++;
                                        }
                                    ?>
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
    <?php
        include('footer.php');
    ?>
</body>
</html>