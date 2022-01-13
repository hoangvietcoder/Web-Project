    <nav class="navbar navbar-default navbar-fixed-top pad-b-10 nav-shadow">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand font-sz-40 mar-t-10 mar-l-0" href="trang-chu.php">I-STORE</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <form action="search-page.php" class="form-inline my-2 my-lg-0">
                    <input name="key" class="form-control mr-sm-2 search-bar-custom pad-l-25" type="search" placeholder="Search">
                    <button class="btn my-2 my-sm-0 mar-t-15 search-button" type="submit"><i class="fas fa-search font-sz-15 text-gray-6"></i></button>
                </form>
                <?php
                    if(!isset($_SESSION['id_user'])){
                ?>
                <a href="login.php">
                    <button  class="btn btn-primary font-sz-15 get-login-btn">Đăng nhập</button>
                </a>
                <?php
                    }
                    else{
                ?>
                <div class='dis-inline-flex get-login-btn'> 
                    <a class="nav-link dropdown-toggle mar-t-10 dis-content logout-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <p class="mr-2 d-none d-lg-inline font-sz-15 text-gray-7 mar-t-10"><?php echo $user['name'] ?></p>
                        <img class="user-avatar-medium mar-l-10  mar-t-10" src="<?php echo $user['avatar'] ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item-custom logout-link" href="profile.php">
                            <i class="fas fa-user fa-sm fa-fw mar-r-10 text-gray-4"></i>
                                Profile
                        </a>
                        <?php
                            if($user['role'] == 'developer' || $user['role'] == 'admin'){
                        ?>
                        <a class="dropdown-item-custom logout-link" href="dev/developer.php">
                            <i class="fab fa-dev mar-r-10 text-gray-4"></i>
                                Developer
                        </a>
                        <?php
                            }
                        ?>
                        <?php
                            if($user['role'] == 'admin'){
                        ?>
                        <a class="dropdown-item-custom logout-link" href="admin/admin.php">
                            <i class="fas fa-user-shield mar-r-10 text-gray-4"></i>
                                Admin
                        </a>
                        <?php
                            }
                        ?>
                        <div class="dropdown-divider-custom"></div>
                        <a class="dropdown-item-custom logout-link" href="logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-4"></i>
                                Logout
                        </a>
                    </div>
                </div>
                
                <?php
                    }
                ?>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    