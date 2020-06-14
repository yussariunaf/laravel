<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>UPT UPNVJ</title>
    <style>
      .detail-pelatihan:hover {
        outline: 2px solid #d7d1c9;
      }
      .detail-pelatihan {
        outline: 1px solid #e0e0e0;
      }
      .ticket-layout {
        border: 2px solid #d7d1c9;
        padding: 10px 5px 5px 10px;
      }
      body {
        font-family: 'Roboto', sans-serif;
      }
    </style>
  </head>
  <body style="background: #f8f7fa">
    {{-- {{ dd($trn) }} --}}
      <div class="container p-2">
        <div class="row mt-4">
          <div class="col-3">
            <a style="font-size:11pt" href="{{ route('profile.upcoming') }}"> <i class="fa fa-angle-left"></i> Back to Current Orders  </a>
          </div>
          <div class="col-9 h4 font-weight-lighter text-center">Preview Ticket</div>
        </div>
        <div class="row">
          <div class="col-3">
            <div>
              <a href="{{ route('pelatihan.ticket.generate', [$trn->training_id, $trn->student_id]) }}" class="btn btn-success btn-block" target="_blank" style=""> <i class="fa fa-print" aria-hidden="true"></i> Print Ticket</a>
            </div>
            <div class="mt-2 detail-pelatihan">
              <a href="{{ route('pelatihan.detail', $trn->training_id) }}" class="btn btn-block">Detail Pelatihan</a>
            </div>
          </div>
          <div class="col-9" style="background: white">
            <div class="row ticket-layout p-4">
              <div style="float:left; width:70%">
                <div class="h3 font-weight-bolder"> {{ $trn->training_name }} </div>
                <div style="bottom:180px; position:absolute">
                  <span class="font-weight-bolder">General Admission</span>
                  <table class="table table-sm" style="width:100%">
                    <thead>
                      <tr>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Fakultas</th>
                        <th>Jurusan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ $trn->user_nim }}</td>
                        <td>{{ $trn->user_name }}</td>
                        <td>{{ $trn->faculty_name }}</td>
                        <td>{{ $trn->major_name }}</td>
                      <tr>
                    </tbody>
                  </table>
                </div>
                <div style="bottom:40px; position:absolute">
                  <div class="mt-5"> {{ date('D, F d, Y', strtotime($trn->event_begin)) }} from {{ date('H:i A', strtotime($trn->event_begin)) }} (WIB)</div>
                  <div class="text-muted mt-4" style="font-size:10pt">Order Information</div>
                  <div> Order #{{ $trn->ticket_id }}. Ordered by {{ auth()->user()->name }} on {{ date('F d, Y H:i A', strtotime($trn->order_ticket_date)) }} </div>
                </div>
              </div>
              <div style="width:30%">
                <div style="float:right;">
                  <img src="{{ url(Storage::url('pelatihan/'.$trn->img_path)) }}" style="width:200px; height:100px" class="img-fluid">
                </div>
                <div style="margin-top: 200px; padding:100px 10px 10px 50px">
                    <span class="font-weight-lighter">Ticket Code</span>
                    <div class="h5 font-weight-bold">#{{ $trn->ticket_code }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>