<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./content/css/list_users.css">
</head>
<?php
    $name_error = "";
    $price_error = "";
    $quantity_error = "";
    $img_error = "";
    if(isset($_POST['addsp'])){
        $namesp = $_POST['name'];
        $pricesp = $_POST['price'];
        $quantitysp = $_POST['quantity'];
        $imgsp = basename($_FILES['img']['name']);
        if(empty($namesp)){
            $name_error = "Vui lòng nhập tên sản phẩm";
        }
        if(empty($pricesp)){
            $price_error = "Vui lòng nhập giá sản phẩm";
        }else{
            if($pricesp<0){
                $price_error ="Giá sản phẩm phải lớn hơn 0!";
            }
        }
        if(empty($quantitysp)){
            $quantity_error = "Vui lòng nhập số lượng sản phẩm";
        }else{
            if($quantitysp<0){
                $quantity_error ="Số lượng sản phẩm phải lớn hơn 0!";
            }
        if(empty($imgsp)){
            $img_error = "Vui lòng nhập hình ảnh sản phẩm";
        }
        
    }}
?>
<body>
    <div class="container">
        <div class="login-box" style=" background-image: url(content/images/backgroud_crud.png);">
            <h2 class="mb-5">Thêm mới sản phẩm</h2>
            <form class="login-register" method="post" enctype="multipart/form-data">
                <input class="form-control" type="text" placeholder="Tên sản phẩm" name="name" value="<? echo (!empty ($_POST ["name"])) ? $_POST ["name"]:false ; ?>"
                 id="ten"style="width: 900px;">
                <span style="color:white; font-size: 17px"><?php echo "<i>$name_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="number" placeholder="Giá" name="price" value="<? echo (!empty ($_POST ["price"])) ? $_POST ["price"]:false ; ?>"
                 style="width: 900px;">
                <span style="color:white;"><?php echo "<i>$price_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="number" placeholder="Số Lượng" name="quantity" value="<? echo (!empty ($_POST ["quantity"])) ? $_POST ["quantity"]:false ; ?>"
                 style="width: 900px;">
                <span style="color:white;"><?php echo "<i>$quantity_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="file" placeholder="Chọn file" name="img" value="<? echo (!empty ($_POST ["img"])) ? $_POST ["img"]:false ; ?>"
                 style="width: 900px;">
                <span style="color:white;"><?php echo "<i>$img_error</i>"; echo '</br>';?></span>
                <input class="form-control" type="text" placeholder="Mô tả" name="mota" value="<? echo (!empty ($_POST ["mota"])) ? $_POST ["mota"]:false ; ?>"
                 style="width: 900px; height:70px"><br>
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
                    <button class="btn btn-success" name="addsp">Thêm</button>
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
    $dtb = new products();
    if (isset($_POST["addsp"])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $category_id = $_POST['category_id'];
        $mota = $_POST['mota'];
        $img = basename($_FILES['img']['name']);
        $image = new imge();
        $kk = 'img';
        $imagmove_imge = $image-> move_img($img);  
        // $duogndan_admin1 = 'content/images/';
        // $duongdan_product1 ='../product/content/images/';
        // $duogndan_admin2 = $duogndan_admin1.$img;
        // $duongdan_product2 = $duongdan_product1.$img;
        // move_uploaded_file($_FILES['img']['tmp_name'], $duogndan_admin2);
        // move_uploaded_file($_FILES['img']['tmp_name'], $duongdan_products2);
        if (!empty ($name) && !empty ($price) && !empty ($quantity)
        && !empty ($category_id) && !empty ($img)) {
            $dtb -> add($name, $price, $quantity, $mota, $img, $category_id);
            header("location: index.php?act=products&page=list");
        } 
    }
?>