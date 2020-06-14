<!doctype html>
  <head>
    <title>UPT UPNVJ</title>
    <style>
      .ticket {
        min-height: 400px;
        border: 3px solid #dee3e2;
        padding: 20px 20px 20px 25px;
      }
      .lft {
        width: 68%; 
        float:left;
      }
      .rht {
        width: 30%;
        float:right;
      }
      .ticket-title {
        font-size: 15pt;
      }
      .general-admission {
        margin-top: 40px;
        margin-bottom: 5px;
      }
      .student-id {
        margin-bottom: 40px;
      }
      .event-begin,
      .order-create {
        font-size: 9pt;
      }
      .order-info {
        font-size:8pt; 
        margin-top:30px; 
        color:gray
      }
      .ticket_code_header, {
        display: block;
        text-align:right; 
        float:right;
        margin-top: 112px;
      }
      .ticket_code {
        display: block;
        text-align:right; 
        float:right;
        margin-top: 112px;
      }
    </style>
  </head>
  <body>
    <div class="ticket">
      <div class="lft">
        <div class="ticket-title"> {{ $trn->training_name }} </div>
        <div class="general-admission"><b>General Admission</b></div>
        <div class="student-id">
          <table border="1" style="border-collapse:collapse; font-size:8pt" cellpadding="3">
            <tr>
              <th>Nim</th>
              <th>Nama</th>
              <th>Fakultas</th>
              <th>Jurusan</th>
            </tr>
            <tr>
              <td>{{ $trn->user_nim }}</td>
              <td>{{ $trn->user_name }}</td>
              <td>{{ $trn->faculty_name }}</td>
              <td>{{ $trn->major_name }}</td>
            </tr>
          </table></div>
        <div class="event-begin"> {{ date('D, F d, Y', strtotime($trn->event_begin)) }} from {{ date('H:i A', strtotime($trn->event_begin)) }} (WIB) </div>
        <div class="order-info"> Order Information </div>
        <div class="order-create"> Order #{{ $trn->ticket_id }}. Ordered by {{ auth()->user()->name }} on {{ date('F d, Y H:i A', strtotime($trn->order_ticket_date)) }} </div>
      </div>
      <div class="rht">
        <div class="img-view"></div>
          <img src="{{ public_path('/storage/pelatihan/'.$trn->img_path) }}" height="110px" width="200px"/>
        </div>
        <div class="ticket_code_header">
          Ticket Code <br/> # {{ $trn->ticket_code }}
        </div>
      </div>
    </div>
  </body>
</html>