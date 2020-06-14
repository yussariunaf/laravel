@extends('upt.app.root')

@section('menu-title', 'Tambah Berita')

@section('menu-path')
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Tambah Berita</li>
@endsection
    
@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('upt.berita.store') }}" class="p-3">
      @csrf
      <div class="form-group">
        <label for="title">Title <sup><b class="text-danger">*</b></sup></label>
        <input type="title" name="title" class="form-control" id="title" placeholder="Enter title" required>
      </div>
      <div class="form-group">
        <label for="editor">Body</label>
        {{-- <textarea name="editor" id="editor" cols="30" rows="10" class="form-control"></textarea> --}}
        <textarea name="body" class="form-control my-editor" cols="30" rows="15"></textarea>
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
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    removeButtons: 'Cut,Copy,Paste,Undo,Redo,Anchor',
  };
  CKEDITOR.replace( 'editor', options);
</script>
@endsection