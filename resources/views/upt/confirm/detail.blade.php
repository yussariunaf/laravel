@extends('upt.app.root')

@section('menu-title', 'Pelatihan')

@section('menu-path')
  @if (session('previous-route') != 'upt.pelatihan.report')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      @if (session('previous-route') == 'upt.pelatihan.today')
        <li class="breadcrumb-item"><a href="{{ route('upt.pelatihan.today') }}">Pelatihan hari ini</a></li>
      @else 
        <li class="breadcrumb-item"><a href="{{ route('upt.pelatihan.past') }}">Arsip pelatihan</a></li>
      @endif
    <li class="breadcrumb-item active">Detail pelatihan</li>
  @else
    <li class="breadcrumb-item"><a href="{{ route('upt.pelatihan.report') }}"> <i class="fa fa-clipboard" aria-hidden="true"></i> Daftar laporan</a></li>
  @endif
@endsection
    
@section('content')
      <div class="row">
        <div class="col-5">
          <div class="card">
            <div class="card-body">
          <div class="trninfo">
            <div class="h4 font-weight-lighter">General</div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item" style="font-size:11pt">
                <div class="font-weight-bold float-left">Kode</div>
                <div class="float-right">{{ $trn->code }}</div>
              </li>
              <li class="list-group-item" style="font-size:11pt">
                <div class="font-weight-bold float-left">Pelatihan</div>
                <div class="float-right">{{ $trn->name }}</div>
              </li>
              <li class="list-group-item" style="font-size:11pt">
                <div class="font-weight-bold float-left">Pemateri</div>
                <div class="float-right">{{ $trn->trainer }}</div>
              </li>
              <li class="list-group-item" style="font-size:11pt">
                <div class="font-weight-bold float-left">Tgl & Waktu</div>
                <div class="float-right">{{ date('M, d-Y H:i', strtotime($trn->begin)) }} (WIB)</div>
              </li>
              <li class="list-group-item" style="font-size:11pt">
                <div class="font-weight-bold float-left">Lokasi</div>
                <div class="float-right">{{ $trn->location }}</div>
              </li>
              <li class="list-group-item" style="font-size:11pt">
                <div class="font-weight-bold float-left">Sisa kuota</div>
                <div class="float-right">{{ $trn->kuota }}</div>
              </li>
            </ul>
          </div>
            </div>
          </div>
        </div>
        <div class="col-7">
          <div class="card">
            <div class="card-body">
              <div class="h4 font-weight-lighter">Partisipan</div>
              <div>
                <table class="table table-sm" id="example1" style="font-size:10pt">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Jurusan</th>
                      <th>Mahasiswa</th>
                      <th>Registered</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($att as $present)
                      <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td> {{ $present->jurusan }}</td>
                        <td> {{ $present->student }}</td>
                        <td> {{ date('H:i', strtotime($present->updated_at)) }} (WIB)</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
            @if (((session('previous-route') == 'upt.pelatihan.report') && ($trn->status == 2)) && sizeof($att) > 0)
              <div>
                <a href="{{ route('upt.pelatihan.send.certificate', $trn->id) }}" class="btn btn-success float-right">Bagikan sertifikat kepada peserta</a>
              </div>
            @endif
        </div>
  </div>
@endsection
