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
      <td width="15%" align="right">
        <img height="70px" src="../public/img/logo/Banjarbaru.png" alt="Banjarbaru">
      </td>
      <td align="center">
        <b class="title">
          PEMERINTAH KOTA BANJARBARU
        </b>
        <br>
        <b style="font-size: 13pt">
          RUMAH SAKIT DAERAH IDAMAN KOTA BANJARBARU
        </b>
        <br>
        Jalan Trikora Nomor 115 Guntung Manggis Kota Banjarbaru Kalimantan Selatan
        <br>
        Telepon (0511)6749696 Faksimili (0511)6749697
      </td>
      <td width="15%" align="left">
        <img height="70px" src="../public/img/logo/rs.jpeg" alt="RS Idaman">
      </td>
    </tr>
  </table>
  <hr>
    <h3 align="center">Data Pasien</h3>
  <table class="tabel-isi" style="width:100%">
    <thead>
      <tr>
        <th>#</th>
        <th>Nomor RM</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Poliklinik</th>
        <th>Poliklinik Tujuan</th>
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
