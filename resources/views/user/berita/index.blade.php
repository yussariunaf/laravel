@extends('user.app.root')

@section('css')
 <style>
 </style>
@endsection

@section('content')
<div class="container paddding">
  <div class="row mx-0">
      <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4 mt-2">Arsip Berita dan Pengumuman</div>
          <div class="mt-3"></div>
          @php
              $manyNews = App\Berita::orderbyDesc('created_at')->paginate(10);
          @endphp
          @foreach ($manyNews as $news)
            <div class="row pb-4">
              <div class="col-md-7 animate-box">
              <div><i class="fa fa-clock-o" aria-hidden="true"></i> Jumat, 12 April</div>
                <a href="{{ route('berita.detail', $news->id) }}" class="fh5co_magna py-2 news-link" target="_blank"> 
                  <div class="news-title">{{ $news->title }}</div>
                </a>
                  <div class="fh5co_consectetur"> 
                    {!! App\Http\Controllers\BeritaController::limit_text($news->body, 20) !!}
                  </div>
              </div>
            </div>
          @endforeach
      </div>
  </div>
  <div class="row mx-0">
      <div class="offset-7 col-4 text-center pb-4 pt-4">
        {{$manyNews->links()}}
       </div>
  </div>
</div>
@endsection