<?php
require_once("../db/dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$u_id = $_GET['uid'];
$_SESSION['u_id'] = $u_id;
$sql = "SELECT * FROM user WHERE id = '$u_id'";
$query = mysqli_query($db,$sql);
$row=mysqli_fetch_array($query);
$_SESSION['u_name'] = $row['name'];
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>포인트 적립</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style type="text/css">
        .starR1{
            background: url('http://miuu227.godohosting.com/images/icon/ico_review.png') no-repeat -52px 0;
            background-size: auto 100%;
            width: 15px;
            height: 30px;
            float:left;
            text-indent: -9999px;
            cursor: pointer;
        }
        .starR2{
            background: url('http://miuu227.godohosting.com/images/icon/ico_review.png') no-repeat right 0;
            background-size: auto 100%;
            width: 15px;
            height: 30px;
            float:left;
            text-indent: -9999px;
            cursor: pointer;
        }
        .starR1.on{background-position:0 0;}
        .starR2.on{background-position:-15px 0;}
    </style>
</head>

<body class="body-bg">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- header area end -->
        <!-- page title area end -->
        <div class="main-content-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mt-5">
                        <form method="POST" action="../db/qr_add_point.php">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title"><?=$_SESSION['u_name'];?>님 적립</h4>    
                                    <input type="hidden" name='nowPoint' value="<?=$row['point']?>">
                                    <div class="form-group">
                                            <label for="pay" class="col-form-label">결제금액 입력</label>
                                            <input class="form-control" type="text" name="pay" id="pay">
                                    </div>
                                    <div class="form-group">
                                            <label for="token" class="col-form-label">점포토큰 입력</label>
                                            <input class="form-control" type="text" name="token" id="token">
                                    </div>

                                    
                                    <button type="submit" class="btn btn-danger btn-lg btn-block" >적립 !!</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018 . All right reserved</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- main wrapper start -->
    
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all map chart -->
    <script src="assets/js/maps.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
    </script>
</body>

</html>

