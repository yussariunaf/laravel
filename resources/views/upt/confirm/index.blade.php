<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Konfirmasi kehadiran peserta</title>
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
  <div class="login-logo">
    <b>{{ $trn->name }}</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      @if (session('err'))
          <div class="alert alert-danger" role="alert">
              Kode tidak ditemukan
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
      @if (session('succ'))
          <div class="alert alert-success" role="alert">
              {{ session('succ') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif

      <p class="login-box-msg">Konfirmasi Peserta</p>

      <form action="{{ route('upt.pelatihan.confirm.process') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="hidden" name="training_id" value="{{ $trn->id }}">
          <input type="text" class="form-control" placeholder="Masukan kode tiket" name="ticket_code" maxlength="9">
          <div class="input-group-append input-group-text"> <i class="fas fa-ticket-alt"></i> </div>
        </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat" {{ ($trn->status == 1) ? '' : 'disabled' }}>Konfirmasi kehadiran</button>
            <a href="{{ route('upt.pelatihan.today') }}" class="text-right float-left">Kembali</a>
            <a href="{{ route('upt.pelatihan.close.rsvp', $trn->id) }}" class="text-right float-right" onclick="return confirm('Are you sure to close participants form? *this form cannot be open soon*');">Tutup RSVP</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('upt-style/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('upt-style/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
  // $(".alert").delay(2000).slideUp(200, function() {
  //     $(this).alert('close');
  // });
</script>

</body>
</html>