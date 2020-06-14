@extends('upt.app.root')

@section('menu-title', 'Daftar Berita')

@section('menu-path')
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
  <li class="breadcrumb-item active">Daftar berita</li>
@endsection
    
@section('content')
  @php
    $news = App\Berita::orderByDesc('created_at')->paginate(10);
  @endphp
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Berita dan Pengumuman</h3>
    <div class="card-tools">
      <ul class="pagination pagination-sm m-0 float-right">
        {{ $news->links() }}
      </ul>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <table class="table" style="font-size:11pt">
      <tr>
        <th style="width: 10px">#</th>
        <th style="width: 60%">Title</th>
        <th>Description</th>
        <th style="width: 15%">Options</th>
      </tr>
      @foreach ($news as $nw)
        <tr>
          <td> {{($news ->currentpage()-1) * $news ->perpage() + $loop->index + 1}} </td>
          <td> {{$nw->title }}</td>
          <td>
            <a href="{{ route('upt.berita.display', $nw->id)}}">
              <i class="far fa fa-eye"></i> Selengkapnya..
            </a>
          </td>
          <td>
            {{-- <span class="badge bg-warning p-2"><i class="far fa-lg fa-eye"></i></span> --}}
            {{-- <a href="{{ route('upt.berita.edit', $nw->id) }}"><span class="badge bg-warning p-2"><i class="far fa-lg fa-edit"></i></span></a> --}}
            <a href="{{ route('upt.berita.remove', $nw->id) }}">
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
