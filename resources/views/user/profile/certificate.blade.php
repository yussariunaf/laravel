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
    <div class="h5 font-weight-lighter">Certificates</div>
    @php
        $stdid = auth()->guard('user')->user()->students->id;
        $stdcertificates = App\Certificate::where('student_id', $stdid)->orderByDesc('created_at')->paginate(10);
        // dd($stdcertificates->toArray());
    @endphp
      <table class="table table-sm table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Pelatihan</th>
            <th>Sertifikat</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($stdcertificates as $cert)
            <tr>
              <td> {{ $loop->iteration }}</td>
              <td> {{ $cert->training->name }}</td>
              <td> <a href="{{ route('profile.certificate.print', [$cert->training_id, $stdid]) }} "><i class="fa fa-print" aria-hidden="true"></i> Cetak Sertifikat </a></td>
            </tr>
          @endforeach            
        </tbody>
      </table>
  </div>
  <div class="mt-2">
    {{ $stdcertificates->links() }}
  </div>
@endsection