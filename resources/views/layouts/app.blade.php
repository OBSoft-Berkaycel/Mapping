<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mapping</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]-->
    <script src="{{ asset('assets/cdn/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/cdn/respond.min.js') }}"></script>
    <!--[endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="{{ asset('adminlte/mappingfontcss.css') }}">

    <!-- {{-- This Css Lines Belongs To Notification Blade --}} -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.custom.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.gritter.min.css') }}"/>

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->

    <!-- <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css"> -->

    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->

    <!-- <link rel="stylesheet" href="../dist/css/adminlte.min.css?v=3.2.0"> -->

    @yield('head')

</head>
<body class="hold-transition skin-purple-light">

<div class="wrapper">

@include('layouts.header')

@include('layouts.nav')
<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content container-fluid">
            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            @yield('content')
        </section>
    </div>

    {{-- @include('layouts.footer') --}}

<!-- jQuery 3 -->
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>


@yield('jscontent')

</body>
</html>