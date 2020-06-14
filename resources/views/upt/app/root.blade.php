<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UPT UPNVJ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('upt-style/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('upt-style/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('upt-style/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('upt-style/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('upt-style/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('upt-style/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('upt-style/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('upt-style/plugins/summernote/summernote-bs4.css') }}">
  <!-- Datatable -->
  <link rel="stylesheet" href="{{ asset('upt-style/plugins/datatables/dataTables.bootstrap4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Tiny MCE 4 -->
  <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    var editor_config = {
      menubar: false,
      branding: false,
      statusbar: false,
      path_absolute : "/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image", // link image media
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
  
    tinymce.init(editor_config);
  </script>
  <!-- SweetAlert Example -->
  {{-- https://laracasts.com/discuss/channels/laravel/sweet-alert-and-toast-for-laravel --}}
  <style>
    table {
      font-size: 10pt;
    }
  </style>
  <!-- Custom CSS -->
  @yield('css')
  <!-- Custom JS -->
  @yield('js-top')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  
<div class="wrapper">

  @include('sweetalert::alert')

  @include('upt.partials.navbar')

  @include('upt.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              @yield('menu-title')
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @yield('menu-path')
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('upt.partials.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('upt-style/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('upt-style/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('upt-style/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('upt-style/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('upt-style/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('upt-style/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('upt-style/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('upt-style/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('upt-style/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('upt-style/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('upt-style/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('upt-style/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('upt-style/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('upt-style/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('upt-style/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('upt-style/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('upt-style/dist/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('upt-style/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('upt-style/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- CKEditor -->
{{-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}
<!-- Custom JS -->
@yield('js-bottom')
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
</body>
</html>
