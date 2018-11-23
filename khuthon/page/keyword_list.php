<?php
if(!isset($_SESSION)) 
        session_start(); 
if(!isset($_SESSION['auth']))
  echo"<script>alert('권한이 없습니다.');location.href='../index.html';</script>";
require_once("../db/dbconfig.php"); 
$sql = "SELECT * FROM keyword";
$query = mysqli_query($db,$sql);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>키워드 조회</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
        <?php include './frame/main_header.php'; ?>
        <!-- main header area end -->
        <!-- header area start -->
        <?php include './frame/header.html'; ?>
        <!-- header area end -->

        <!-- page title area end -->
        <div class="main-content">
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>키워드 조회</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">키워드 리스트</h4>
                                
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>키워드</th>
                                                <th>의뢰자</th>
                                                <th>M  조회수</th>
                                                <th>PC 조회수</th>
                                                <th> < <br>통검수량</th>
                                                <th>지식인<br>모통수량</th>
                                                <th> > <br>전체갯수</th>
                                                <th> < <br>통검수량</th>
                                                <th>블로그<br>모통수량</th>
                                                <th> > <br>전체갯수</th>
                                                <th> < <br>통검수량</th>
                                                <th>카페<br>모통수량</th>
                                                <th> > <br>전체갯수</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                while ( $row=mysqli_fetch_array($query))
                                                {

                                                  echo'
                                                  <tr>
                                                  <td>'.$row['keyword'].'</td>
                                                  <td>'.$row['client'].'</td>
                                                  <td>'.$row['mSearchCnt'].'</td>
                                                  <td>'.$row['pSearchCnt'].'</td>
                                                  <td>'.$row['pKinTongCnt'].'</td>
                                                  <td>'.$row['mKinTongCnt'].'</td>
                                                  <td>'.$row['kinTotalCnt'].'</td>
                                                  <td>'.$row['pBlogTongCnt'].'</td>
                                                  <td>'.$row['mBlogTongCnt'].'</td>
                                                  <td>'.$row['blogTotalCnt'].'</td>
                                                  <td>'.$row['pCafeTongCnt'].'</td>
                                                  <td>'.$row['mCafeTongCnt'].'</td>
                                                  <td>'.$row['cafeTotalCnt'].'</td>
                                                  </tr>
                                                  ';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
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
    
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script type="text/javascript">
        function up(id,isverify){
            window.open("../db/modify_user.php?id="+id+"&act=u&grade="+isverify, "_blank", "left=300,width=10,height=10");
            location.reload();
        }
        function down(id,isverify){
            window.open("../db/modify_user.php?id="+id+"&act=d&grade="+isverify, "_blank", "left=300,width=10,height=10");
            location.reload();
        }
        function del(id) {
            window.open("../db/delete_user.php?id="+id, "_blank", "left=300,width=10,height=10");
            location.reload();
        }
    </script>
</body>

</html>