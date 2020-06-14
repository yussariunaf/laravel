@extends('user.app.root')

@section('content')
<div class="container paddding">
  <div class="row mx-0">
      <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4 mt-2">Info Lowongan</div>

          <!-- The form -->
          <form action="{{ route('loker.search') }}" method="GET" class="example">
            <input type="text" placeholder="Search.." name="search" value="{{ old('search') }}">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>

          @foreach ($jobs as $job)
            @php $path = Storage::url('loker/'.$job->header); @endphp
            <div class="row pb-2 pt-2">
              <div class="col-md-5">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="{{ url($path) }}" class="img-fluid"/></div>
                </div>
              </div>
              <div class="col-md-7 animate-box">
                  <a href="{{ route('loker.detail', $job->id) }}" class="fh5co_magna py-2" target="_blank"> 
                    {{ $job->title }}
                  </a><br/>
                  <div class="fh5co_mini_time py-3"> 
                    UPT UPNVJ - {{ date('M, d Y', strtotime($job->created_at))}}
                  </div>
                  <div class="fh5co_consectetur"> 
                    {!! App\Http\Controllers\BeritaController::limit_text($job->body, 20) !!}
                  </div>
              </div>
            </div>
          @endforeach
      </div>
  </div>
  <div class="row mx-0">
    <div class="offset-6 col-4 text-center pb-4 pt-4">
      {{ $jobs->links()}}
     </div>
</div>
</div>
@endsection