<?php

class user {
    var $id = null;
    var $username = null;
    var $password = null;
    var $fullname = null;
    var $Email = null;
    var $permissions = null;
    var $avatar = null;
    var $address = null;
    var $phone = null;

    function getUser()
   {
      $db = new connect();
      $select = "select * from users";
      return $db->pdo_query($select);
   }

   function get_User($id)
   {
      $db = new connect();
      $select = "select * from users where id=".$id;
      return $db->pdo_query_one($select);
   }
   public function checkUser($username,$password) 
   { 
       $db = new connect();               
       $select="select * from users where username='$username' and password='$password'"; 
       $result = $db->pdo_query_one($select);
       if($result!=null) 
           return true; 
       else 
           return false; 
   }

   public function userid($username,$password) 
    { 
        $db = new connect();               
        $select="select id from users where username='$username' and password='$password'"; 
        $result = $db->pdo_query_one($select);
        return $result;
    }


    public function getList(){
        $db = new connect ();
        $sql = 'select * from users';
        $result = $db -> pdo_query($sql);
        return $result;
    }
    // lấy một dòng dữ liệu của bảng dựa trên id
    public function getByID($id){
        $db = new connect();
        $query ="SELECT * FROM users WHERE id =".$id;
        $result = $db -> pdo_query_one($query);
        return $result;
    }

    // Hàm thêm mới
    public function add($username, $password, $fullname, $Email, $permissions, $address, $phone){
        $db = new connect();
        $query = "insert into users(username, password, fullname, Email, permissions, address, phone) 
        values ('$username', '$password', '$fullname', '$Email', '$permissions', '$address', '$phone')";
        $result = $db -> pdo_execute($query);
        return $result;
    }

    // Hàm cập nhật
    public function update($id, $username, $password, $fullname, $Email, $permissions, $address, $phone){
        $db = new connect();
        $query = "update users set username ='$username', password='$password', fullname='$fullname',
        Email='$Email', permissions='$permissions', address='$address', phone='$phone' where id=".$id;
        $result = $db -> pdo_execute($query);
        return $result;
    }

    // Hàm xóa
    public function delete($id){
        $db = new connect();
        $query = "delete from users where id=".$id;
        $result = $db -> pdo_execute($query);
        return $result;
    }

    public function getList_user($id){
        $db = new connect ();
        $sql = 'select * from users where id='.$id;
        $result = $db -> pdo_query_one($sql);
        return $result;
    }

    public function update_pass($id, $password){
        $db = new connect();
        $query = "update users set password='$password' where id=".$id;
        $result = $db -> pdo_execute($query);
        return $result;
    }
}
?>