<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UPT Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('upt-style/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('upt-style/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"> <b>UPT</b> </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      @if (session('err'))
          <div class="alert alert-danger" role="alert">
              <strong>Warning!</strong> {{session('err')}}
          </div>
      @endif

      <p class="login-box-msg">Halaman login</p>

      <form action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukkan nomor induk" name="identity">
          <div class="input-group-append input-group-text">
              <span class="fas fa-envelope"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append input-group-text">
              <span class="fas fa-lock"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="{{ route('beranda.index') }}" class="btn btn-flat">Beranda</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('upt-style/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('upt-style/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
  $(".alert").delay(2000).slideUp(200, function() {
      $(this).alert('close');
  });
</script>

</body>
</html>
