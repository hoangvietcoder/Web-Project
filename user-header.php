                <nav class="navbar navbar-expand bg-white topbar static-top shadow">
                    <!-- Topbar Navbar -->
                    <a class="navbar-brand font-sz-25 mar-l-25 text-gray-6" href="trang-chu.php">I-STORE</a>
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline font-sz-15 text-gray-7"><?php echo $data['name'] ?></span>
                                <img class="user-avatar-small" src="<?php echo $data['avatar'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="trang-chu.php">
                                    <i class="fas fa-home text-gray-4"></i>
                                        Cửa hàng
                                </a>
                                <?php
                                    if($data['role'] == 'developer' || $data['role'] == 'admin'){
                                ?>
                                <a class="dropdown-item" href="dev/developer.php">
                                    <i class="fab fa-dev mar-r-10 text-gray-4"></i>
                                        Developer
                                </a>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($data['role'] == 'admin'){
                                ?>
                                <a class="dropdown-item" href="admin/admin.php">
                                    <i class="fas fa-user-shield mar-r-10 text-gray-4"></i>
                                        Admin
                                </a>
                                <?php
                                    }
                                ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-4"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>