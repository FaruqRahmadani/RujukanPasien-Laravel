@extends('Layouts.Master')
@section('content')
  <div class="row">
    <div class="col-lg-12">

      <div class="panel panel-default" id="panelDemo1">
        <div class="panel-heading panel-heading-collapsed">Info Pasien
          <a class="pull-right" href="#" data-tool="panel-collapse" data-toggle="tooltip" title="" data-original-title="Collapse Panel" aria-describedby="tooltip519947">
            <em class="fa fa-plus"></em>
          </a>
        </div>
        <div class="panel-wrapper collapse" aria-expanded="false" style="height: 0px;">
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
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Respon</h4>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" action="{{Route('submitRespon-Rujukan', ['Id' => HCrypt::Encrypt($Pasien->id)])}}" method="post">
            @csrf
            <div class="form-group">
              <label class="col-sm-2 control-label">Tindakan</label>
              <div class="col-sm-10">
                <label class="radio-inline c-radio">
                  <input id="inlineradio2" type="radio" name="status" value="1" required>
                  <span class="fa fa-circle"></span>Diterima
                </label>
                <label class="radio-inline c-radio">
                  <input id="inlineradio2" type="radio" name="status" value="0" required>
                  <span class="fa fa-circle"></span>Ditolak
                </label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Catatan</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="catatan" rows="4" cols="80" ></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="text-center">
                <button class="btn btn-labeled btn-success btn-sm" type="submit" name="button">
                  <span class="btn-label"><i class="fa fa-save"></i>
                  </span>Simpan
                </button>
                <button class="btn btn-labeled btn-warning btn-sm" type="reset" name="button">
                  <span class="btn-label"><i class="fa fa-close"></i>
                  </span>Reset
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
