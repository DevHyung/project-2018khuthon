<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once("../db/dbconfig.php");
$m_id=$_GET['mid'];
$sql = "SELECT * FROM market WHERE idx = '$m_id'";
$query = mysqli_query($db,$sql);
$row=mysqli_fetch_array($query);
$_SESSION['m_id'] = $row['idx'];
$_SESSION['m_point'] = $row['point'];
$_SESSION['m_name'] = $row['name'];



$sql = "SELECT * FROM review WHERE m_id = '$m_id'";
$query = mysqli_query($db,$sql);

//while ( $row=mysqli_fetch_array($query))

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>마켓 정보</title>
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
        <!-- main header area start -->
        
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/icon/logo2.png" alt="logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- main header area end -->
        <!-- header area start -->
        <?php include '../page/frame/header.html'; ?>
        <!-- header area end -->
        <!-- page title area end -->
        <div class="main-content-inner">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">< <?=$_SESSION['m_name']?> >리뷰 총 <?=mysqli_num_rows($query);?>건</h4>
                                <?php
                                while ( $row=mysqli_fetch_array($query)){
                                    echo'
                                <div class="col-lg-4 col-md-6 mt-5">
                                    <div class="card card-bordered">
                                        <div class="card-body">
                                            <h5 class="title">'.$row['u_id'].'님 - '.$row['registerDate'].' 
                                            <div class="starRev" style="display: inline;float: right;">';
                                                    if( $row['score'] >= 0.5)
                                                        echo '<span class="starR1 on">별1_왼쪽</span>';
                                                    else
                                                        echo '<span class="starR1 ">별1_왼쪽</span>';

                                                    if( $row['score'] >= 1.0)
                                                        echo '<span class="starR2 on" >별1_오른쪽</span>';
                                                    else
                                                        echo '<span class="starR2" >별1_오른쪽</span>';
                                                    if( $row['score'] >= 1.5)
                                                        echo '<span class="starR1 on" >별2_왼쪽</span>';
                                                    else
                                                        echo '<span class="starR1" >별2_왼쪽</span>';

                                                    if( $row['score'] >= 2.0)
                                                        echo '<span class="starR2 on" >별2_오른쪽</span>';
                                                    else
                                                        echo '<span class="starR2" >별2_오른쪽</span>';

                                                    if( $row['score'] >= 2.5)
                                                        echo '<span class="starR1 on" >별3_왼쪽</span>';
                                                    else
                                                        echo '<span class="starR1" >별3_왼쪽</span>';

                                                    if( $row['score'] >= 3.0)
                                                        echo '<span class="starR2 on" >별3_오른쪽</span>';
                                                    else
                                                        echo '<span class="starR2" >별3_오른쪽</span>';

                                                    if( $row['score'] >= 3.5)
                                                        echo '<span class="starR1 on" >별4_왼쪽</span>';
                                                    else
                                                        echo '<span class="starR1" >별4_왼쪽</span>';

                                                    if( $row['score'] >= 4.0)
                                                        echo '<span class="starR2 on" >별4_오른쪽</span>';
                                                    else
                                                        echo '<span class="starR2" >별4_오른쪽</span>';

                                                    if( $row['score'] >= 4.5)
                                                        echo '<span class="starR1 on" >별5_왼쪽</span>';
                                                    else
                                                        echo '<span class="starR1" >별5_왼쪽</span>';
                                                    if( $row['score'] >= 5.0)
                                                        echo '<span class="starR2 on" >별5_오른쪽</span>';
                                                    else
                                                        echo '<span class="starR2" >별5_오른쪽</span>';
                                    echo'           </div>
                                    </h5>
                                            <p class="card-text">'.$row['content'].'
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                ';
                                };
                                
                                
                                ?>
                                



                            </div>
                        </div>
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
    	$("#review").click(function(){
			 window.location = "./review.php";
	});
    	$("#point").click(function(){
			 window.location = "./point.php";
	});
    </script>
</body>

</html>

