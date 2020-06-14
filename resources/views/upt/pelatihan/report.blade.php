@extends('upt.app.root')

@section('menu-title', 'Laporan')

@section('menu-path')
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Laporan</li>
@endsection
    
@section('content')
  @php 
    $trainings = App\Training::where('status', 2)->orderByDesc('begin')->get(); 
  @endphp
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Pilih pelatihan</h3>
  </div>
  <div class="card-body">
    <table class="table table-striped table-sm" style="font-size:10pt">
      <thead>
      <tr>
        <th style="width:20px">#</th>
        <th style="width:140px">Tanggal & Waktu</th>
        <th>Pelatihan</th>
        <th style="width:200px">Laporan</th>
        <th>Kehadiran</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($trainings as $trn)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ date('d-m-Y, H:i', strtotime($trn->begin)) }}</td>
              <td>{{ $trn->name }}</td>
              <td><a target="_blank" href="{{ route('upt.pelatihan.rekapitulasi.frm', $trn->id) }}"> <i class="fa fa-print" aria-hidden="true"></i> Cetak rekapitulasi peserta</a></td>
              <td><a href="{{ route('upt.pelatihan.review', $trn->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> Lihat kehadiran</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
