<header class="header_section">
    <div>
        <nav class="navbar navbar-expand-lg custom_nav-container" style="padding-left: 2%;" >
            <a class="navbar-brand" href="index.php?act=home">
                <span>
                    <img width=65 src="content/images/logo.png" alt="">
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=home">Trang Chủ<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=gioithieu">Giới Thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=sanpham">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=hotro">Hỗ Trợ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=lienhe">Liên Hệ</a>
                    </li>
                </ul>
                <div class="user_optio_box" style="margin-right:2%">
                    <?php
                if(isset($_SESSION['users_id'])){
                  $user = new user();
                  $user_list = $user->getByID($_SESSION['users_id']);
                
                    ?>
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <?=$user_list['username']?>
                        </button>
                        <div class="dropdown-menu">
                            <a href="index.php?act=profile" class="dropdown-item">My Profile</a>
                            <a href="index.php?act=dangxuat" class="dropdown-item">Đăng Xuất</a>
                        </div>
                    </div>
                    <?
                }else{
                    ?>
                    <a href="index.php?act=dangnhap"><img width=40 src="content/images/profile.png" alt="">
                    <?
                }
                    ?>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
<style>
.dropdown-item{
    width: 85%;
} 
</style>