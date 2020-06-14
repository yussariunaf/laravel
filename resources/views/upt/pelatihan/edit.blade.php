@extends('upt.app.root')

@section('menu-title', 'Tambah pelatihan')

@section('menu-path')
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('upt.pelatihan.list') }}">Daftar Pelatihan</a></li>
  <li class="breadcrumb-item"><a href="{{ route('upt.pelatihan.display', $training->id) }}">Lihat Pelatihan</a></li>
  <li class="breadcrumb-item active">Ubah Pelatihan</li>
@endsection
    
@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('upt.pelatihan.update', $training->id) }}" class="p-3" enctype="multipart/form-data">
      @csrf
      <div class="text-center">
        @php $path = Storage::url('pelatihan/'.$training->header); @endphp
        <img width="auto" height="200px" class="imgheader" src="{{ url($path) }}"/>
      </div>
      <div class="form-group">
        <label for="header">header</label>
        <input type="file" name="header" id="header" class="form-control" accept=".png, .jpg, .jpeg" onchange="readURL(this);">
        <small class="text-muted">Disarankan gambar 720 x 500 pixel</small>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="code">Kode Pelatihan <sup><b class="text-danger">*</b></sup></label>
            <input type="text" name="code" class="form-control" id="code" required value="{{$training->code}}" readonly>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="code">Kuota</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="kuota" required value="{{ $training->kuota }}">
              <div class="input-group-append">
                <span class="input-group-text">Peserta</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="name">Nama Pelatihan</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-calendar-check" aria-hidden="true"></i> </span>
          </div>
          <input type="text" name="name" class="form-control" id="name" required value="{{ $training->name }}">
        </div>
      </div>
      <div class="form-group">
        <label for="trainer">Pemateri</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user-circle"></i> </span>
          </div>
          <input type="text" name="trainer" class="form-control" id="trainer" required value="{{ $training->trainer }}">
        </div>
      </div>
      <div class="form-group">
        <label>Tanggal & Waktu {{ date('d/m/Y H:m', strtotime($training->begin)) }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-clock"></i></span>
          </div>
          <input type="text" class="form-control float-right" id="reservationtime" name="begin" required value="{{ date('d/m/yy H:m', strtotime($training->begin)) }}">
        </div>
      </div>
      <div class="form-group">
        <label for="location">Lokasi</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-location-arrow"></i></span>
          </div>
          <input type="text" name="location" class="form-control" id="location" required value="{{ $training->location }}">
        </div>
      </div>
      <div class="form-group">
        <label for="">Fakultas & Jurusan</label>
        <div id="accordion">
          <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
          <div class="card card-primary">
            <div class="card-header bg-success">
              <h4 class="card-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Daftar Fakultas dan Jurusan Partisipan</a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="card-body">
                <ul class="list-group list-group-flush active" style="max-height:250px; overflow: auto">
                  @php  $faculties = App\Faculties::all(); @endphp
                    @foreach ($faculties as $faculty)
                      <li class="list-group-item bg-danger">{{$faculty->name}}</li>
                      @foreach ($faculty->majors as $major)
                        <li class="list-group-item">
                            <div class="custom-control custom-switch custom-switch-off-default custom-switch-on-success">
                              <input type="checkbox" class="custom-control-input" id="{{$major->id}}" name="majors[]" value="{{$major->id}}"
                              @if( in_array($major->id, $training->majors)) checked="1" @endif>
                              <label class="custom-control-label" for="{{$major->id}}">{{ $major->name }}</label>
                            </div>
                        </li>
                      @endforeach
                    @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="editor">Deskripsi Pelatihan</label>
        <textarea name="body" class="form-control my-editor" cols="30" rows="10">
          {!! $training->body !!}
        </textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success float-right">Tambah</button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('js-bottom')
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('.imgheader')
              .attr('src', e.target.result)
              .width('auto')
              .height(200);
              console.log(e);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }

  $(function() {
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePicker24Hour: true,
      timePickerIncrement: 15,
      singleDatePicker: true,
      locale: {
        format: 'DD/MM/YYYY HH:mm'
      }
    })
  });
</script>
@endsection