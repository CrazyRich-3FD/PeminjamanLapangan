<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
          body {
              background: linear-gradient(to right, #f4b661, #f16160);
              font-family: 'Roboto', sans-serif;
          }

          .container {
              width: 50%;
              height: 40%;
              min-width: 636px;
              min-height: 456;
              margin: auto;
              margin-top: 5%;
              overflow: hidden;
              border-radius: 5px 5px 5px 5px;
              -webkit-box-shadow: 0px 5px 21px 0px rgba(128, 128, 128, 0.2);
              -moz-box-shadow: 0px 5px 21px 0px rgba(128, 128, 128, 0.2);
              box-shadow: 0px 5px 21px 0px rgba(128, 128, 128, 128, 0.2);
          }

          .left {
              background-color: #f4b661;
              width: 39%;
              height: 457px;
              border-radius: 5px 0 0 5px;
              float: left;
              color: #ffffff;
          }

          .info-box {
              margin-top: 35px;
              margin-left: 35px;
              margin-right: 35px;
          }

          .receipt {
              font-weight: 300;
              font-size: 15px;
              line-height: 26px;
              padding-top: 10px;
              padding-bottom: 15px;
              border-bottom: 1px solid #facc8c;
          }

          .receipt span {
              font-weight: 500;
              font-size: 21px;
          }

          .entry {
              border-bottom: 1px solid #facc8c;
              height: 15%;
              overflow: hidden;
              padding-top: 15px;
          }

          .entry i {
              margin-top: 4px;
              margin-right: 13px;
              float: left;
              color: #b4d8fc;
          }

          .entry p {
              font-weight: bold;
              font-size: 20px;
              color: #ffffff;

              line-height: 26px;
              margin-top: 0px !important;
              float: left;
          }

          span {
              font-weight: 500;
              color: whitesmoke;
              font-size: 16px;
          }

          .entry:last-child {
              border-bottom: none;
          }

          /* right */

          .right {
              background-color: #fefefe;
              width: 61%;
              height: 100%;
              float: left;
              border-radius: 0 5px 5px 0;
          }

          .content {
              margin-top: 50px;
              margin-left: 40px;
              margin-right: 40px;
          }

          .header {
              overflow: hidden;
              border-bottom: 1px solid #d7e2e7;
              height: 50px;
          }

          .header img {
              width: 40px;
              float: left;
          }

          h4 {
              font-weight: 300;
              font-size: 13px;
              color: #96a2ad;
          }

          .header h4 {
              text-align: right;
              margin-top: 10px;
          }

          .main {
              margin-top: 35px;
          }

          h3 {
              color: #58636a;
          }

          h5 {
              color: #99a1aa;
              font-weight: 300;
          }

          h6 {
              color: #9aa3ab;
              font-weight: 300;
              line-height: 15px;
          }

          .message {
              margin-top: 40px;
          }

          .message p {
              font-weight: 300;
              font-size: 15px;
              color: #7a838d;
              line-height: 30px;
          }

          .message h6 {
              margin-top: 10px;
          }

          .footer {
              overflow: hidden;
              border-top: 1px solid #d7e2e7;
              margin-top: 40px;
              padding-top: 33px;
          }

          .footer h6 {
              color: #7a838d;
              text-align: right;
              margin-top: 0px !important;
          }
    </style>
</head>

<body>
    <div class="container">

        <div class="left">
            <div class="info-box">
                <div class="receipt">
                    Tanda Terima <br> <span><h3 style="margin: 0; color: #3B71CA;" bold> Boking Lapangan</h3></span>
                </div>
                <div class="entry">
                    
                    <p>Lapangan: <br> <span>{{$w->pin->lap->nama}}</span></p>
                </div>
                <div class="entry">
                    <p>Tanggal & Waktu: <br> <span>{{$w->tgl_awal}} {{$w->jam_awal}} WIB</span><br><span>=> Sampai <=</span><br><span>{{$w->tgl_akhir}} {{$w->jam_akhir}} WIB</span></p>
                </div>

            </div>
        </div>

        <div class="right">
            <div class="content">
                <div class="header">
                  <img class="" style="width:40px;"
                  src="{{ asset('/peminjaman/img/logo.jpeg') }}" alt="">
                    <h4>{{$w->pin->created_at->format('d-m-Y')}} WIB</h4>
                </div>
                <div class="main">
                    <h3>Peminjaman Lapangan Anda Sudah Terkonfirmasi Selamat Menikmati</h3>
                </div>
                <div class="message">
                    <p>Hello {{$w->pin->us->name}}, <br> Setelah selesai booking lapangan <br>Klik button selesai pada daftar riwayat <br> transaksi ini muncul di akun anda</p>
                </div>
                <div class="footer">
                    <h6>Booking ID: {{$w->pin->idpinjam}}</h6>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
