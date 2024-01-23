<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LNT ADMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="content/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="content/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php
            include 'includes/nav.php';
        ?>
        <!-- Navbar End -->


        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Biểu Đồ Thống Kê Bình Luận</h6>
                            <canvas id="line-chart" width="665" 
                            height="332" style="display: block; box-sizing: border-box; height: 332px; width: 665px;"></canvas>
                        </div>
        </div>
        <!-- Sale & Revenue End -->


        <!-- Sales Chart Start -->
        <div class="container-fluid pt-4 px-4">

        </div>
        <!-- Sales Chart End -->


        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">

        </div>
        <!-- Recent Sales End -->


        <!-- Widgets Start -->
        <div class="container-fluid pt-4 px-4">

        </div>
        <!-- Widgets End -->


        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src=".//js/main.js"></script>
</body>
</html>

<?php
    $db = new bieudo();
    $t1 = $db -> comment_thang1();
    $t2 = $db -> comment_thang2();
    $t3 = $db -> comment_thang3();
    $t4 = $db -> comment_thang4();
    $t5 = $db -> comment_thang5();
    $t6 = $db -> comment_thang6();
    $t7 = $db -> comment_thang7();
    $t8 = $db -> comment_thang8();
    $t9 = $db -> comment_thang9();
    $t10 = $db -> comment_thang10();
    $t11 = $db -> comment_thang11();
    $t12 = $db -> comment_thang12();
    ?>
    <script>
    var ctx3 = $("#line-chart").get(0).getContext("2d");
    var myChart3 = new Chart(ctx3, {
        type: "line",
        data: {
            labels: ['0','Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 
            'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: "Bình Trong 12 Tháng",
                fill: false,
                backgroundColor: "rgba(235, 22, 22, .7)",
                data: [0, <?echo $t1['sl'];?>, <?echo $t2['sl'];?>, <?echo $t3['sl'];?>, <?echo $t4['sl'];?>, <?echo $t5['sl'];?>, <?echo $t6['sl'];?>, <?echo $t7['sl'];?>, <?echo $t8['sl'];?>, <?echo $t9['sl'];?>, <?echo $t10['sl'];?>, <?echo $t11['sl'];?>, <?echo $t12['sl'];?>]
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
<?
?>