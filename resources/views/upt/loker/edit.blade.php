@extends('upt.app.root')

@section('menu-title', 'Ubah Lowongan Kerja')

@section('menu-path')
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('upt.loker.list') }}">Daftar lowongan</a></li>
  <li class="breadcrumb-item"><a href="{{ route('upt.loker.display', $job->id) }}">Lihat lowongan</a></li>
  <li class="breadcrumb-item active">Ubah lowongan</li>
@endsection
    
@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('upt.loker.update', $job->id) }}" class="p-3" enctype="multipart/form-data">
      @csrf
      <div class="offset-3 col-6">
        @php $path = Storage::url('loker/'.$job->header); @endphp
        <img src="{{ url($path) }}" width="auto" height="200px" class="imguploadview"/><br/>
        <div class="imgnameview">{{ $job->header }}</div>
      </div>
      <div class="form-group">
        <label for="header">header</label>
        <input type="file" name="header" id="header" class="form-control" accept=".png, .jpg, .jpeg" onchange="readURL(this);">
      </div>
      <div class="form-group">
        <label for="title">Title <sup><b class="text-danger">*</b></sup></label>
        <input type="title" name="title" class="form-control" id="title" placeholder="Enter title" required value="{{ $job->title }}">
      </div>
      <div class="form-group">
        <label for="editor">Body</label>
        <textarea name="body" class="form-control my-editor" cols="30" rows="15">
          {!! $job->body !!}
        </textarea>
      </div>
      <div class="form-group">
        <a href="{{ route('upt.loker.edit', $job->id)}}" class="btn btn-default">Reset</a>
        <button type="submit" class="btn btn-success float-right">Update</button>
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
            $('.imguploadview')
                .attr('src', e.target.result)
                .width('auto')
                .height(200);
            name = input.files[0].name;
            $('.imgnameview').text(name);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script>
  $(document).ready(function() {
    $('.imguploadview').on('click', function() {
      var imgname = $(this).val();
      console.log(imgname)
    })
  });
</script>
@endsection