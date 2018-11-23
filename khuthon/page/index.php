<?php
if(!isset($_SESSION)) 
        session_start(); 
if(!isset($_SESSION['id']))
  echo"<script>alert('권한이 없습니다.');location.href='../index.html';</script>";

require_once("../db/dbconfig.php");
$u_id = $_SESSION['id'];
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
    <title>메인 페이지</title>
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
        <div class="main-content-inner">
            <div class="container">
                <!-- map area start -->
                <div id="map" style="width:100%;height:300px;"></div>
                <div class="form-group">
                        <label for="example-text-input" class="col-form-label">현재 포인트</label>
                        <input class="form-control" type="text" value="<?=$row['point']?>원" id="example-text-input" readonly="true">
                </div>
                <img class="card-img-top img-fluid" src="<?=$_SESSION['id']?>.jpg" alt="image">
                
                <!-- map area end -->
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
    <!-- maps Resources -->
    <style type="text/css">
        .customoverlay {position:relative;bottom:85px;border-radius:6px;border: 1px solid #ccc;border-bottom:2px solid #ddd;float:left;}
        .customoverlay:nth-of-type(n) {border:0; box-shadow:0px 1px 2px #888;}
        .customoverlay a {display:block;text-decoration:none;color:#000;text-align:center;border-radius:6px;font-size:14px;font-weight:bold;overflow:hidden;background: #d95050;background: #d95050 url(http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/arrow_white.png) no-repeat right 14px center;}
        .customoverlay .title {display:block;text-align:center;background:#fff;margin-right:35px;margin-bottom:0px;padding:10px 15px;font-size:14px;font-weight:bold;}
        .customoverlay:after {content:'';position:absolute;margin-left:-12px;left:50%;bottom:-12px;width:22px;height:12px;background:url('http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/vertex_white.png')}
    </style>

    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=49ea702a4cfbbb5aac6ec195b2ca5d4d"></script>
    <script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div  
    mapOption = { 
        center: new daum.maps.LatLng(37.247778, 127.077447), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };
    // var temp = new daum.maps.CustomOverlay({
    //     yAnchor: 0.3
    // });

    var map = new daum.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

    // '<div class="customoverlay"><a href="http://127.0.0.1/khuthon/detail/market_detail.php?mid=1" target="_blank"><span class="title">Market 1</span></a></div>'
    // '<div class="customoverlay"><a href="http://127.0.0.1/khuthon/detail/market_detail.php?mid=2" target="_blank"><span class="title">Market 2</span></a></div>'
    // '<div class="customoverlay"><a href="http://127.0.0.1/khuthon/detail/market_detail.php?mid=3" target="_blank"><span class="title">Market 3</span></a></div>'

    var positions = [
        {
            content: '<div class="customoverlay"><a href="http://127.0.0.1/khuthon/detail/market_detail.php?mid=1" target="_blank"><span class="title">Market 1</span></a></div>', 
            latlng: new daum.maps.LatLng(37.247932, 127.076252),
            clickable: true
        },
        {
            content: '<div class="customoverlay"><a href="http://127.0.0.1/khuthon/detail/market_detail.php?mid=2" target="_blank"><span class="title">Market 2</span></a></div>', 
            latlng: new daum.maps.LatLng(37.248560, 127.078610),
            clickable: true
        },
        {
            content: '<div class="customoverlay"><a href="http://127.0.0.1/khuthon/detail/market_detail.php?mid=3" target="_blank"><span class="title">Market 3</span></a></div>', 
            latlng: new daum.maps.LatLng(37.247958, 127.077832),
            clickable: true
        }
    ];

    for (var i = 0; i < positions.length; i ++) {
        // 마커를 생성합니다
        var marker = new daum.maps.Marker({
            map: map, // 마커를 표시할 지도
            position: positions[i].latlng // 마커의 위치
        });

        var customOverlay = new daum.maps.CustomOverlay({
            map: map,
            position: positions[i].latlng,
            content: positions[i].content,
            yAnchor: 0.3 
        });

        // daum.maps.event.addListener(marker, 'click', function(){
        //     console.log(temp);
        //     temp.setMap(null);
        //     temp.setContent(content);
        //     temp.setPosition(marker.getPosition());
        //     temp.setMap(map);
        // });
    }

    // function makeClickListener(map, marker, content) {
    //     return function(){
    //         console.log(temp);
    //         temp.setMap(null);
    //         temp.setContent(content);
    //         temp.setPosition(marker.getPosition());
    //         temp.setMap(map);
    //     };
    // }

    // // 커스텀 오버레이에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
    // var content = '<div class="customoverlay">' +
    //     '  <a href="http://map.daum.net/link/map/11394059" target="_blank">' +
    //     '    <span class="title">구의야구공원</span>' +
    //     '  </a>' +
    //     '</div>';

    // // 커스텀 오버레이가 표시될 위치입니다 
    // var position = new daum.maps.LatLng(37.54699, 127.09598);  

    // // 커스텀 오버레이를 생성합니다
    // var customOverlay = new daum.maps.CustomOverlay({
    //     map: map,
    //     position: position,
    //     content: content,
    //     yAnchor: 1 
    // });

    // for (var i = 0; i < positions.length; i ++) {
    //     // 마커를 생성합니다
    //     var marker = new daum.maps.Marker({
    //         map: map, // 마커를 표시할 지도
    //         position: positions[i].latlng // 마커의 위치
    //     });

    //     // 마커에 표시할 인포윈도우를 생성합니다 
    //     var infowindow = new daum.maps.InfoWindow({
    //         content: positions[i].content, // 인포윈도우에 표시할 내용
    //         removable : true
    //     });

    //     // 마커에 mouseover 이벤트와 mouseout 이벤트를 등록합니다
    //     // 이벤트 리스너로는 클로저를 만들어 등록합니다 
    //     // for문에서 클로저를 만들어 주지 않으면 마지막 마커에만 이벤트가 등록됩니다
    //     daum.maps.event.addListener(marker, 'click', makeClickListener(map, marker, infowindow));
    // }

    // function makeClickListener(map, marker, infowindow) {
    //     return function() {
    //             if(selectedInfowindow) {
    //                 selectedInfowindow.close();
    //             }
    //             selectedInfowindow = infowindow;
    //             infowindow.open(map, marker);
    //         };
    // }


    // // 마커에 표시할 인포윈도우를 생성합니다 
    // var infowindow = new daum.maps.InfoWindow({
    //     zIndex:1
    // });

    // var map = new daum.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

    // var positions = [
    //     {
    //         content: '<div style="padding:5px;">수누리</div>', 
    //         latlng: new daum.maps.LatLng(37.247932, 127.076252),
    //         clickable: true
    //     },
    //     {
    //         content: '<div style="padding:5px;">남대감</div>', 
    //         latlng: new daum.maps.LatLng(37.248560, 127.078610),
    //         clickable: true
    //     }
    // ];

    // for (var i = 0; i < positions.length; i ++) {
    //     // 마커를 생성합니다
    //     var marker = new daum.maps.Marker({
    //         map: map, // 마커를 표시할 지도
    //         position: positions[i].latlng // 마커의 위치
    //     });

    //     // // 마커에 표시할 인포윈도우를 생성합니다 
    //     // var infowindow = new daum.maps.InfoWindow({
    //     //     content: positions[i].content // 인포윈도우에 표시할 내용
    //     // });


    //     // 마커에 mouseover 이벤트와 mouseout 이벤트를 등록합니다
    //     // 이벤트 리스너로는 클로저를 만들어 등록합니다 
    //     // for문에서 클로저를 만들어 주지 않으면 마지막 마커에만 이벤트가 등록됩니다
    //     daum.maps.event.addListener(marker, 'click', temp(map, marker, i));
    // }

    // function temp(map, marker, i){
    //         console.log(positions[i]);
    //         console.log(i);
    //         infowindow.setContent(positions[i].content);
    //         infowindow.open(map, marker);
    // }

    // // function makeClickListener(map, marker, infowindow) {
    // //     if (!selectedMarker || selectedMarker !== marker) {

    // //         // 클릭된 마커 객체가 null이 아니면
    // //         // 클릭된 마커의 이미지를 기본 이미지로 변경하고
    // //         selectedMarker = marker;
            
    // //         return function() {
    // //             infowindow.open(map, marker);
    // //         };
    // //     }
    // // }
    </script>
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
</body>

</html>