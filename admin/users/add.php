<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Mới Người Dùng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./content/css/list_users.css">
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
            $username_error = "Vui lòng nhập username";
        }
        if(empty($pass_word)){
            $password_error = "Vui lòng nhập password";
        }
        if(empty($email_us)){
            $email_error = "Vui lòng nhập email";
        }else{
            if(!filter_var($email_us,FILTER_VALIDATE_EMAIL)){
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
    <div class="container">
        <div class="login-box" style=" background-image: url(content/images/backgroud_crud.png);">
            <h2 class="mb-5">Thêm Mới Người Dùng</h2>
            <form class="login-register" method="post">
                <input class="form-control" type="text" placeholder="Họ Và Tên" name="fullname" value="<? echo (!empty ($_POST ["fullname"])) ? $_POST ["fullname"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:white; font-size: 17px "><?php echo "<i>$fullname_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="text" placeholder="Tài Khoản..." name="username" value="<? echo (!empty ($_POST ["username"])) ? $_POST ["username"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:white;"><?php echo "<i>$username_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="password" placeholder="Mật Khẩu..." name="password" value="<? echo (!empty ($_POST ["password"])) ? $_POST ["password"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:white;"><?php echo "<i>$password_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="text" placeholder="Email" name="email" value="<? echo (!empty ($_POST ["email"])) ? $_POST ["email"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:white;"><?php echo "<i>$email_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="text" placeholder="Số điện thoại" name="phone" value="<? echo (!empty ($_POST ["phone"])) ? $_POST ["phone"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:white;"><?php echo "<i>$phone_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="text" placeholder="Địa chỉ" name="address" value="<? echo (!empty ($_POST ["address"])) ? $_POST ["address"]:false ; ?>"
                    style="width: 900px; height:45px">
                    <span style="color:white;"><?php echo "<i>$address_error</i>"; echo '</br>';?></span>
                <div class="pq_ns">
                    <div class="col-md-8">
                        <select class="form-select" name="permissions" required aria-label=".form-select-sm example">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
                <div class="btn-submit">
                    <a href="/index.php?act=users&page=list" type="button" class="btn btn-secondary">Hủy</a>
                    <button class="btn btn-success" name="them">Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
    $db = new user();
    if (isset($_POST['them'])) {
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
            header("location: index.php?act=users&page=list");
        } 
        
    }
?>