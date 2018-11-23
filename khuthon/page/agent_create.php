<?php
if(!isset($_SESSION)) 
        session_start(); 
if(!isset($_SESSION['auth']))
  echo"<script>alert('권한이 없습니다.');location.href='../index.html';</script>";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>대행 업체 등록</title>
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
                                    <li><span>대행 업체 등록</span></li>
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
                                    <h4 class="header-title">대행 업체 등록</h4>
                                    <form action='../db/create_agent.php' method="post">
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-6 my-1">
                                                <label for="agentName" class="col-form-label">업체명</label>
                                                <input class="form-control" type="text" id="agentName" name="agentName">
                                            </div>
                                            <div class="col-sm-6 my-1">
                                                <label for="agentManager" class="col-form-label">담당자</label>
                                                <input class="form-control" type="text" id="agentManager" name="agentManager">
                                            </div>
                                        </div>
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-6 my-1">
                                                <label for="agentTel" class="col-form-label">연락처</label>
                                                <input class="form-control" type="text" placeholder="010-0000-0000" id="agentTel" name="agentTel">
                                            </div>
                                            <div class="col-sm-6 my-1">
                                                <label for="agentMessenger" class="col-form-label">메신저</label>
                                                <input class="form-control" type="text" id="agentMessenger" name="agentMessenger">
                                            </div>   
                                        </div>
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-6 my-1">
                                                <label for="agentStartDate" class="col-form-label">시작일</label>
                                                <input class="form-control" type="date" id="agentStartDate" name="agentStartDate">
                                            </div>
                                            <div class="col-sm-6 my-1">
                                                <label for="agentEndDate" class="col-form-label">마감일</label>
                                                <input class="form-control" type="date" id="agentEndDate" name="agentEndDate">
                                            </div>  
                                        </div>
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-6 my-1">
                                                <label for="agentCategory" class="col-form-label">업무 카테고리</label>
                                                <input class="form-control" type="text" id="agentCategory" name="agentCategory">
                                            </div>
                                            <div class="col-sm-6 my-1">
                                                <label for="agentEtc" class="col-form-label">비고</label>
                                                <input class="form-control" type="text" id="agentEtc" name="agentEtc">
                                            </div>   
                                        </div>

                                        <div class="form-row align-items-center">
                                            <div class="col-sm-6 my-1">
                                                <b class="text-muted mb-3 d-block">계산서 여부:</b>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" checked id="customRadio1" name="customRadio" class="custom-control-input" value='진행'>
                                                    <label class="custom-control-label" for="customRadio1">진행</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value='원천'>
                                                    <label class="custom-control-label" for="customRadio2">원천 징수</label>
                                                </div>

                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value='안함'>
                                                    <label class="custom-control-label" for="customRadio3">진행 안함
                                                    </label>
                                                </div>

                                            </div>  
                                        </div>
                                        

                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                    </form>
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
        function del(key) {
        window.open("../DB/del.php?key="+key, "_blank", "left=300,width=10,height=10");
        confirm("삭제되었습니다.");
        location.reload();
      }
    </script>
</body>

</html>