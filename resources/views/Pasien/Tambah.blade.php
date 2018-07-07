@extends('Layouts.Master')
@section('content')
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
          <form class="form-horizontal" action="{{Route('submitTambah-Pasien')}}" method="post">
            @csrf
            <div class="form-group">
              <label class="col-sm-2 control-label">Nomor</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Nomor" name="nomor" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Nama" name="nama" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nomor Rekam Medik</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Nomor Rekam Medik" name="nomor_rm" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Alamat" name="alamat" required>
              </div>
            </div>
            <field-kotakecamatan></field-kotakecamatan>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat/Tanggal Lahir</label>
              <div class="col-sm-10 no-padding">
                <div class="col-sm-5">
                  <input class="form-control" type="text" placeholder="Tempat Lahir" name="tempat_lahir" required>
                </div>
                <div class="col-sm-7">
                  <input class="form-control" type="date" name="tanggal_lahir" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Status Menikah</label>
              <div class="col-sm-10">
                <select class="form-control" name="status_menikah" required>
                  <option value="" selected hidden>Status Menikah</option>
                  <option value="1">Belum Menikah</option>
                  <option value="2">Sudah Menikah</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Pekerjaan</label>
              <div class="col-sm-10">
                <select class="form-control" name="pekerjaan_id" required>
                  <option value="" selected hidden>Pekerjaan</option>
                  @foreach ($Pekerjaan as $DataPekerjaan)
                    <option value="{{$DataPekerjaan->id}}">{{$DataPekerjaan->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <field-polidokter></field-polidokter>
            <div class="form-group">
              <label class="col-sm-2 control-label">Keluhan</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="keluhan" rows="2" cols="80" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Diagnosa</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="diagnosa" rows="2" cols="80" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Telah Diberikan</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="telah_diberikan" rows="2" cols="80" required></textarea>
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
