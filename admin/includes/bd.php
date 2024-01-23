<?php
    class bieudo{
        public function comment_thang1(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=1";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
        public function comment_thang2(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=2";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
        public function comment_thang3(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=3";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
        public function comment_thang4(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=4";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
        public function comment_thang5(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=5";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
        public function comment_thang6(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=6";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
        public function comment_thang7(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=7";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
        public function comment_thang8(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=8";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
        public function comment_thang9(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=9";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
        public function comment_thang10(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=10";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
        public function comment_thang11(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=11";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
        public function comment_thang12(){
            $db = new connect();
            $sql = "SELECT COUNT(noidung) as sl from comment where month(create_at)=12";
            $result = $db->pdo_query_one($sql);
        return $result;
        }
    }
?>