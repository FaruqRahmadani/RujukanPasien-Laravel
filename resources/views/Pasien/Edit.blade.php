@extends('Layouts.Master')
@section('content')
  <h3>{{HRoute::Judul()}}</h3>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="{{Route('Data-Pasien')}}" class="btn btn-labeled btn-primary btn-sm" type="button">
            <span class="btn-label"><i class="fa fa-angle-double-left fa-lg"></i>
            </span>Kembali
          </a>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" action="{{Route('submitEdit-Pasien', ['Id' => HCrypt::Encrypt($Pasien->id)])}}" method="post">
            @csrf
            <div class="form-group">
              <label class="col-sm-2 control-label">Nomor</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Nomor" name="nomor" required value="{{$Pasien->nomor}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nomor Rekam Medik</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Nomor Rekam Medik" name="nomor_rm" required value="{{$Pasien->nomor_rm}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Nama" name="nama" required value="{{$Pasien->nama}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Alamat" name="alamat" required value="{{$Pasien->alamat}}">
              </div>
            </div>
            <field-kotakecamatan
              Kota = {{$Pasien->kota_id}}
              Kecamatan = {{$Pasien->kecamatan_id}}
            ></field-kotakecamatan>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat/Tanggal Lahir</label>
              <div class="col-sm-10 no-padding">
                <div class="col-sm-5">
                  <input class="form-control" type="text" placeholder="Tempat Lahir" name="tempat_lahir" required value="{{$Pasien->tempat_lahir}}">
                </div>
                <div class="col-sm-7">
                  <input class="form-control" type="date" name="tanggal_lahir" required value="{{$Pasien->tanggal_lahir}}">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">TB/BB/Suhu Badan</label>
              <div class="col-sm-10 no-padding">
                <div class="col-sm-4">
                  <input class="form-control" type="text" placeholder="TB" name="tb" required value="{{$Pasien->tb}}">
                </div>
                <div class="col-sm-4">
                  <input class="form-control" type="text" placeholder="BB" name="bb" required value="{{$Pasien->bb}}">
                </div>
                <div class="col-sm-4">
                  <input class="form-control" type="text" placeholder="Suhu Badan" name="suhu_badan" required value="{{$Pasien->suhu_badan}}">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Status Pernikahan</label>
              <div class="col-sm-10">
                <select class="form-control" name="status_menikah" required>
                  <option value="" selected hidden>Status Pernikahan</option>
                  <option value="1" {{$Pasien->status_menikah == 1 ? 'selected' : ''}}>Belum Menikah</option>
                  <option value="2" {{$Pasien->status_menikah == 2 ? 'selected' : ''}}>Sudah Menikah</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Pekerjaan</label>
              <div class="col-sm-10">
                <select class="form-control" name="pekerjaan_id" required>
                  <option value="" selected hidden>Pekerjaan</option>
                  @foreach ($Pekerjaan as $DataPekerjaan)
                    <option value="{{$DataPekerjaan->id}}" {{$Pasien->pekerjaan_id == $DataPekerjaan->id ? 'selected' : ''}}>{{$DataPekerjaan->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">Poliklinik</label>
              <div class="col-sm-10">
                <select class="form-control" name="poli_dari_id" required>
                  @foreach ($PoliDari as $DataPoliDari)
                    <option value="{{$DataPoliDari->id}}" {{$DataPoliDari->id == $Pasien->poli_dari_id ? 'selected' : ''}}>{{$DataPoliDari->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Poliklinik Tujuan</label>
              <div class="col-sm-10">
                <select class="form-control" name="poli_tujuan_id" required>
                  <option value="" selected hidden>Poli Tujuan</option>
                  @foreach ($PoliTujuan as $DataPoliTujuan)
                    <option value="{{$DataPoliTujuan->id}}" {{$DataPoliTujuan->id == $Pasien->poli_tujuan_id ? 'selected' : ''}}>{{$DataPoliTujuan->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Dokter</label>
              <div class="col-sm-10">
                <select class="form-control" name="dokter_id" required>
                  @foreach ($Dokter as $DataDokter)
                    <option value="{{$DataDokter->id}}" {{$DataDokter->id == $Pasien->dokter_id ? 'selected' : ''}}>{{$DataDokter->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Anamnesa</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="anamnesa" rows="2" cols="80" required>{{$Pasien->anamnesa}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Keluhan</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="keluhan" rows="2" cols="80" required>{{$Pasien->keluhan}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Alergi</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="alergi" rows="2" cols="80" required>{{$Pasien->alergi}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Diagnosa</label>
              <div class="col-sm-10">
                <select class="form-control" name="diagnosa_id" required>
                  <option value="" selected hidden>Diagnosa</option>
                  @foreach ($Diagnosa as $DataDiagnosa)
                    <option value="{{$DataDiagnosa->id}}" {{$Pasien->Diagnosa->id == $DataDiagnosa->id ? 'selected' : ''}}>{{$DataDiagnosa->kode}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Terapi</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="telah_diberikan" rows="2" cols="80" required>{{$Pasien->telah_diberikan}}</textarea>
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
  @endsection
