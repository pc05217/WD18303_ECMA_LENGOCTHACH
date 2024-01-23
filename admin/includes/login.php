<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        ADMIN LOGIN
    </title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="../admin/content/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../admin/content/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="content/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">
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
                    $_SESSION['admin'] = $username;
                    header("location: index.php?act=users&page=list");
                }else{
                    $not_admin = "Bạn Nhập Sai Tài Khoản hoặc Mật Khẩu hoặc Bạn không phải là ADMIN!";
                }
            }
        }
        
    ?>
    <div class="container position-sticky z-index-sticky top-0">
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('./content/images/background.png');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-body" style="text-align: center;">
                                <h2 style="text-align: center; color: rgb(243, 42, 42);">LOGIN</h2>
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
                                </form>
                                <span class = "mb-3" style="color:red; font-size: 18px;  margin-top:-5%;"><?php echo "<b><i>$not_admin</i></b>"; ?></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </main>
</body>
</html>
