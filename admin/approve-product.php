<?php
    require_once('../dbconnection.php');
    $user = "";
    if(isset($_SESSION['id_user'])){
        $userId = $_SESSION['id_user'];
        $user = GetUserProfileById($userId);
    }
?>
<main>
    <div class="card mb-4">
        <div class="card-header">
            Danh sách ứng dụng
        </div>
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row" style="clear: both;">
                <div class="card-body">
                    <div class="table-responsive">

                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable w-100" id="dataTable" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                                <thead>
                                    <tr role="row">
                                        <th tabindex="0" rowspan="1" colspan="1" class="w-5">ID</th>
                                        <th tabindex="0" rowspan="1" colspan="1" class="w-10">Icon ứng dụng</th>
                                        <th tabindex="0" rowspan="1" colspan="1" class="w-15">Tên ứng dụng</th>
                                        <th tabindex="0" rowspan="1" colspan="1" class="w-10">Danh mục</th>
                                        <th tabindex="0" rowspan="1" colspan="1" class="w-10">Thể loại</th>
                                        <th tabindex="0" rowspan="1" colspan="1" class="w-10">Giá</th>
                                        <th tabindex="0" rowspan="1" colspan="1" class="w-10">File Upload</th>
                                        <th tabindex="0" rowspan="1" colspan="1" class="w-10">Trạng thái</th>
                                        <th tabindex="0" rowspan="1" colspan="1" class="w-25">Tùy chỉnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $products = GetProductByState('wait');
                                        if($products['code'] == 0){
                                            foreach ($products['data'] as $product) { 
                                    ?>
                                        <tr role="row" class="odd">
                                            <td><?php echo $product['id_product']; ?></td>
                                            <td><?php echo $product['image_logo']; ?></td>
                                            <td><?php echo $product['name']; ?></td>
                                            <td><?php echo GetCategoryByID($product['id_danhmuc'])['tendanhmuc']; ?></td>
                                            <td>
                                                <?php 
                                                    $theloai = GetTypeProductById($product['id_product']);
                                                    if($theloai['code'] == 0){
                                                        for($type_count = 0; $type_count < count($theloai['data'])-1; $type_count++){
                                                            echo $theloai['data'][$type_count]['tentheloai'].", ";
                                                        }
                                                        echo $theloai['data'][count($theloai['data'])-1]['tentheloai'].".";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo number_format($product['price'],0,','); ?></td>
                                            <td><?php echo $product['file']; ?></td>
                                            <td><?php echo $product['state']; ?></td>
                                            <td class="project-actions text-center align-middle">
                                                <a class="btn btn-info btn-sm mr-3" href="../dev/product-state-change.php?id_product=<?php echo $product['id_product']; ?>&state=checked">
                                                    <i class="far fa-check-circle"></i> Chấp nhận
                                                </a>
                                                <a href="../dev/product-state-change.php?id_product=<?php echo $product['id_product']; ?>&state=reject" class="btn btn-danger btn-sm">
                                                    <i class="far fa-times-circle"></i> Từ chối
                                                </a>
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                        } 
                                        ?>
                                </tbody>
                            </table>
                            <!---->
                            <?php
                                if(isset($_GET['id_delete'])){
                                    $delete = GetProductByID($_GET['id_delete']);      
                                    include('../delete-panel.php');
                                }
                            ?>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>