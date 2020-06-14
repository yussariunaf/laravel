@extends('user.app.root')

@section('css')
  <style>
      .card:hover {
        -moz-box-shadow: 0 0 5px #999;
        -webkit-box-shadow: 0 0 5px #999;
        box-shadow: 0 0 5px #999;
      }
  </style>
@endsection

@section('content')
{{-- {{ dd(Auth::guard('user')->user()->students->major_id) }} --}}
  <div class="container mt-2 mb-3">
    <div class="row">
      @foreach ($trainings as $training)
      @php
          $path = Storage::url('pelatihan/'.$training->header);
      @endphp
        <div class="col-md-3">
          <a href="{{ route('pelatihan.detail', $training->id)}}" style="text-decoration: none;">
            <div class="card mt-3" style="min-height:280px">
              <img src="{{ url($path) }}" class="card-img-top img-thumbnail" style="max-height:150px; border:0px">
              <div class="card-body p-3">
                <div class="datetime" style="color:green;">
                    {{ date('D, M d, H:i A', strtotime($training->begin)) }}
                </div>
                <div class="font-weight-bold"> {{ $training->name }} </div>
                <div class="font-weight-lighter" style="bottom:2px; position:absolute">Kuota: {{ $training->kuota }}</div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
@endsection