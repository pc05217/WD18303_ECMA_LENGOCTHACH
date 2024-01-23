<?php
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

    <title>Đăng Ký</title>

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="../admin/content/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../admin/content/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="content/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>


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
    <link rel="stylesheet" href="./content/css/user.css">


</head>

<body>
    <?php
    $fullname_error ="";
    $username_error = "";
    $password_error = "";
    $email_error = "";
    $phone_error = "";
    $address_error = "";
    if(isset($_POST['them'])){
        $full_name = $_POST['fullname'];
        $user_name = $_POST['username'];
        $pass_word = $_POST['password'];
        $email_us = $_POST['email'];
        $phone_us = $_POST['phone'];
        $address_us = $_POST['address'];
        if(empty($full_name)){
            $fullname_error = "Vui lòng nhập Họ Tên";
        }
        if(empty($user_name)){
            $username_error = "Vui lòng nhập Tên Tài Khoản";
        }
        if(empty($pass_word)){
            $password_error = "Vui lòng nhập Mật Khẩu";
        }
        if(empty($email_us)){
            $email_error = "Vui lòng nhập Email";
        }else{
            if(!filter_var($email_us,FILTER_VALIDATE_EMAIL)){
                $email_error = "Vui lòng nhập email đúng định dạng";
            }
        }
        if(empty($phone_us)){
            $phone_error = "Vui lòng nhập Số Điện Thoại";
        }else{
            if(!is_numeric($phone_us)){
                $phone_error = "Vui lòng nhập số điện thoại đúng định dạng";
            }
            if(strlen($phone_us)>11){
                $phone_error = "Vui lòng nhập đúng số điện thoại (10 số) ";
            }
        }
        if(empty($address_us)){
            $address_error = "Vui lòng nhập Địa Chỉ";
        }
        
    }
?>
    <?php
      include 'includes/nav.php';
    ?>
    <div class="container1">
        <div class="login-box" style=" background-image: url(content/images/backgroud_crud.png);">
            <h2 class="mb-5">ĐĂNG KÝ TÀI KHOẢN</h2>
            <form class="login-register" method="post">
            <input class="form-control" type="text" placeholder="Họ Và Tên" name="fullname" value="<? echo (!empty ($_POST ["fullname"])) ? $_POST ["fullname"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:red; font-size: 17px "><?php echo "<i>$fullname_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="text" placeholder="Tài Khoản..." name="username" value="<? echo (!empty ($_POST ["username"])) ? $_POST ["username"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:red;"><?php echo "<i>$username_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="password" placeholder="Mật Khẩu..." name="password" value="<? echo (!empty ($_POST ["password"])) ? $_POST ["password"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:red;"><?php echo "<i>$password_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="text" placeholder="Email" name="email" value="<? echo (!empty ($_POST ["email"])) ? $_POST ["email"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:red;"><?php echo "<i>$email_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="text" placeholder="Số điện thoại" name="phone" value="<? echo (!empty ($_POST ["phone"])) ? $_POST ["phone"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:red;"><?php echo "<i>$phone_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="text" placeholder="Địa chỉ" name="address" value="<? echo (!empty ($_POST ["address"])) ? $_POST ["address"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:red;"><?php echo "<i>$address_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="hidden" name="permissions" value="user"
                    style="width: 900px; height:45px"><br>
                <div class="btn-submit">
                    <a href="/index.php?act=dangnhap" type="button" class="btn btn-secondary">Hủy</a>
                    <button class="btn btn-success" name="them">Đăng Ký</button>
                </div>
            </form>
        </div>
    </div>

    <!-- end about section -->


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
    if (isset($_POST['dangky'])) {
        $db = new user();
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $permissions = $_POST['permissions'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        if (!empty ($fullname) && !empty ($username) && !empty ($password)
        && !empty ($email) && !empty ($phone) && !empty ($address)) {
            $db-> add($username, $password, $fullname, $email, $permissions, $address, $phone);
            $user = new user();
            $result = $user->userid($username, $password);
            $_SESSION['users_id'] = $result['id'];
            header("location: index.php?act=home");
        } 
        
    }
?>
<?php
    ob_end_flush();
?>