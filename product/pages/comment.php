<?php

class comment {
    var $id = null;
    var $noidung = null;
    var $product_id = null;
    var $user_id = null;
    var $cmt_id = null;

    public function getList(){
        $db = new connect ();
        $sql = 'select * from comment';
        $result = $db -> pdo_query($sql);
        return $result;
    }
    // lấy một dòng dữ liệu của bảng dựa trên id
    public function getByID($id){
        $db = new connect();
        $query ="SELECT * FROM comment WHERE id =".$id;
        $result = $db -> pdo_query_one($query);
        return $result;
    }

    // Hàm thêm mới
    public function add($noidung, $product_id){
        $db = new connect();
        $query = "insert into comment(noidung, product_id) 
        values ('$noidung', '$product_id')";
        $result = $db -> pdo_execute($query);
        return $result;
    }

    // Hàm xóa
    public function delete($id){
        $db = new connect();
        $query = "delete from comment where id=".$id;
        $result = $db -> pdo_execute($query);
        return $result;
    }

    public function demCMT () {
        $db = new connect () ;
        $sql = 'SELECT products.img as img, products.name as name, products.id as id,
        COUNT(comment.product_id) as sl
        FROM comment , detail_comment , products WHERE comment.id = detail_comment.cmt_id 
        and comment.product_id = products.id GROUP BY comment.product_id' ;
        $result = $db -> pdo_query ($sql) ;
        return $result ; 
    }


    public function getList_cmt($product_id){
        $db = new connect ();
        $sql = 'SELECT c.noidung as noidung, dcmt.user_id as user_id,  u.fullname as fullname, c.create_at as tg,
        c.id as comment_id, dcmt.id as detailcmt_id
        FROM comment c, products p, users u, detail_comment dcmt
        WHERE c.id=dcmt.cmt_id and dcmt.user_id=u.id and c.product_id=p.id and c.product_id ='.$product_id;
        $result = $db -> pdo_query($sql);
        return $result;
    }

    public function add_detail_domment($user_id, $cmt_id) {
        $db = new connect ();
        $sql = "insert into detail_comment(user_id, cmt_id) 
        values ('$user_id', '$cmt_id')";
        $result = $db -> pdo_query($sql);
        return $result;
    }

    public function getComMentID() {
        $db = new connect () ;
        $sql = "SELECT id FROM comment ORDER BY comment.id DESC LIMIT 1" ;
        $result = $db -> pdo_query($sql) ;
        return $result ; 
    }

    public function delete_detail_comment($id) {
        $db = new connect ();
        $sql = "delete from detail_comment where id=".$id;
        $result = $db -> pdo_query($sql);
        return $result;
    }

    public function delete_comment($id) {
        $db = new connect ();
        $sql = "delete from comment where id=".$id;
        $result = $db -> pdo_query($sql);
        return $result;
    }
}
?>