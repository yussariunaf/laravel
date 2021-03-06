@extends('upt.app.root')

@section('menu-title', 'Ubah berita')

@section('menu-path')
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('upt.berita.list') }}">Daftar berita</a></li>
  <li class="breadcrumb-item"><a href="{{ route('upt.berita.display', $news->id) }}">Lihat berita</a></li>
  <li class="breadcrumb-item active">Ubah berita</li>
@endsection
    
@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('upt.berita.update', $news->id) }}" class="p-3">
      @csrf
      <div class="form-group">
        <label for="title">Title <sup><b class="text-danger">*</b></sup></label>
        <input type="title" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $news->title }}" required>
      </div>
      <div class="form-group">
        <label for="editor">Body</label>
        <textarea name="body" class="form-control my-editor" cols="30" rows="15">
          {{ $news->body }}
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