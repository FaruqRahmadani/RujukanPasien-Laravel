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
    </tr>
  </table>
  <hr>
  <table width="100%" align="center">
    <tr>
      <td align="right">
        <b>
          Nomor : {{$Pasien->nomor}}
        </b>
      </td>
    </tr>
  </table>
  <br>
  <table style="width:100%">
    <tbody>
      <tr>
        <td>Nomor Rekam Medik</td>
        <td>: {{$Pasien->nomor_rm}}</td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>: {{$Pasien->nama}}</td>
      </tr>
      <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td>: {{$Pasien->tempat_lahir}}, {{HTanggal::Format($Pasien->tanggal_lahir)}} ({{$Pasien->Umur}} Tahun)</td>
      </tr>
      <tr>
        <td>TB / BB / Suhu Badan</td>
        <td>: {{$Pasien->tb}} cm / {{$Pasien->bb}} Kg / {{$Pasien->suhu_badan}}</td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>: {{$Pasien->alamat}}, {{$Pasien->Kecamatan->nama}}, {{$Pasien->Kota->nama}}</td>
      </tr>
      <tr>
        <td>Status Pernikahan</td>
        <td>: {{$Pasien->MenikahText}}</td>
      </tr>
      <tr>
        <td>Pekerjaan</td>
        <td>: {{$Pasien->Pekerjaan->nama}}</td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <td>Poliklinik</td>
        <td>: {{$Pasien->PoliDari->nama}}</td>
      </tr>
      <tr>
        <td>Poliklinik Tujuan</td>
        <td>: {{$Pasien->PoliTujuan->nama}}</td>
      </tr>
      <tr>
        <td>Dokter</td>
        <td>: {{$Pasien->Dokter->nama}}</td>
      </tr>
      <tr>
        <td>Anamnesa</td>
        <td>: {!!nl2br($Pasien->anamnesa)!!}</td>
      </tr>
      <tr>
        <td>Keluhan</td>
        <td>: {!!nl2br($Pasien->keluhan)!!}</td>
      </tr>
      <tr>
        <td>Alergi</td>
        <td>: {!!nl2br($Pasien->alergi)!!}</td>
      </tr>
      <tr>
        <td>Diagnosa</td>
        <td>: {{$Pasien->Diagnosa->kode}} - {{$Pasien->Diagnosa->keterangan}}</td>
      </tr>
      <tr>
        <td>Terapi</td>
        <td>: {!!nl2br($Pasien->telah_diberikan)!!}</td>
      </tr>
    </tbody>
  </table>
  <p>Demikian disampaikan, atas pertolongan dan informasi selanjutnya untuk pasien tersebut diucapkan terimakasih</p>
  <footer>
    <table style="width:100%">
      <tr>
        <td></td>
        <td align="center" style="width: 30%">
          Puskesmas Guntung Payung
          <br>
          <br>
          <br>
          <br>
          <br>
          {{$Pasien->Dokter->nama}}
        </td>
      </tr>
    </table>
  </footer>
</body>
</html>
