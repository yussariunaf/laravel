@extends('user.app.root')

@section('css')
    <style>
      /* .imgblur {
        background-image: url("https://img.evbuc.com/https%3A%2F%2Fcdn.evbuc.com%2Fimages%2F96127153%2F202695695823%2F1%2Foriginal.20200310-085515?w=800&auto=format%2Ccompress&q=75&sharp=10&rect=0%2C0%2C9000%2C4500&s=a68ecf24353fcda0499133878f1705dd");
        filter: blur(6px);
        -webkit-filter: blur(6px);
        height: 500px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-top: 10px solid white;
      } */
      .profile-workshop {
        background: #f1f3f4; 
        width:30%; 
        float:right; 
        /* padding:5px;  */
        height: 400px;
        margin-top: -450px;
        padding: 35px;
      }
      .title-event {
        font-size: 13pt;
      }
      .kuota {
        bottom: 120px;
        position: absolute;        
      }

      .author{
        bottom: 200px;
        position: absolute;        
      }
      .btn-register {
        width: 23%;
        /* left: 0; */
        bottom: 70px;
        position: absolute;
      }
      .event-description {
        margin-top: -40px;
        min-height: 500px;
        background: white; 
        box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.4);
        padding: 50px 10px 10px 100px;
        border-radius: 5px;
        border: 1px solid whitesmoke;
      }
    </style>
@endsection

@section('content')
@php
    $path = Storage::url('pelatihan/'.$training->header)
@endphp
<div class="imgblur img-fluid" style="
        background-image: url('{{ url($path)}}');
        filter: blur(6px);
        -webkit-filter: blur(6px);
        height: 500px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-top: 10px solid white;"></div>
<div class="container event-public">
  <div class="thumbnail img-fluid" style="
        width:70%; 
        float:left; 
        background-image: url('{{ url($path)}}');
        background-size: 400px;
        height: 400px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        margin-top: -450px;"></div>
  <div class="profile-workshop">
    <div class="date h6">
      <div class="text-secondary">{{ date('M', strtotime($training->begin)) }}</div>
      <p>{{ date('d', strtotime($training->begin)) }}</p>
    </div>
    <div class="title-event font-weight-bold">
      {{ $training->name }}
    </div>
    <div class="author-event mt-3 author text-muted">
      by Unit Pengembangan Karir UPNVJ
    </div>
    <div class="kuota">Sisa kuota: <h4>{{ ($training->kuota == '0') ? 'Full' : $training->kuota }}</h4></div>
    <div class="btn-register">

      @php 
        $expTrn = date('Y-m-d H:i:s', strtotime(Date('Y-m-d')."23:59:00"));
        $today = date('Y-m-d');
        // $expTrn = date('Y-m-d', strtotime($training->ended));
        $userHasRegister = App\Studentticket::where('student_id', Auth::guard('user')->user()->students->id)->where('training_id', $training->id)->first(); 
      @endphp
      {{-- gimana caranya yg udah konfirm pelatihan gabisa register lg --}}
      @if ($today <= $expTrn)
        @if($training->status != 2)  <!-- sebelum RSVP ditutup, status 1 --> 
          @if ($userHasRegister != NULL) 
            @if ($userHasRegister->present == 1)
              <button class="btn btn-info btn-block" disabled>You have joined</button>
            @else
              <a href="{{ route('pelatihan.cancel', $training->id) }}" class="btn btn-outline-danger btn-block">Batalkan</a>
            @endif
          @elseif($userHasRegister == null )
            @if ($userHasRegister == NULL && $training->kuota == 0) 
              <button class="btn btn-success btn-block" disabled>Register</button>
            @elseif ($userHasRegister == NULL && $training->kuota != 0) 
              <a href="{{ route('pelatihan.register', $training->id) }}" class="btn btn-success btn-block">Register</a>
            @endif
          @endif
        @else
          <button class="btn btn-info btn-block" disabled>Closed</button>
        @endif
      @endif
    </div>
  </div>
</div>
<div class="container mb-5">
  <div class="event-description">
    <div class="row">
      <div class="col-md-8">
        <div class="h4 font-weight-lighter">Tentang pelatihan</div>
          {!! $training->body !!}
      </div>
      <div class="col-md-4">
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
@endsection