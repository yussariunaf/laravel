@extends('upt.app.root')

@section('menu-title', 'Lihat berita')

@section('menu-path')
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('upt.berita.list') }}">Daftar berita</a></li>
  <li class="breadcrumb-item active">Lihat berita</li>
@endsection
    
@section('content')
<div class="container offset-1 col-10 p-2">
  <div class="card">
    <div class="card-body">
      <a href="{{ route('upt.berita.edit', $news->id) }}"><i class="far fa fa-edit"></i> Ubah</a>
      <div class="h3">
        {{ $news->title }}
      </div>
      <p>By: UPT UPNVJ</p>
      <hr/>
      <p>Posted on {{ date('M d, Y', strtotime($news->created_at)) }} at {{ date('g:i A', strtotime($news->created_at)) }}</p> 
      <hr/>
      <div class="mt-2">
        {!! $news->body !!}
      </div>
    </div>
  </div>
</div>
@endsection
