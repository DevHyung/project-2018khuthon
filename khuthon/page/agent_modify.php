<?php
if(!isset($_SESSION)) 
        session_start(); 
if(!isset($_SESSION['auth']))
  echo"<script>alert('권한이 없습니다.');location.href='../index.html';</script>";

require_once("../db/dbconfig.php"); 
$sql = "SELECT * FROM agent";
$query = mysqli_query($db,$sql);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>대행 업체 수정</title>
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
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Dashboard</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="index.php">Home</a></li>
                                    <li><span>대행 업체 수정</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="container">
                    <div class="row">
                        <!-- Dark table start -->
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">대행 업체</h4>
                                    <div class="data-tables datatable-dark">
                                        <table id="dataTable3" class="text-center">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th>업체명</th>
                                                    <th>담당자</th>
                                                    <th>연락처</th>
                                                    <th>메신저</th>
                                                    <th>계산서 여부</th>
                                                    <th>시작일</th>
                                                    <th>마감일</th>
                                                    <th>카테고리</th>
                                                    <th>비고</th>
                                                    <th>등록일</th>
                                                    <th>수정</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    while ( $row=mysqli_fetch_array($query))
                                                    {
                                                        if ($row['isSave'] == '진행')
                                                            $saveStr = '진행';
                                                        elseif ($row['isSave'] == '원천') {
                                                            $saveStr = '원천 징수';
                                                        }
                                                        else{
                                                            $saveStr = '안함';
                                                        }

                                                      echo'
                                                      <tr>
                                                      <td>'.$row['name'].'</td>
                                                      <td>'.$row['manager'].'</td>
                                                      <td>'.$row['tel'].'</td>
                                                      <td>'.$row['messenger'].'</td>
                                                      <td>'.$saveStr.'</td>
                                                      <td>'.$row['sDate'].'</td>
                                                      <td>'.$row['eDate'].'</td>
                                                      <td>'.$row['category'].'</td>
                                                      <td>'.$row['etc'].'</td>
                                                      <td>'.$row['registerDate'].'</td>
                                                      <td>
                                                      <button class="btn btn-primary"  onclick="modify(\''.$row['idx'].'\')">수정 하기</button>
                                                      </td>
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
        function modify(key) {
        window.open("./agent_modify_form.php?idx="+key, "_blank", "left=300,width=600,height=600");
    
      }
    </script>
</body>

</html>