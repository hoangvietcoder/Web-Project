                            <div class="top-panel-dark product-delete-panel d-block">
                                <form action="product-delete.php" class="form-panel mx-auto panel-350 px-3 pt-4 w-25 mt-5 product-delete-form">
                                    <input type="text" name="id_user" value="<?php echo $user['id_user'] ?>" hidden>
                                    <h3 class="mb-4">Xóa sản phẩm</h3>
                                    <p class="text-left">Bạn có thật sự muốn xoá vĩnh viễn ứng dụng <strong><?php echo $delete['name']; ?></strong> không ?</p>
                                    <p class="text-left text-danger"><i class="fas fa-exclamation-circle mr-1"></i>Lưu ý: Một khi đã xóa thì sẽ không thể khôi phục được nữa!</p>
                                    <h6>Vui lòng nhập mật khẩu và bấm xác nhận.</h6>
                                    <input name="id_product" type="text" value="<?php echo $delete['id_product']; ?>" hidden>
                                    <div class="form-group">
                                        <input required class="form-control" placeholder="Mật khẩu" type="password" name="password">
                                    </div>
                                    <p>
                                        <?php
                                            if(isset($_GET['message'])){
                                                echo $_GET['message'];
                                            }
                                        ?>
                                    </p>
                                    <div class="d-flex justify-content-between mt-4">
                                        <button type="submit" class="btn btn-primary d-block w-100 mr-4 product-delete-submit">Xác nhận</button>
                                        <a class="link-decor-none" href="developer.php?select=upload_product">
                                            <button type="button" class="btn btn-danger d-block w-100 product-delete-close">Đóng</button>
                                        </a>
                                    </div>
                                </form>
                            </div>