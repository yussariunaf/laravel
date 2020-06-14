@extends('upt.app.root')

@section('menu-title', 'Dashboard')

@section('menu-path')
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Dashboard</li>
@endsection
    
@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    @php
        $trainings = App\Training::whereDate('begin', '>', date('Y-m-d'))->count();
    @endphp
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $trainings }}</h3>
        <p>Event Upcoming</p>
      </div>
      <div class="icon">
        <i class="far fa-calendar-check"></i>
      </div>
      <a href="{{ route('upt.pelatihan.upcoming')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    @php
        $news = App\Berita::count();
    @endphp
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $news }} <!--<sup style="font-size: 20px">%</sup> --> </h3

        <p>News & Info</p>
      </div>
      <div class="icon">
        <i class="far fa-newspaper"></i>
      </div>
      <a href="{{ route('upt.berita.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    @php
        $jobs = App\Loker::count();
    @endphp
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $jobs }}</h3>

        <p>Job & Internship</p>
      </div>
      <div class="icon">
        <i class="fas fa-mail-bulk"></i>
      </div>
      <a href="{{ route('upt.loker.list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    @php
        $stds = App\Student::count();
    @endphp
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $stds }}</h3>

        <p>Students</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-graduate"></i>
      </div>
      <a href="#" class="small-box-footer">UPN "Veteran" Jakarta</a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
@endsection