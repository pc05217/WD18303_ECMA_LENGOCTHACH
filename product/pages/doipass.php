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

    <title>Liên Hệ</title>


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

<body class="sub_page">

    <div class="hero_area">
        <?
      include 'includes/nav.php';
    ?>
    <?php
    $id = $_GET['id'];
    $db = new user();
    $sql = $db -> get_User($id);
    $pass_success ="";
    $pass_error="";
    if(isset($_POST['doipass'])){
        $password_cu = $_POST['password_cu'];
        $password_moi = $_POST['password_moi'];
        if($password_cu==$sql['password']){
            $db -> update_pass($id, $password_moi);
            $pass_success ="Đổi mật khẩu thành công!";
        }else{
            $pass_error="Mật khẩu cũ không chính xác!";
        }
        
    }
    if(isset($_POST['huy'])){
        header('Location: index.php?act=profile');
    }
?>
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-70">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom" style="margin-top: 5%; margin-bottom: 5%">
                            <div class="card-body" style="text-align: center;">
                                <form role="form" class="text-start" method="POST">
                                    <div style='margin-bottom: 2%'>
                                        <div class="input-group input-group-outline">
                                            <input type="password" name="password_cu" placeholder="Nhập mật khẩu cũ" class="form-control">
                                        </div>
                                        <br>
                                        <div class="input-group input-group-outline">
                                            <input type="password" name="password_moi" placeholder="Nhập mật khẩu mới" class="form-control">
                                        </div>
                                        <div class="text-center">
                                        <button type="submit" name="doipass" style="background-color: green; color: white;" class="btn w-100 my-3 mb-2">Đổi Mật Khẩu</button>
                                        <button name="huy" style="background-color: gray; color: white;" class="btn w-100 mb-2">Hủy</button>
                                        </div>
                                        <span class = "mb-3" style="color:green; font-size: 18px;  
                                        margin-top:-5%;"><?php echo "<b><i>$pass_success</i></b>"; ?></span>
                                        <span class = "mb-3" style="color:red; font-size: 18px;  
                                        margin-top:-5%;"><?php echo "<b><i>$pass_error</i></b>"; ?></span>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </main>
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
    ob_end_flush();
?>