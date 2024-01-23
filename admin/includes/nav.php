<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.php?act=users&page=list" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>LNT ADMIN</h3>
        </a>
        <div class="navbar-nav w-100">
            <a href="index.php?act=users&page=list" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Người
                Dùng</a>
            <a href="index.php?act=products&page=list" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Sản
                Phẩm</a>
            <a href="index.php?act=comment&page=list" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Comment</a>
            <a href="index.php?act=categories&page=list" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Danh
                Mục</a>
            <a href="index.php?act=bieudo" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Biểu Đồ</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->


<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="content/images/avatar.jpg" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex"><?=$_SESSION['admin']?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    <a href="index.php?act=dangxuat" class="dropdown-item">Đăng Xuất</a>
                </div>
            </div>
        </div>
    </nav>