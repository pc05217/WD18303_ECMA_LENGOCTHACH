<?
    ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Thông Tin Cá Nhân</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="../content/css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- font awesome style -->
    <link href="../content/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../content/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../content/css/responsive.css" rel="stylesheet" />

</head>

<style>
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}

.me-2 {
    margin-right: .5rem !important;
}
</style>

<body class="sub_page">

    <div class="hero_area">
        <?
      include 'includes/nav.php';
    ?>

        <?php
        $user_id = $_SESSION['users_id'];
        $db = new user();
        $sql = $db -> getList_user($user_id);

    ?>
        <?php
        $fullname_error ="";
        $email_error = "";
        $phone_error = "";
        $address_error = "";
        if(isset($_POST['thaydoi'])){
            $full_name = $_POST['fullname'];
            $email_us = $_POST['email'];
            $phone_us = $_POST['phone'];
            $address_us = $_POST['address'];
            if(empty($full_name)){
                $fullname_error = "Vui lòng nhập Họ Tên";
            }
            if(empty($email_us)){
                $email_error = "Vui lòng nhập email";
            }else{
                if(!filter_var($email_us, FILTER_VALIDATE_EMAIL)){
                    $email_error = "Vui lòng nhập email đúng định dạng";
                }
            }
            if(empty($phone_us)){
                $phone_error = "Vui lòng nhập số điện thoại";
            }else{
                if(!is_numeric($phone_us)){
                    $phone_error = "Vui lòng nhập số điện thoại đúng định dạng";
                }
                if(strlen($phone_us)>11){
                    $phone_error = "Vui lòng nhập đúng số điện thoại (10 số) ";
                }
            }
            if(empty($address_us)){
                $address_error = "Vui lòng nhập địa chỉ";
            }
            
        }
    ?>

    </div>
    <h2 style="text-align: center; margin-top: 2%; margin-bottom: -4%">Thông Tin Tài Khoản</h2>
    <section class="contact_section layout_padding">
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="content/images/profile.png" alt="Admin" class="rounded-circle p-1"
                                        width="110">
                                    <div class="mt-3">
                                        <h4><?=$sql['username']?></h4>
                                        <a href="index.php?act=doipass&id=<?=$_SESSION['users_id']?>">
                                            <button class="btn btn-outline-primary">Đổi Mật Khẩu</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <form method="POST">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Họ và Tên</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="fullname" class="form-control"
                                                value="<?=$sql['fullname']?>">
                                            <span style="color:red; font-size: 17px "><?php echo "<i>$fullname_error</i>"; echo '</br>';?></span>    
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="email" class="form-control"
                                                value="<?=$sql['Email']?>">
                                            <span style="color:red; font-size: 17px "><?php echo "<i>$email_error</i>"; echo '</br>';?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Số Điện Thoại</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="phone" class="form-control"
                                                value="<?=$sql['phone']?>">
                                            <span style="color:red; font-size: 17px "><?php echo "<i>$phone_error</i>"; echo '</br>';?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Địa Chỉ</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="address" class="form-control"
                                                value="<?=$sql['address']?>">
                                            <span style="color:red; font-size: 17px "><?php echo "<i>$address_error</i>"; echo '</br>';?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <button type="submit" class="btn btn-outline-primary" name="thaydoi">Thay
                                                Đổi</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="username" class="form-control"
                                        value="<?=$sql['username']?>">
                                    <input type="hidden" name="permissions" class="form-control" value="user">
                                    <input type="hidden" name="password" class="form-control"
                                        value="<?=$sql['password']?>">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->


    <!-- info section -->
    <?php
      include "includes/footer.php"
  ?>

    <!-- end info_section -->

    <!-- jQery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>
<?php
    $db = new user();
    if (isset($_POST['thaydoi'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $permissions = $_POST['permissions'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $id = $_SESSION['users_id'];
        if (!empty ($fullname) && !empty ($username) && !empty ($password)
        && !empty ($email) && !empty ($phone) && !empty ($address)) {
            $db-> update($id, $username, $password, $fullname, $email, $permissions, $address, $phone);
            header("location: index.php?act=profile");
        } 
    }
?>
<?
    ob_end_flush();
?>