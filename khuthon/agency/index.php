<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>KTTC 신청페이지</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">전시참가 및 회원가입</h2>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" onsubmit="return formSubmit(this);" action="upload_process.php" >
                        <!-- 회사명 / 대표자 / 담당자(책임자) / 연락처 / 이메일 / 위챗,sns / 출품분야 / 셋팅, 후속상황 / 예정전시면적 / 문제점 / 비고
                        참여인원  0명 / 여권정보(업로드)/ 사업자등록증(업로드) / 제품 대표이미지(업로드) / 전시제품 대표이미지(업로드) /제품이름 /제품 요약 /제품설명 / 인증서(중국) / 위생허가증(필요품목) / 회사 홈페이지 / 비고 -->
                        <div class="form-row">
                            <div class="name">회사명</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="companyName">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name font600">대표자</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="companyCeo">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">이메일</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="email" name="email" placeholder="example@email.com">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Message</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="message" placeholder="Message sent to the employer"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload CV</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file" id="file">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Upload your CV/Resume or any other relevant file. Max file size 50 MB</div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--radius-2 btn--blue-2" type="submit">참가신청 및 회원가입</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script type="text/javascript">

    function formSubmit(f) {
        // 업로드 할 수 있는 파일 확장자를 제한합니다.
        var extArray = new Array('hwp','xls','doc','xlsx','docx','pdf','jpg','gif','png','txt','ppt','pptx');
        var path = document.getElementById("file").value;
        if(path == "") {
            alert("파일을 선택해 주세요.");
            return false;
        }
        var pos = path.indexOf(".");
        if(pos < 0) {
            alert("확장자가 없는파일 입니다.");
            return false;
        }
        var ext = path.slice(path.indexOf(".") + 1).toLowerCase();
        var checkExt = false;
        for(var i = 0; i < extArray.length; i++) {
            if(ext == extArray[i]) {
                checkExt = true;
                break;
            }
        }
        if(checkExt == false) {
            alert("업로드 할 수 없는 파일 확장자 입니다.");
            return false;
        }
        return true;
    }
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->