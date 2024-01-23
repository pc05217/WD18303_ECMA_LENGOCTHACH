<?php
session_start();
?>
<?php
    include "includes/pdo.php";
    include "users/user.php";
    include "products/products.php";
    include "categories/category.php";
    include "comment/comment.php";
    include "includes/bd.php";
    include "../image.php";
    $action = "home";
    if (isset($_GET['act']))
        $action = $_GET['act'];
    if (!isset($_SESSION['admin'])) {
        $action = "login";
    }
    switch ($action) {
        case "home":
            include 'users/list.php';
            break;
        case "bieudo":
            include 'includes/bieudo.php';
            break;
        case "login":
            include "includes/login.php";
            break;
        case "dangxuat":
            unset($_SESSION['admin']);
            header("location: index.php");
            break;  
        
        case "users":
            switch ($_GET['page']) {
                case 'list':
                    include 'users/list.php';
                    break;

                case 'add':
                    include 'users/add.php';
                    break;

                case 'delete':
                    include 'users/delete.php';
                    break; 
                    
                case 'update':
                    include 'users/update.php';
                    break; 
                
                default:
                    include 'users/list.php';
                    break;
            }break;

        case "categories":
            switch ($_GET['page']) {
                case 'list':
                    include 'categories/list.php';
                    break;

                case 'add':
                    include 'categories/add.php';
                    break;

                case 'delete':
                    include 'categories/delete.php';
                    break; 
                    
                case 'update':
                    include 'categories/update.php';
                    break; 
                
                default:
                    include 'categories/list.php';
                    break;
            }break;
            
        case 'products':
            switch ($_GET['page']) {
                case 'list':
                    include 'products/list.php';
                    break;

                case 'add':
                    include 'products/add.php';
                    break;

                case 'update':
                    include 'products/update.php';
                    break;
                
                case 'delete':
                    include 'products/delete.php';
                    break;
                
                default:
                    include 'products/list.php';
                    break;
            }
            break;
     
                
        case 'comment':
                    switch ($_GET['page']) {
                        case 'list':
                                include 'comment/list.php';
                                break;
        
                        case 'add':
                                include './comment/add.php';
                                break;
        
                        case 'edit':
                                include './comment/edit.php';
                                break;
                            
                        case 'delete':
                                include './comment/delete.php';
                                break;
                        case 'comment_detail':
                                include './comment/comment_detail.php';        
                                break;
                        default:
                                include './comment/list.php';
                                break;
                        }
                        break;            
            

    }
?>