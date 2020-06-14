<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('upt-style/plugins/datatables/dataTables.bootstrap4.css') }}">
    

    <title>Hello, world!</title>
  </head>
  <body>
    @php
        $stds = App\student::orderBy('major_id')->get();
    @endphp
    <div class="container mt-2">
      <table class="table" id="example1">
        <thead>
          <tr>
            <th>#</th>
            <th>Jurusan</th>
            <th>Name</th>
            <th>Nim</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($stds as $std)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $std->major->name }}</td>
              <td>{{ $std->users->name }}</td>
              <td>{{ $std->users->nim }}</td>
              <td>{{ $std->users->email }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- DataTables -->
    <script src="{{ asset('upt-style/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('upt-style/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
          "pageLength": 50
        });
      });
    </script>
  </body>
</html>