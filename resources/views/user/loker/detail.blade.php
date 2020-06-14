@extends('user.app.root')

@section('css')
@endsection

@section('content')
@php $path = Storage::url('loker/'.$job->header) @endphp
<div style="background-color:#f1f3f4" class="">
  <div>     
      <div style="height: 600px;">
        <img src="{{ url($path) }}" style="width: 100%;max-height: 100%"/>
      </div>
    <div class="container p-2" style="background: #f1f3f4">
      {{-- <i class="fa fa-user-circle" aria-hidden="true"></i> --}}
      <i class="fa fa-calendar-o" aria-hidden="true"></i> {{ date('M, d Y', strtotime($job->created_at)) }}
      &nbsp; &nbsp;
      <i class="fa fa-folder-o" aria-hidden="true"></i> Lowongan Kerja
      &nbsp; &nbsp;
      <i class="fa fa-user-circle" aria-hidden="true"></i> By UPT UPNVJ
    </div>
    <div class="card">
      <div class="card-body container mt-3 offset-2 col-8">
        <h4 class="card-title">{{ $job->title }}</h4>
        <p class="card-text">
          {!! $job->body !!}
        </p>
      </div>
    </div>
  </div>
</div>
@endsection