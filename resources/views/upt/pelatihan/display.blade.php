@extends('upt.app.root')

@section('menu-title', 'Daftar Berita')

@section('menu-path')
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item">Daftar Pelatihan</li>
  <li class="breadcrumb-item active">Lihat Pelatihan</li>
@endsection

@section('content')
@php
    $path = Storage::url('pelatihan/'.$training->header)
@endphp
  <div class="container">
    <a href="{{ route('upt.pelatihan.edit', $training->id) }}"><i class="far fa fa-edit"></i> Ubah</a>
    <div class="card">
      <div class="card-body">
        <div class="header">
          <div class="imgheader" 
               style="width:70%; 
                      height:350px; 
                      float:left; 
                      background-image: url('{{ url($path) }}');
                      background-repeat:no-repeat;
                      background-size:100% 100%"></div>
          <div class="titleheader p-3" 
               style="width: 30%; 
                      height: 350px; 
                      float:right; 
                      background:#f1f3f4">
            <div class="date h6">
              <div class="text-secondary">{{ date('M', strtotime($training->begin)) }}</div>
              <p>{{ date('d', strtotime($training->begin)) }}</p>
            </div>
            <div class="font-weight-bold" style="font-size:13pt">
              {{ $training->name }}
            </div>
            <div class="author-event mt-3 text-muted" style="bottom:160px; position:absolute">
              by Unit Pengembangan Karir UPNVJ
            </div>
            <div class="kuota" style="bottom:85px; position:absolute;">Sisa kuota: <h4>{{ $training->kuota }}</h4></div>
            <div class="btn-register" style="bottom:35px; position:absolute; width:25%">
              <button type="submit" class="btn btn-success btn-block">Register</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="body">
          <div class="row">
            <div class="description p-3" style="padding-right:60px; width:70%; float:left">
              <div class="h4">Tentang Pelatihan</div>
              {!! $training->body !!}
            </div>
            <div class="event-info p-3" style="width:30%; float:right;">
              <div class="datetime">
                <p class="h5">Pemateri</p>
                <div>{{ $training->trainer }}</div>
              </div>
      
              <div class="datetime mt-5">
                <p class="h5">Date And Time</p>
                {{-- <div>Fri, March 20, 2020</div> --}}
                <div>{{ date('D, F d, Y', strtotime($training->begin)) }}</div>
                <div>{{ date('H:i A', strtotime($training->begin)) }} – End</div>
              </div>
      
              <div class="location mt-5">
                <p class="h5">Location</p>
                <div> {{ $training->location }} </div>
              </div>
      
              <div class="participant mt-5">
                <p class="h5">Participants</p>
                  @php
                      $majors = $training->majors;
                        $getMajors = App\Majors::whereIn('id', $majors)->get(); 
                  @endphp
                    @foreach ($getMajors as $major)
                        <div> <b>{{ $major->faculty->name }}</b> - {{ $major->name}}</div>
                    @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection