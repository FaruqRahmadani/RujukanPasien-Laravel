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
    <thead>
      <tr>
        <th>Nomor Rekam Medik</th>
        <th>: {{$Pasien->nomor_rm}}</th>
      </tr>
      <tr>
        <th>Nama</th>
        <th>: {{$Pasien->nama}}</th>
      </tr>
      <tr>
        <th>Tempat, Tanggal Lahir</th>
        <th>: {{$Pasien->tempat_lahir}}, {{HTanggal::Format($Pasien->tanggal_lahir)}} ({{$Pasien->Umur}} Tahun)</th>
      </tr>
      <tr>
        <th>Alamat</th>
        <th>: {{$Pasien->alamat}}, {{$Pasien->Kecamatan->nama}}, {{$Pasien->Kota->nama}}</th>
      </tr>
      <tr>
        <th>Status Menikah</th>
        <th>: {{$Pasien->MenikahText}}</th>
      </tr>
      <tr>
        <th>Pekerjaan</th>
        <th>: {{$Pasien->Pekerjaan->nama}}</th>
      </tr>
      <tr>
        <th><br></th>
      </tr>
      <tr>
        <th>Poli</th>
        <th>: {{$Pasien->Dokter->Spesialis->nama}}</th>
      </tr>
      <tr>
        <th>Dokter</th>
        <th>: {{$Pasien->Dokter->nama}}</th>
      </tr>
      <tr>
        <th>Keluhan</th>
        <th>: {!!nl2br($Pasien->keluhan)!!}</th>
      </tr>
      <tr>
        <th>Diagnosa</th>
        <th>: {!!nl2br($Pasien->diagnosa)!!}</th>
      </tr>
      <tr>
        <th>Telah diberikan</th>
        <th>: {!!nl2br($Pasien->telah_diberikan)!!}</th>
      </tr>
    </thead>
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
          {{$Pasien->Dokter->nama}}
        </td>
      </tr>
    </table>
  </footer>
</body>
</html>
