@extends('upt.app.root')

@section('menu-title', 'Daftar Pelatihan')

@section('menu-path')
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Daftar Pelatihan</li>
@endsection

@section('js-bottom')

@endsection
    
@section('content')
  @php $trainings = App\Training::whereDate('begin', '>', date('Y-m-d'))->paginate(10); @endphp

  @include('upt.pelatihan.listgroup_pelatihan')
  
<div class="card">
  <div class="card-header">
    <div class="card-title" style="font-size:11pt">Pelatihan akan datang</b></div>
    <div class="card-tools">
      <ul class="pagination pagination-sm m-0 float-right">
        {{ $trainings->links() }}
      </ul>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <table class="table" style="font-size:10pt">
      <tr>
        <th>#</th>
        <th>Tgl & Waktu</th>
        <th>Pelatihan</th>
        <th>Sisa kuota</th>
        <th>Pemateri</th>
        <th>Lokasi</th>
        <th>Informasi</th>
        <th>Options</th>
      </tr>
      @foreach ($trainings as $training)
        <tr>
          <td> {{($trainings->currentpage()-1) * $trainings ->perpage() + $loop->index + 1}} </td>
          <td> {{ date('d-m-Y H:i', strtotime($training->begin)) }}</td>
          <td> {{ $training->name }} </td>
          <td> {{ $training->kuota }} </td>
          <td> {{ $training->trainer }} </td>
          <td> {{ $training->location }} </td>
          <td> <a href="{{ route('upt.pelatihan.edit', $training->id)}}">Ubah</a> </td>
          <td>
            <a href="{{ route('upt.pelatihan.remove', $training->id) }}">Hapus </a><br/>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection
