<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title> Monitoring Bawang Merah </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/x-icon" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Bootstrap css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--  Custom Scroll bar-->
    <link href="{{ asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

    <!--  Sidebar css -->
    <link href="{{ asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

    <!--- Internal Morris css-->
    <link href="{{ asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">

    <!--- Style css --->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/boxed.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark-boxed.css') }}" rel="stylesheet">


    <!--Internal  Quill css -->
    <link href="{{ asset('assets/plugins/quill/quill.snow.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/plugins/quill/quill.bubble.css') }}" rel="stylesheet">

    <!--- Dark-mode css --->
    <link href="{{ asset('assets/css/style-dark.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsive.dataTables.min.css') }}" rel="stylesheet">

    <!---Internal Fileupload css-->
    <link href="{{ asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

    <!---Internal Fancy uploader css-->
    <link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <!---Skinmodes css-->
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />
    @stack('header')
    <style>
        .form-control[type='file'] {
            height: 35px !important;
        }
        .invalid-feedback{
            display: block!important;
        }
    </style>

</head>

<body class="main-body " id="bodyID">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    @yield('content')
    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

    <!-- custom js -->

    <!-- Page -->
    <div class="horizontalMenucontainer">
        <div class="page">
            <!-- main-content -->
            @yield('content-app')
            @include('includes.footer')
        </div>
    </div>
</body>
<!-- JQuery min js -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Bundle js -->
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Ionicons js -->
<script src="{{ asset('assets/plugins/ionicons/ionicons.js') }}"></script>

<!-- Moment js -->
<script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>

<!--Internal Sparkline js -->
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Moment js -->
<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>

<!-- Internal Piety js -->
<script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>

<!-- Rating js-->
<script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>
<script src="{{ asset('assets/plugins/rating/jquery.barrating.js') }}"></script>


<!-- Sidemenu js-->
<script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
<script src="{{ asset('assets/plugins/sidebar/sidebar-custom.js') }}"></script>

<!-- Eva-icons js -->
<script src="{{ asset('assets/js/eva-icons.min.js') }}"></script>

<!--Internal Apexchart js-->
<script src="{{ asset('assets/js/apexcharts.js') }}"></script>

<!-- Horizontalmenu js-->
<script src="{{ asset('assets/plugins/horizontal-menu/horizontal-menu-2/horizontal-menu.js') }}"></script>

<!-- Sticky js -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>

<!-- Internal Map -->
<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

<!-- Internal Chart js -->
<script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

<!--Internal  index js -->
<script src="{{ asset('assets/js/index.js') }}"></script>
<script src="{{ asset('assets/js/jquery.vmap.sampledata.js') }}"></script>

<!-- Internal Data tables -->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>

<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>


<!--Internal  Datatable js -->
<script src="{{ asset('assets/js/table-data.js') }}"></script>

<!--Internal quill js -->
<script src="{{ asset('assets/plugins/quill/quill.min.js') }}"></script>

<!-- P-scroll js -->
<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>


<!--Internal Fileuploads js-->
<script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

<!-- Internal Form-editor js -->
<script src="{{ asset('assets/js/form-editor.js') }}"></script>

<!-- custom js -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@stack('script')

</html>
