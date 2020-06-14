<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .main {
      width:800px; 
      height:850px; 
      padding:20px; 
      text-align:center; 
      border: 10px solid #28a745;
    }
    .content {
      width:750px; 
      height:800px; 
      padding:20px; 
      text-align:center; 
      border: 5px solid #ffc107
    }
    .title {
      font-size:40px; 
      font-weight:bold;
      font-family: 'Lobster', cursive;
      margin-bottom: 20px;
    }
    .name, .training, .date, .warek, .warek-name, .warek-nip, .upt {
      font-family: 'Roboto', sans-serif;
    }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
  <div class="main">
    <div class="content">
           <div class="logo">
             <img src="https://upnvj.ac.id/id/files/thumb/ec6d0583ae84f67cc4f4c4fcd174deca/520" width="150px" height="150px" style="margin-top:15px; margin-bottom:12px"><br/>
             <div class="upt"><i>Unit Pelaksana Teknis UPN "Veteran" Jakarta</i></div>
           </div>
           <div class="title">Certificate of Attendance</div>
           <div style="font-size:22px; margin-bottom:17px"><i>This is to certify that</i></div>
           <div style="font-size:27px; margin-bottom:32px" class="name"><b>{{ $cert->user_name }}a</b></div>
           <div style="font-size:22px; margin-bottom:17px"><i>has attended</i></div>
           <div style="font-size:27px; margin-bottom:32px" class="training"><b>{{ $cert->training_name }}</b></div>
           <div style="font-size:22px; margin-bottom:17px"><i>On</i></div>
           <div style="font-size:22px; margin-bottom:32px" class="date">{{ date('M d, Y', strtotime($cert->training_date)) }}</div>
           <div>
             <div class="warek" style="margin-bottom:50px">Wakil Rektor <br/>Bidang Kemahasiswaaan dan Kerja Sama <br/>UPN"Veteran"Jakarta </div><br/><br/>
             <div class="warek-name">Dr. Ir. Halim Mahfud, M.Sc.</div>
             <div class="hr"><hr style="width: 220px; margin-bottom:-1px; margin-top:-2px"></div>
             <div class="warek-nip">195711211987031002</div>
           </div>
    </div>
    </div>
</body>
</html>