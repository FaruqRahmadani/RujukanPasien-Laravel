@extends('Layouts.Master')
@section('content')
  <div class="row">
    <div class="col-lg-12">
      @if ($Pasien->Respon)
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Respon</h4>
          </div>
          <div class="panel-body">
            <table class="table">
              <tr>
                <td>Status</td>
                <td>{!!$Pasien->Status!!}</td>
              </tr>
              <tr>
                <td>Catatan</td>
                <td>{!!nl2br($Pasien->Respon->catatan)!!}</td>
              </tr>
            </table>
          </div>
        </div>
      @endif
      <div class="panel panel-default">
        <div class="panel-body">
          <table class="table">
            <tr>
              <td>Nomor</td>
              <td>{{$Pasien->nomor}}</td>
            </tr>
            <tr>
              <td>Nomor Rekam Medik</td>
              <td>{{$Pasien->nomor_rm}}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>{{$Pasien->nama}}</td>
            </tr>
            <tr>
              <td>Tempat, Tanggal Lahir</td>
              <td>{{$Pasien->tempat_lahir}}, {{HTanggal::Format($Pasien->tanggal_lahir)}} ({{$Pasien->Umur}} Tahun)</td>
            </tr>
            <tr>
              <td>TB / BB / Suhu Badan</td>
              <td>{{$Pasien->tb}} cm / {{$Pasien->bb}} Kg / {{$Pasien->suhu_badan}}</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>{{$Pasien->alamat}}, {{$Pasien->Kecamatan->nama}}, {{$Pasien->Kota->nama}}</td>
            </tr>
            <tr>
              <td>Status Menikah</td>
              <td>{{$Pasien->MenikahText}}</td>
            </tr>
            <tr>
              <td>Pekerjaan</td>
              <td>{{$Pasien->Pekerjaan->nama}}</td>
            </tr>
            <tr>
              <td>Poli Dari</td>
              <td>{{$Pasien->PoliDari->nama}}</td>
            </tr>
            <tr>
              <td>Poli Tujuan</td>
              <td>{{$Pasien->PoliTujuan->nama}}</td>
            </tr>
            <tr>
              <td>Dokter</td>
              <td>{{$Pasien->Dokter->nama}}</td>
            </tr>
            <tr>
              <td>Anamnesa</td>
              <td>{!!nl2br($Pasien->anamnesa)!!}</td>
            </tr>
            <tr>
              <td>Keluhan</td>
              <td>{!!nl2br($Pasien->keluhan)!!}</td>
            </tr>
            <tr>
              <td>Alergi</td>
              <td>{!!nl2br($Pasien->alergi)!!}</td>
            </tr>
            <tr>
              <td>Diagnosa</td>
              <td>{!!nl2br($Pasien->diagnosa)!!}</td>
            </tr>
            <tr>
              <td>Telah diberikan</td>
              <td>{!!nl2br($Pasien->telah_diberikan)!!}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
