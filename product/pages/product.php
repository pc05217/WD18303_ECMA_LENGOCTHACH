<?php

    class product{
    var $id = null;
    var $name = null;
    var $price = null;
    var $quantity = null;
    var $mota = null;
    var $category_id = null;
    var $img = null;
    var $query = null;

    
    public function getList(){
        $db = new connect ();
        $sql = 'SELECT  * FROM products';
        $result = $db -> pdo_query($sql);
        return $result;
    }

    //lấy một dòng dữ liệu của bảng dựa trên id
    public function getByID($id){
        $db = new connect();
        $query ="SELECT * FROM products WHERE id =".$id;
        $result = $db -> pdo_query_one($query);
        return $result;
    }

    // Hàm thêm mới
    public function add($name, $price, $quantity, $mota, $img, $category_id){
        $db = new connect();
        $query = "insert into products(name, price, quantity, mota, img, category_id) 
        values ('$name', '$price', '$quantity', '$mota', '$img', '$category_id')";
        $result = $db -> pdo_execute($query);
        return $result;
    }

    // Hàm cập nhật
    public function update($id, $name, $price, $quantity, $img, $mota, $category_id){
        $db = new connect();
        $query = "update products set name ='$name', price='$price', quantity='$quantity',
        `mota`='$mota', img='$img', category_id='$category_id' where id=".$id;
        $result = $db -> pdo_execute($query);
        return $result;
    }

    // Hàm xóa
    public function delete($id){
        $db = new connect();
        $query = "delete from products where id=".$id;
        $result = $db -> pdo_execute($query);
        return $result;
    }

    public function splienquan($query){
        $db = new connect ();
        $sql = 'SELECT  * FROM products WHERE category_id ='.$query['category_id'];
        $result = $db -> pdo_query($sql);
        return $result;
    }

}
?>