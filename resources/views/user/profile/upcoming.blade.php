@extends('user.profile.partials.root')

@section('sub-css')
  <style>
      .card:hover {
        -moz-box-shadow: 0 0 5px #999;
        -webkit-box-shadow: 0 0 5px #999;
        box-shadow: 0 0 5px #999;
      }
  </style>
@endsection

@section('sub-content')
  <div class="p-3" style="background: #f8f8f8">
    <div class="h5 font-weight-lighter">Daftar tiket</div>
  @foreach ($trainings as $trn)
  @php $path = Storage::url('pelatihan/'.$trn->header); @endphp
  <a href="{{ route('pelatihan.ticket', [$trn->id, Auth::guard('user')->user()->students->id] )}}" style="text-decoration:none">
    <div class="col-md-10">
      <div class="card mb-2" style="border:none;">
        <div class="card-body p-3 row">
          <div class="col-1">
            {{date('M', strtotime($trn->begin))}} </br> {{date('d', strtotime($trn->begin))}}
          </div>
          <div class="col-7">
            <img src="{{ url($path) }}" class="img-fluid" style="width:100%; height:150px">
          </div>
          <div class="col-4">
            <div class="h5">{{ Str::words($trn->name, '8') }} </div>
            <div style="bottom:10px; position:absolute"> {{ date('D, M d, H:i A', strtotime($trn->begin))}} </div>
            {{-- <div style="bottom:0px; position:absolute"> <i class="fa fa-ticket text-danger" aria-hidden="true"></i> See the ticket </div> --}}
          </div>
        </div>
      </div>
    </div>
  </a>
  @endforeach
  </div>
  <div class="mt-2">
    {{ $trainings->links() }}
  </div>
@endsection