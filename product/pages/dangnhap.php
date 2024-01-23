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

    <title>Đăng Nhập</title>

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

</head>

<body>
<?php
        $username_error ="";
        $password_error ="";
        $not_admin ="";        
        if(isset($_POST['dangnhap'])){
            $user_name = $_POST['username'];
            $pass_word = $_POST['password'];
            if(empty($user_name)){
                $username_error ="Vui lòng nhập tên đăng nhập";
            }
            if(empty($pass_word)){
                $password_error ="Vui lòng nhập mật khẩu";
            }
            else{
                $username = $_POST['username'] ?? "";
                $password = $_POST['password'] ?? "";
                $user = new user();
                if ($user->checkUser($username, $password)) {
                    $result = $user->userid($username, $password);
                    $_SESSION['users_id'] = $result['id'];
                    header("location: index.php?act=home");
                }else{
                    $not_admin = "Bạn Nhập Sai Tài Khoản hoặc Mật Khẩu!";
                }
            }
        }
        
    ?>

    <!-- header section strats -->
    <?php
      include 'includes/nav.php';
    ?>

    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-70">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-body" style="text-align: center;">
                                <h2 style="text-align: center; color: rgb(243, 42, 42);">ĐĂNG NHẬP</h2>
                                <form role="form" class="text-start" method="POST">
                                    <div style = 'margin-bottom: 2%'>
                                        <div class="input-group input-group-outline">
                                            <input name="username" placeholder="Tài khoản" class="form-control" value="<? echo (!empty ($_POST ["username"])) ? $_POST ["username"]:false ; ?>">
                                        </div>
                                        <span class = "mb-3" style="color:red; font-size: 17px;  margin-top:-5% "><?php echo "<i>$username_error</i>"; ?></span>
                                    </div>
                                    <div style = 'margin-bottom: 2%'>
                                    <div class="input-group input-group-outline">
                                        <input type="password" name="password" placeholder="Mật Khẩu" class="form-control" value="<? echo (!empty ($_POST ["password"])) ? $_POST ["password"]:false ; ?>">
                                    </div>
                                    <span class = "mb-3" style="color:red; font-size: 17px; margin-top:-5%"><?php echo "<i>$password_error</i>";?></span>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="dangnhap" style="background-color: rgb(243, 42, 42); color: white;" class="btn w-100 my-4 mb-2">Đăng Nhập</button>
                                    </div>
                                    <p class=" text-sm text-center">
                                        Bạn chưa có tài khoản?
                                        <a href="index.php?act=dangky" class="text-primary text-gradient font-weight-bold">Đăng Ký</a>
                                    </p>
                                </form>
                                <span class = "mb-3" style="color:red; font-size: 18px;  margin-top:-5%;"><?php echo "<b><i>$not_admin</i></b>"; ?></span>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </main>

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
    ob_end_flush();
?>