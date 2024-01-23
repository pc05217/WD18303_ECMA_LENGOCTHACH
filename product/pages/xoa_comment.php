<?php
    $product_id = $_GET['product_id'];
    $db = new comment();
    $db -> delete_detail_comment($_GET['detail_comment_id']);
    $db -> delete_comment($_GET['comment_id']);
    header("Location: index.php?act=product_detail&id=".$product_id);
?>