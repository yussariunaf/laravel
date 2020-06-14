@extends('upt.app.root')

@section('menu-title', 'Lihat Lowongan')

@section('menu-path')
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('upt.loker.list') }}">Daftar lowongan</a></li>
  <li class="breadcrumb-item active">Lihat lowongan</li>
@endsection

@section('css')
  <style>
    .card-img-top {
        width: 100%;
        height: 600px;
        object-fit: cover;
    }
  </style>
@endsection
    
@section('content')
<div style="background-color:#f1f3f4" class="">
  <div class=""> 
    <a href="{{ route('upt.loker.edit', $job->id) }}"><i class="far fa fa-edit"></i> Ubah</a>
    <div style="height: 600px;">
      <img src="{{ url($path) }}" style="width: 100%;max-height: 100%"/>
    </div>
    <div class="container p-2" style="background: #f1f3f4">
      {{-- <i class="fa fa-user-circle" aria-hidden="true"></i> --}}
      <i class="fa fa-calendar" aria-hidden="true"></i> {{ date('M, d Y', strtotime($job->created_at)) }}
      &nbsp; &nbsp;
      <i class="fa fa-folder" aria-hidden="true"></i> Lowongan Kerja
      &nbsp; &nbsp;
      <i class="fa fa-user-circle" aria-hidden="true"></i> By UPT UPNVJ
    </div>
    <div class="card container">
      <div class="card-body mt-3">
        <div class="card-title" style="font-size:20pt">{{ $job->title }}</div>
        <p class="card-text">
          {!! $job->body !!}
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
