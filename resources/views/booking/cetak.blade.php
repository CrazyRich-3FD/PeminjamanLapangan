<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .slide1{
            background-color: #f4b661;
            width: 40%;
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
            font-weight: 400;
            font-size: 28px;
            line-height: 40px;
            padding-top: 10px;
            padding-bottom: 15px;
            border-bottom: 5px solid #facc8c;
        }
        .receipt span {
            font-weight: 900;
            font-size: 30px;
        }
        .entry1 {
            border-bottom: 3px solid #facc8c;
            height: 74px;
            overflow: hidden;
            padding-top: 15px;
        }
        .entry2 {
            height: 130px;
            overflow: hidden;
            padding-top: 15px;
        }

        .slide2{
            background-color: #bcc7d1;
            width: 60%;
            height: 457px;
            float: right;
            border-radius: 0 5px 5px 0;
        }
        .content {
            margin-top: 50px;
            margin-left: 40px;
            margin-right: 40px;
        }
        .header {
            overflow: hidden;
            border-bottom: 5px solid #b4bbbe;
            height: 50px;
        }
        .header label {
            text-align: left;
        }
        .main {
            margin-top: 35px;
        }
        h4 {
              font-weight: 300;
              font-size: 13px;
              color: #96a2ad;
          }
        h3 {
            color: #58636a;
        }
        h5 {
            color: #9aa3ab;
            font-weight: 300;
            line-height: 15px;
        }
        .label{
            color: #ffffff;
            font-weight: 500;
            font-size: 25px;
        }
        .line1{
            font-size: 18px;
        }
        .line2{
            font-size: 18px;
        }
        .message {
            margin-top: 40px;
        }
        .message p {
            font-weight: 300;
            font-size: 18px;
            color: #7a838d;
            line-height: 20px;
        }
        .footer {
            overflow: hidden;
            border-top: 3px solid #b4bbbe;
            margin-top: 10px;
            padding-top: 33px;
        }
        .footer h3 {
            color: #7a838d;
            text-align: right;
            margin-top: 0px !important;
        }
    </style>
</head>
<body>
    <div class="slide1">
        <div class="info-box">
            <div class="receipt">
                Tanda Terima <br> <span>
                    <h3 style="margin: 0; color: #3B71CA;" bold> Boking Lapangan</h3>
                </span>
            </div>
            <div class="entry1">
                <label class="label">Lapangan:</label> <br> <label class="line1">{{ $w->pin->lap->nama }}</>
            </div>
            <div class="entry2">
                <label class="label">Tanggal & Waktu:</label>
                <br> <label class="line2">
                    <br> {{ $w->tgl_awal }} {{ $w->jam_awal }}WIB
                    <br> ===== Sampai ===== <br> {{ $w->tgl_akhir }} {{ $w->jam_akhir }}WIB
                </=>
            </div>

        </div>
    </div>
    <div class="slide2">
        <div class="content">
            <div class="header">
                <label class="">{{ $w->pin->created_at->format('d-m-Y H:i:s') }} WIB</label>
            </div>
            <div class="main">
                <h2>Peminjaman Lapangan Anda Sudah Terkonfirmasi Selamat Menikmati</h2>
            </div>
            <div class="message">
                <p>Hello {{ $w->pin->us->name }}, <br> Setelah selesai booking lapangan <br>Klik button selesai pada
                    daftar riwayat <br> transaksi ini muncul di akun anda</p>
            </div>
            <div class="footer">
                <h3>Booking ID: {{ $w->pin->idpinjam }}</h3>
            </div>
        </div>
    </div>
</body>
</html>