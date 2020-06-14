@extends('upt.app.root')

@section('menu-title', 'Daftar Lowongan Kerja dan Magang')

@section('menu-path')
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Daftar lowongan</li>
@endsection
    
@section('content')
  @php
    $jobs = App\Loker::orderByDesc('created_at')->paginate(10);
  @endphp
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Lowongan Kerja dan Magang</h3>
    <div class="card-tools">
      <ul class="pagination pagination-sm m-0 float-right">
        {{ $jobs->links() }}
      </ul>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <table class="table" style="font-size:11pt">
      <tr>
        <th style="width: 10px">#</th>
        <th style="width: 20%">Header</th>
        <th style="width: 50%">Title</th>
        <th>Description</th>
        <th style="width: 7%">Options</th>
      </tr>
      @foreach ($jobs as $job)
      @php
        $path = Storage::url('loker/'.$job->header);
      @endphp
        <tr>
          <td> {{($jobs->currentpage()-1) * $jobs->perpage() + $loop->index + 1}} </td>
          <td> <img src="{{ url($path) }}" width="200px" height="100px"></td>
          <td> {{$job->title }}</td>
          <td><a href="{{ route('upt.loker.display', $job->id)}}"><i class="far fa fa-eye"></i> Selengkapnya..</a></td>
          <td>
            <a href="{{ route('upt.loker.remove', $job->id) }}">
              <span class="badge bg-warning p-2"><i class="fas fa-lg fa-trash"></i></span>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection
