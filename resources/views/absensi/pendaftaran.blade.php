<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Register Itikaf</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="/ablepro/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="/ablepro/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="/ablepro/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="/ablepro/assets/icon/feather/css/feather.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="/ablepro/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="/ablepro/assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="/ablepro/assets/icon/font-awesome/css/font-awesome.min.css">
    <!--forms-wizard css-->
    <link rel="stylesheet" type="text/css" href="/ablepro/bower_components/jquery.steps/css/jquery.steps.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="/ablepro/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/ablepro/assets/css/pages.css">

</head>

<body>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-bar"></div>
</div>
<!-- [ Pre-loader ] end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <!-- [ Header ] start -->

        <!-- [ navigation menu ] end -->
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Form wizard with validation card start -->
                                <!-- Verticle Wizard card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Form Biodata Itikaf</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form-group" method="post" id="" action="{{ action('RegisterController@simpan') }}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="password-2" class="block">Kategori</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <select name="kategori" class="form-control required" required>
                                                                <option value="itikaf">Itikaf</option>
                                                                <option value="pulang pergi">Pulang Pergi</option>
                                                                <option value="full 10 hari">Full 10 Hari</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="name-2" class="block">Nama Lengkap *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="name-2b" name="name" type="text" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="password-2" class="block">Jenis Kelamin *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <select name="jenis_kelamin" class="form-control required" required>
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="phone-2" class="block">Nmr Hp *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="phone-2b" name="tlpn" type="number" class="form-control phone">
                                                        </div>
                                                    </div>
                                                    {{--<div class="form-group row">--}}
                                                    {{--<div class="col-sm-12">--}}
                                                    {{--<label for="date" class="block">Tanggal Lahir</label>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="col-sm-12">--}}
                                                    {{--<input id="tgl_lahir" name="tgl_lahir" type="text" class="form-control date-control">--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="date" class="block">Alamat Lengkap</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="alamat" name="alamat" type="text" class="form-control date-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="date" class="block">RFID</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="rfid" name="uid" type="text" class="form-control date-control" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">

                                                        <div class="col-sm-12">
                                                            <div class="checkbox">
                                                                <label><input id="condition" type="checkbox" value="" disabled>Setuju dengan syaratan dan ketentuan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <button id="subbtn" class="form-control btn-info">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Verticle Wizard card end -->
                                <!-- Design Wizard card start -->
                            </div>
                        </div>
                    </div>
                    <!-- Page body end -->
                </div>
            </div>
        </div>
        <!-- Main-body end -->

    </div>
</div>
</div>
</div>


<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="/ablepro/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="/ablepro/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="/ablepro/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="/ablepro/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="/ablepro/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="/ablepro/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="/ablepro/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/ablepro/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="/ablepro/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- waves js -->
<script src="/ablepro/assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="/ablepro/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="/ablepro/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="/ablepro/bower_components/modernizr/js/css-scrollbars.js"></script>
<!--Forms - Wizard js-->
<script src="/ablepro/bower_components/jquery.cookie/js/jquery.cookie.js"></script>
<script src="/ablepro/bower_components/jquery.steps/js/jquery.steps.js"></script>
<script src="/ablepro/bower_components/jquery-validation/js/jquery.validate.js"></script>
<!-- Validation js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script type="text/javascript" src="/ablepro/assets/pages/form-validation/validate.js"></script>
<!-- Custom js -->
<script src="/ablepro/assets/pages/forms-wizard-validation/form-wizard.js"></script>
<script src="/ablepro/assets/js/pcoded.min.js"></script>
<script src="/ablepro/assets/js/vertical/vertical-layout.min.js"></script>
<script src="/ablepro/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/ablepro/assets/js/script.js"></script>

<script>
    $(document).ready(function() {
        $("#rfid").keyup(function () {
            var uid = $("#rfid").val();
            if($("#rfid").val().length === 0){
            }
            else{
                var uri = "{{ url('/') }}";
                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "method": "GET",

                    "headers": {
                        "cache-control": "no-cache",
                        "Postman-Token": "30d21590-8c00-4a63-b09a-daffa2bddac6",
                        "Access-Control-Allow-Origin": "*",
                        'Access-Control-Allow-Headers': 'Origin, Content-Type, Accept, Authorization, X-Request-With',
                    },

                }
                url = uri + "/cekrfid/" + uid;
                console.log(url);
                $.getJSON(url, settings, function (response) {

                    console.log(response);
                    if(response === true){

                        $('#condition').prop("disabled", false);
                        $("#rfid").css("background-color", "white");

                    }
                    else{
                        $('#condition').prop("disabled", true);
                        $("#rfid").css("background-color", "pink");
                    }
                });
            }

        });
        validate();
        $('#condition').change(validate);

        function validate() {
            if ($('#condition').is(':checked')) {
                $('#subbtn').prop("disabled", false);
            } else {
                $('#subbtn').prop("disabled", true);
            }
        }
    });
    $(document).ready(function() {
        $('#kelamin').on('change', function () {
            var kelamin = $("#kelamin").val();
            if (kelamin == 'Laki-Laki') {
                alert('laki laki');
            }
            else {
                alert('perempuan');
            }
        });
    }
    console.log('fs');
    );
    function kelamin() {
        console.log('dada');
        var kelamin = document.getElementById("kelamin").value;
        if (kelamin == 'Laki-Laki') {
            console.log('laki laki')
        }
        else {
            console.log('perempuan')
        }

    }
</script>
</body>

</html>
