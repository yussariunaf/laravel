<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
  </style>
</head>
<body style="margin:50">
  @php
      $training = App\Training::find($trnid);
      $recaps = App\Recapitulation::where('training_id', $trnid)->get();
      // dd($recaps->toArray())
  @endphp
  <div class="recapitulation">
    <h2 class="header">Data Rekapitulasi Peserta Pelatihan</h2>
      <div>
        <table>
          <tr>
            <th style="text-align:right">Judul</th>
            <th>:</th>
            <td>{{ $training->name }}</td>
          </tr>
          <tr>
            <th>Tanggal</th>
            <th>:</th>
            <td>{{ date('d M Y', strtotime($training->begin)) }}</td>
          </tr>
          <tr>
            <th>Tempat</th>
            <th>:</th>
            <td>{{ $training->location }}</td>
          </tr>
        </table>
      </div>
      <div>
        <table border="1" style="border-collapse:collapse; margin-top:10px" cellpadding="4">
          <thead>
            <tr>
              <th>No</th>
              <th>Fakultas</th>
              <th>Program Studi</th>
              <th>Jumlah Daftar</th>
              <th>Jumlah Hadir</th>
            </tr>
          </thead>
          <tbody>
            @php
                $totallyPresents = 0;
                $totallyRegisterAll = 0;
            @endphp
            @foreach ($recaps as $r)
            @php 
              $totallyPresents += $r->presents_count;
              $totallyRegisterPerMajor = $r->absents_count + $r->presents_count; 
              $totallyRegisterAll += $totallyRegisterPerMajor;
            @endphp
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->faculties->name   }}</td>
                    <td>{{ $r->majors->name }}</td>
                    <td>{{ (($totallyRegisterPerMajor)!= 0) ? $totallyRegisterPerMajor : 0 }}</td>
                    <td>{{ ($r->presents_count != 0) ? $r->presents_count : 0 }}</td>
                  </tr>
            @endforeach
          </tbody>  
          <tfoot>
            <tr>
              <th colspan="3" style="text-align:right; padding:10px">Total</th>
              <td>{{ $totallyRegisterAll }}</td>
              <td>{{ $totallyPresents }}</td>
            </tr>
          </tfoot>
        </table>
      </div>
  </div>
</body>
</html>