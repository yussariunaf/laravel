@extends('user.app.root')

@section('css')
  
@endsection

@section('content')
<section id="about" class="about">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-6 d-flex flex-column justify-content-center about-content">
        <div class="section-title">
          <h2 class="mb-3">Profil UPT Pengembangan Karir dan Kewirausahaan</h2>
          <p class="mb-3">UPT Pengembangan Karir dan Kewirausahaan UPN "Veteran" Jakarta merupakan  unit  pelaksana  teknis  di  bidang  layanan pengembangan karir dan kewirausahaan mahasiswa yang mempunyai tugas  melaksanakan  penyiapan  pengembangan  dan pembinaan karir dan kewirausahaan mahasiswa. Dalam  melaksanakan  tugasnya, UPT  Pengembangan  Karir  dan  Kewirausahaan menyelenggarakan fungsi: </p> 
          <ol>
            <li>penyusunan rencana, program, dan anggaran UPT</li>
            <li>penyiapan pengembangan dan pembinaan karir mahasiswa</li>
            <li>pengembangan dan pembinaan kegiatan kewirausahaan mahasiswa</li>
            <li>pelaksanaan urusan tata usaha UPT.</li>
          </ol>
        </div>
      </div>
      <div class="col-6 d-flex flex-column justify-content-center about-content">
        <img src="{{ asset('storage/upt/foto-org.jpg') }}" width="100%" height="500px" />  
      </div>
    </div>
  </div>

  <div class="container mt-2">
    <div class="row no-gutters">
      <div class="col-12 d-flex flex-column justify-content-center about-content">
        <div class="section-title">
          <div class="mb-3 h4">
            Berdasarkan Surat Keputusan Rektor UPN "Veteran"Jakarta Nomor : KEP/858/UN61.0/2017. Tanggal 22 November 2017 Tentang Organisasi UPN "Veteran"Jakarta
          </div>
          <div class="text-center">
            <img src="{{ asset('user-style/images/struktur_kepegawaian_upn.png')}}">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection