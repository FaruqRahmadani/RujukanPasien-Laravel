<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Surat Rujukan</title>
  <style>
  .title{
    font-size: 10pt;
    font-weight: bold;
  }
  .content{
    margin-left: 15px;
    margin-right: 15px;
  }
  th, td {
    vertical-align:top;
  }
  .tabel-isi{
    border-collapse: collapse;
  }

  .tabel-isi > thead > tr > th{
    padding-top: 10px;
    padding-bottom: 10px;
  }

  .tabel-isi > thead > tr > th, .tabel-isi > tbody > tr > td {
    border: solid 1px black;
  }
  .tabel-isi > tbody > tr > td {
    padding-left: 6px;
    padding-right: 6px;
    padding-top: 5px;
    padding-bottom: 5px;
  }

  footer{
    position: fixed;
    bottom: 200px;
    right: 50px;
  }
  </style>
</head>
<body>
  <table width="100%" align="center">
    <tr>
      <td width="15%" align="center">
        <img height="70px" src="../public/img/logo/Banjarbaru.png" alt="Banjarbaru">
      </td>
      <td align="center">
        <b class="title">
          PEMERINTAH KOTA BANJARBARU
        </b>
        <br>
        <b style="font-size: 13pt">
          PUSKESMAS GUNTUNG PAYUNG BANJARBARU
        </b>
        <br>
        Alamat : Jalan Sapta Marga, Guntung Payung, Landasan Ulin, Landasan Ulin Timur, Landasan Ulin, Kota Banjar Baru, Kalimantan Selatan 70721
      </td>
    </tr>
  </table>
  <hr>
  <table class="tabel-isi" style="width:100%">
    <thead>
      <tr>
        <th>#</th>
        <th>Nomor RM</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Poli Dari</th>
        <th>Poli Tujuan</th>
        <th>Dokter</th>
        <th>Keluhan</th>
        <th>Diagnosa</th>
        <th>Tanggal</th>
        <th class="text-center">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($Pasien as $Index=>$DataPasien)
        <tr>
          <td>{{$Index+1}}</td>
          <td>{{$DataPasien->nomor_rm}}</td>
          <td>{{$DataPasien->nama}}</td>
          <td>{{$DataPasien->umur}} Tahun</td>
          <td>{{$DataPasien->PoliDari->nama}}</td>
          <td>{{$DataPasien->PoliTujuan->nama}}</td>
          <td>{{$DataPasien->Dokter->nama}}</td>
          <td>{{$DataPasien->keluhan}}</td>
          <td>{{$DataPasien->Diagnosa->kode}}</td>
          <td>{{HTanggal::Format($DataPasien->created_at)}}</td>
          <td class="text-center" style="white-space: nowrap;">{!!$DataPasien->Status!!}</td>
        </tr>
      @endforeach
    </table>
  </body>
  </html>
