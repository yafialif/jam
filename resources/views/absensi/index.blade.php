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
                                    <div class="card-header" style=" background: url('{{asset('/images/masjid.jpg')}}')no-repeat center center ;
                                        -webkit-background-size: cover;
                                        -moz-background-size: cover;
                                        -o-background-size: cover;
                                        background-size: cover; height: 200px">
                                        <h1 class="text-center text-white pt-5">Form Biodata I'tikaf</h1>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form-group" method="post" enctype="multipart/form-data" action="{{ action('RegisterController@store') }}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="password-2" class="block">Lama I'tikaf *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <select name="kategori" class="form-control required" required>
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
                                                            <input id="name-2b" name="name" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="password-2" class="block">Jenis Kelamin *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <select id="kelamin" name="jenis_kelamin" class="form-control required" required>
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="phone-2" class="block">Nomor Handphone *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="phone-2b" name="tlpn" type="number" class="form-control phone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="phone-2" class="block">Nomor Telepon Saudara yang bisa di hubungi *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="phone-2b" name="tlpn_saudara" type="number" class="form-control phone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="date" class="block">Tanggal Lahir * (Minmum umur 10th  atau kelahiran 2009)</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="tgl_lahir" max="2009-01-01" name="tgl_lahir" type="date" class="form-control date-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="date" class="block">Alamat Lengkap Domisili</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="alamat" name="alamat" type="text" class="form-control date-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="image_upload">
                                                        <div class="col-sm-12">
                                                            <label for="password-2" class="block">Upload Foto KTP</label>
                                                        </div>
                                                        <div class="col-sm-12 align-center">
                                                                    <p><img class="img-responsive img-thumbnail" width="250px" id='img-upload'/></p>
                                                                    <input type="file" name="image" id="imgInp">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <button class="form-control btn-info">Simpan</button>
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


</body>

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
        $('#kelamin').on('change', function () {
            var kelamin = $("#kelamin").val();
            if (kelamin == 'Laki-Laki') {
                $('#image_upload').show();
            }
            else {
                $('#image_upload').hide();
            }
        });
    });
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = label;

            if( input.length ) {
                input.val(log);
            } else {
                // if( log ) alert(log);
            }

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });
    });

</script>

</html>
