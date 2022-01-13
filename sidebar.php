                    <div class="nav-sidebar-left pad-x-10 mar-t-10">
                        <h3>Danh mục sản phẩm</h3>
                        <ul class="">
                            <?php
                                $data = GetCategoryAll();
                                foreach($data as $danhmuc){
                            ?>
                            <li class="font-sz-15"><a class="sign-up-link" href="category-product.php?id_danhmuc=<?php echo $danhmuc['id_danhmuc']?>"><?php echo $danhmuc['tendanhmuc']?></a></a></li>
                            <hr class="dropdown-divider-custom">
                            <?php
                            }
                            ?>
                        </ul>
                    </div>