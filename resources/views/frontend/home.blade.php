<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:29:18 GMT -->

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/hms.png" />
    <link rel="icon" type="image/png" href="assets/img/hms.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $title; ?> | HMS</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
    <meta property="og:image" content="s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg" />
    <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/google-roboto-300-700.css" rel="stylesheet" />
    <!--     Datepicker     -->
    <link href="assets/css/bootstrap-datepicker.min.css" rel="stylesheet" />
    <!--   Core JS Files   -->
    <!--     plugin toast     -->
    <link href="assets/css/jquery.toast.min.css" rel="stylesheet" />
    <!--     Jquery     -->
    <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
</head>

<body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js" type="text/javascript"></script>
    <script src="assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>

    <!--  DataTables.net Plugin    -->
    <script src="assets/js/jquery.datatables.js"></script>

    <!-- Select Plugin -->
    <script src="assets/js/jquery.select-bootstrap.js"></script>

    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="assets/img/sidebar-3.jpg">
            <div class="logo">
                <a href="" class="simple-text">
                    Harum Manis Logistik
                </a>
            </div>
            <div class="logo logo-mini">
                <div class="simple-text logo-mini">
                    <img src="assets/img/hms.png" class="logo-mini" width="55px">
                </div>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="uploads/user-image/" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-mini"> MP </span>
                                        <span class="sidebar-normal"> My Profile </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php
                $hal = $this->uri->segment(1);
                $sub_hal = $this->uri->segment(2);
                $sublagi_hal = $this->uri->segment(3);
                ?>
                <ul class="nav">
                    <li class="<?= ($sub_hal == 'dashboard') ? 'active' : ''; ?>">
                        <a href="">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <?php if ($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 2) { ?>
                        <li class="<?= ($sub_hal == 'homepage') ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= site_url('admin/homepage') ?>">
                                <i class="material-icons">home</i>
                                <p>Homepage</p>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#Mnabout">
                                <i class="material-icons">business</i>
                                <p>About Us
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="<?= ($sub_hal == 'about' || $sub_hal == 'about_head') ? 'collapse in' : 'collapse'; ?>" id="Mnabout">
                                <ul class="nav">
                                    <li class="<?= ($sub_hal == 'about_head') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/about_head') ?>">
                                            <i class="material-icons">content_paste</i>
                                            <p>About Header</p>
                                        </a>
                                    </li>
                                    <li class="<?= ($sub_hal == 'about') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/about') ?>">
                                            <i class="material-icons">view_list</i>
                                            <p>About List</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#Mndelivery">
                                <i class="material-icons">local_shipping</i>
                                <p>Delivery
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="<?= ($sub_hal == 'deliveried_head' || $sub_hal == 'delivery' || $sub_hal == 'customer') ? 'collapse in' : 'collapse'; ?>" id="Mndelivery">
                                <ul class="nav">
                                    <li class="<?= ($sub_hal == 'deliveried_head') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/deliveried_head') ?>">
                                            <i class="material-icons">content_paste</i>
                                            <p>Deliveried Header</p>
                                        </a>
                                    </li>
                                    <li class="<?= ($sub_hal == 'delivery') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/delivery') ?>">
                                            <i class="material-icons">view_list</i>
                                            <p>Delivery List</p>
                                        </a>
                                    </li>
                                    <li class="<?= ($sub_hal == 'customer') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/customer') ?>">
                                            <i class="material-icons">groups</i>
                                            <p>Customer</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#vehicle">
                                <i class="material-icons">local_taxi</i>
                                <p>Our Vehicles
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="<?= ($sub_hal == 'vehicle_head' || $sub_hal == 'album_vehicle' || $sub_hal == 'gallery_vehicle') ? 'collapse in' : 'collapse'; ?>" id="vehicle">
                                <ul class="nav">
                                    <li class="<?= ($sub_hal == 'vehicle_head') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/vehicle_head') ?>">
                                            <i class="material-icons">content_paste</i>
                                            <p>Vehicle Header</p>
                                        </a>
                                    </li>
                                    <li class="<?= ($sub_hal == 'album_vehicle') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/album_vehicle') ?>">
                                            <i class="material-icons">collections</i>
                                            <p>Album Vehicle</p>
                                        </a>
                                    </li>
                                    <li class="<?= ($sub_hal == 'gallery_vehicle') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/gallery_vehicle') ?>">
                                            <i class="material-icons">image</i>
                                            <p>Photo Vehicle</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#Mnservices">
                                <i class="material-icons">book_online</i>
                                <p>Services
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="<?= ($sub_hal == 'services_head' || $sub_hal == 'services') ? 'collapse in' : 'collapse'; ?>" id="Mnservices">
                                <ul class="nav">
                                    <li class="<?= ($sub_hal == 'services_head') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/services_head') ?>">
                                            <i class="material-icons">content_paste</i>
                                            <p>Services Header</p>
                                        </a>
                                    </li>
                                    <li class="<?= ($sub_hal == 'services') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/services') ?>">
                                            <i class="material-icons">view_list</i>
                                            <p>Services List</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#Mpost">
                                <i class="material-icons">event_note</i>
                                <p>News
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="<?= ($sub_hal == 'news_head' || $sub_hal == 'news' || $sub_hal == 'kategori') ? 'collapse in' : 'collapse'; ?>" id="Mpost">
                                <ul class="nav">
                                    <li class="<?= ($sub_hal == 'news_head') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/news_head') ?>">
                                            <span class="sidebar-mini"><i class="material-icons">content_paste</i></span>
                                            <p>News Header</p>
                                        </a>
                                    </li>
                                    <li class="<?= ($sub_hal == 'news') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/news') ?>">
                                            <i class="material-icons">view_list</i>
                                            <p>News List</p>
                                        </a>
                                    </li>
                                    <li class="<?= ($sub_hal == 'kategori') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/kategori') ?>">
                                            <i class="material-icons">build</i>
                                            <p>News Kategori</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#gallery">
                                <i class="material-icons">camera_alt</i>
                                <p>Gallery
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="<?= ($sub_hal == 'album' || $sub_hal == 'gallery') ? 'collapse in' : 'collapse'; ?>" id="gallery">
                                <ul class="nav">
                                    <li class="<?= ($sub_hal == 'album') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/album') ?>">
                                            <i class="material-icons">collections</i>
                                            <p>Album</p>
                                        </a>
                                    </li>
                                    <li class="<?= ($sub_hal == 'gallery') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= site_url('admin/gallery') ?>">
                                            <i class="material-icons">image</i>
                                            <p>Photos</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="<?= ($sub_hal == 'komentar') ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= site_url('admin/komentar') ?>">
                                <i class="material-icons">forum</i>
                                <p>Komentar</p>
                            </a>
                        </li>
                        <li class="<?= ($hal == 'customer') ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= site_url('customer') ?>">
                                <i class="material-icons">message</i>
                                <p>Inbox</p>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                        <li class="<?= ($sub_hal == 'pengguna') ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= site_url('admin/pengguna') ?>">
                                <i class="material-icons">persons</i>
                                <p>Pengguna</p>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="<?= ($sub_hal == 'backup') ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= site_url('admin/backup') ?>">
                            <i class="material-icons">save</i>
                            <p>Backup Database</p>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-warning navbar-light navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><?= $title; ?></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>
                                        <?= $this->fungsi->user_login()->name ?>
                                    </span>
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?= site_url('administrator/logout') ?>">Keluar</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= site_url('') ?>" class="dropdown-toggle" target="_blank">
                                    <i class="material-icons">home</i>
                                    <p class="hidden-lg hidden-md">Home</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>

                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <?php echo $contents ?>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    PT. Harumanis Logistik
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#">Creative Tim</a>, modif By Lukman2787
                    </p>
                </div>
            </footer>
        </div>
    </div>


    <!-- Forms Validations Plugin -->
    <script src="assets/js/jquery.validate.min.js"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="assets/js/moment.min.js"></script>
    <!--  Charts Plugin -->
    <!-- <script src="assets/js/chartist.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js"></script>
    <!--  Plugin for the Wizard -->
    <script src="assets/js/jquery.bootstrap-wizard.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!--   Sharrre Library    -->
    <script src="assets/js/jquery.sharrre.js"></script>
    <!-- DateTimePicker Plugin -->
    <script src="assets/js/bootstrap-datetimepicker.js"></script>
    <!-- Vector Map plugin -->
    <script src="assets/js/jquery-jvectormap.js"></script>
    <!-- Sliders Plugin -->
    <script src="assets/js/nouislider.min.js"></script>

    <!--  Google Maps Plugin    -->
    <!--<script src="assets/js/jquery.select-bootstrap.js"></script>-->
    <!-- Sweet Alert 2 plugin -->
    <script src="assets/js/sweetalert2.js"></script>
    <!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="assets/js/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin    -->
    <script src="assets/js/fullcalendar.min.js"></script>
    <!-- TagsInput Plugin -->
    <script src="assets/js/jquery.tagsinput.js"></script>
    <!-- Sweet Alert 2 plugin -->
    <script src="assets/js/select2.full.min.js"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="assets/js/material-dashboard.js"></script>
    <!-- CKeditor -->
    <script src="assets/ckeditor/ckeditor.js"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    <!-- Toast Plugin -->
    <script type="text/javascript" src="assets/js/jquery.toast.min.js"></script>

    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('.datepicker').datetimepicker({
                format: "YYYY-MM-DD",
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove',
                    inline: true
                }
            });

            setFormValidation('#FormValidation');
        });


        $(document).on('click', '.hapus-data', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            swal({
                title: 'Apakah Anda Yakin?',
                text: "Ingin menghapus permanen data ini !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Ya, Hapus ini!',
                buttonsStyling: false
            }).then(function() {
                document.location.href = href;
            });

        });

        function setFormValidation(id) {
            $(id).validate({
                errorPlacement: function(error, element) {
                    $(element).parent('div').addClass('has-error');
                }
            });
        }
    </script>


    <?php $this->view('messages'); ?>

</body>

</html>
