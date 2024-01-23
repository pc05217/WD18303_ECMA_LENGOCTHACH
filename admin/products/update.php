<?php
    $db = new products();
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $query = $db -> getByID($id);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./content/css/list_users.css">
</head>
<?php
    $name_error = "";
    $price_error = "";
    $quantity_error = "";
    $img_error = "";
    if(isset($_POST['editsp'])){
        $namesp = $_POST['name'];
        $pricesp = $_POST['price'];
        $quantitysp = $_POST['quantity'];
        $imgsp = $_POST['img'];
        if(empty($namesp)){
            $name_error = "Vui lòng nhập tên sản phẩm";
        }
        if(empty($pricesp)){
            $price_error = "Vui lòng nhập giá sản phẩm";
        }
        if(empty($quantitysp)){
            $quantity_error = "Vui lòng nhập số lượng sản phẩm";
        }
        if(empty($imgsp)){
            $img_error = "Vui lòng nhập hình ảnh sản phẩm";
        }
        
    }
?>
<body>
    <div class="container">
        <div class="login-box" style=" background-image: url(content/images/backgroud_crud.png);">
            <h2 class="mb-5">Cập nhật sản phẩm</h2>
            <form class="login-register" method="post">
                <input class="form-control" type="text" placeholder="Tên sản phẩm" name="name" value="<?=$query['name']?>" style="width: 900px; height:50px;">
                    <span style="color:red;"><?php echo "<b>$name_error</b>"; echo '</br>';?></span>
                <input class="form-control" type="number" placeholder="Giá" name="price" value="<?=$query['price']?>" style="width: 900px; height:50px;">
                    <span style="color:red;"><?php echo "<b>$price_error</b>"; echo '</br>';?></span>
                <input class="form-control" type="number" placeholder="Số Lượng" name="quantity" value="<?=$query['quantity']?>" style="width: 900px; height:50px;">
                    <span style="color:red;"><?php echo "<b>$quantity_error</b>"; echo '</br>';?></span>
                <input class="form-control" type="file" placeholder="Chọn file" name="img" value="<?=$query['img']?>" style="width: 900px;">
                    <span style="color:red;"><?php echo "<b>$img_error</b>"; echo '</br>';?></span>
                <input class="form-control" type="text" placeholder="Mô tả" value="<?=$query['mota']?>"
                    name="mota" style="width: 900px; height:50px;"> <br>
                <div class="col-md-12" style="margin-bottom: 20px;">
                    <select class="form-select" name="category_id" required aria-label=".form-select-sm example">
                        <?php
                            $db = new category();
                            $sql = $db -> getList();
                            foreach ($sql as $data) {
                                ?>
                                    <option value="<?=$data['id']?>"><?=$data['name']?></option>
                                <?
                            }
                        ?>
                    </select>
                </div>
                <div class="btn-submit">
                    <a href="/index.php?pages=products&action=list" type="button" class="btn btn-secondary">Hủy</a>
                    <button class="btn btn-success" name="sua">Thay Đổi</button>
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
    $db = new products();
    if (isset($_POST["sua"])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $category_id = $_POST['category_id'];
        $img = $_POST['img'];
        $id = $_GET['id'];
        $mota = $_POST['mota'];
        $db -> update($id, $name, $price, $quantity, $img, $mota, $category_id);
        header("location: index.php?act=products&page=list");
    }
?>