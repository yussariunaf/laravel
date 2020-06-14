@extends('user.app.root')

@section('content')

{{-- Main Feature --}}
<div class="container-fluid paddding">
  <div class="row mx-0">
      <div class="col-md-12">
          <div class="row">
            <div class="col-md-4 paddding animate-box" data-animate-effect="fadeIn">
              <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('user-style/images/pelatihan.jpg')}}" alt="img"/>
                  <div class="fh5co_suceefh5co_height_position_absolute"></div>
                  <div class="fh5co_suceefh5co_height_position_absolute_font_2"><br/><br/>
                      <div><a href="{{ route('pelatihan.index') }}" class="fh5co_good_font_2"> Pelatihan </a></div>
                  </div>
              </div>
            </div>
            <div class="col-md-4 paddding animate-box" data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('user-style/images/loker.jpg')}}" alt="img"/>
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font_2"><br/><br/>
                        <div><a href="{{ route('loker.index') }}" class="fh5co_good_font_2"> Info Lowongan </a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 paddding animate-box" data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('user-style/images/berita_pengumuman.jpg')}}" alt="img"/>
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font_2"><br/><br/>
                        {{-- <div><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Oct28,2017 </a></div> --}}
                        <div><a href="{{ route('berita.index')}}" class="fh5co_good_font_2"> Berita & Pengumuman </a></div>
                    </div>
                </div>
            </div>
          </div>
      </div>
  </div>
</div>

{{-- Pelatihan --}}
<div class="container-fluid pt-3">
  <div class="container animate-box" data-animate-effect="fadeIn">
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Dokumentasi</div>
    </div>
    <div class="owl-carousel owl-theme js" id="slider1">
      @php
          $img = ['upt01.jpg', 'upt02.jpg', 'upt03.jpg', 'upt04.jpg', 'upt05.jpg', 'upt06.jpg', 'upt07.jpg'];
          $desc = [
            'Serah Terima Jabatan Komandan Menwa Satuan UPN Veteran Jakarta Periode 2020-2021',
            'Transformasi Ekonomi Untuk Menghasilkan SDM Unggul, Tema Dies Natalis FEB UPNVJ yang ke 27',
            'Kunjungan Universitas Trilogi',
            'Wisuda Ke 64 UPN Veteran Jakarta Kampus Bela Negara',
            'Fakultas Kedokteran UPN Veteran Jakarta Gelar SENSORIK (Seminar Nasional Riset Kedokteran) dan Call For Paper',
            'Pimpinan UPNVJ Terima Audiensi PT. Katadata Indonesia',
            'Universitas Pembangunan Nasional Veteran Jakarta Kembali Hadir dalam Pameran 2 Th Indonesia Edutech Expo 2020'
          ];
      @endphp
        @for ($i = 0; $i < 7; $i++)
        <div class="item px-2">
          <div class="fh5co_latest_trading_img_position_relative">
              <div class="fh5co_latest_trading_img">
                  <img src="{{ asset('storage/upt/'.$img[$i]) }}" class="fh5co_img_special_relative"/>
              </div>
              <div class="fh5co_latest_trading_img_position_absolute"></div>
              <div class="fh5co_latest_trading_img_position_absolute_1">
                  <div class="text-white"> {{$desc[$i]}} </div>
                  {{-- <div class="fh5co_latest_trading_date_and_name_color"> Humas UPNVJ - 24 Januari,2020</div> --}}
              </div>
          </div>
        </div>
        @endfor
    </div>
  </div>
</div>

{{-- Leowongan dan pengumuman --}}
<div class="container-fluid pb-4 pt-4 paddding">
  <div class="container paddding">
      <div class="row mx-0">
          <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
              <div>
                  <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Info Lowongan kerja</div>
              </div>
              @php
                $jobs = App\Loker::paginate(5);
            @endphp
          @foreach ($jobs as $job)
            @php
                $path = Storage::url('loker/'.$job->header);
            @endphp
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
                    UPT UPNVJ - {{ date('M d, Y', strtotime($job->created_at)) }}
                  </div>
                  <div class="fh5co_consectetur"> 
                    {!! App\Http\Controllers\BeritaController::limit_text($job->body, 25) !!}
                  </div>
              </div>
            </div>
          @endforeach
          </div>
          <div class="col-md-4 animate-box" data-animate-effect="fadeInRight">
              <div>
                  <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Berita & Pengumuman</div>
              </div>
              @php
                $manyNews = App\Berita::orderbyDesc('created_at')->paginate(5);
              @endphp
              @foreach ($manyNews as $news)
                <div class="row pb-4">
                  <div class="col-12 animate-box">
                  <div><i class="fa fa-clock-o" aria-hidden="true"></i> {{ date('D, d M Y', strtotime($news->created_at)) }}</div>
                    <a href="{{ route('berita.detail', $news->id) }}" class="fh5co_magna py-2 news-link" target="_blank"> 
                      <div class="news-title">{{ $news->title }}</div>
                    </a>
                      <div class="fh5co_consectetur"> 
                        {!! App\Http\Controllers\BeritaController::limit_text($news->body, 20) !!}
                      </div>
                  </div>
                </div>
              @endforeach
              <a href="{{ route('berita.index') }}" class="btn_mange_pagging2">Selanjutnya <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
          </div>
      </div>
             
      <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
          <div class="col-12 text-center pb-4 pt-4">
              <a href="{{ route('loker.index') }}" class="btn_mange_pagging">Selanjutnya <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
           </div>
      </div>
  </div>
</div>

@endsection