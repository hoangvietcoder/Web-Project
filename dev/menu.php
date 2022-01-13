<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="developer.php?select=developer">
        <div class="sidebar-brand-text mx-3">DEVELOPER</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="developer.php?select=developer">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý ứng dụng</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="developer.php?select=draft">Bản nháp</a>
                <a class="collapse-item" href="developer.php?select=wait">Đang chờ duyệt</a>
                <a class="collapse-item" href="developer.php?select=checked">Đã được duyệt</a>
                <a class="collapse-item" href="developer.php?select=publish">Đang phát hành</a>
                <a class="collapse-item" href="developer.php?select=stop">Dừng phát hành</a>
                <a class="collapse-item" href="developer.php?select=reject">Bị từ chối</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="developer.php?select=upload_product">
            <i class="fas fa-fw fa-folder"></i>
            <span>Đăng ứng dụng</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../dev-store.php?id_developer=<?php echo $user['id_user'] ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Cửa hàng của dev</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
