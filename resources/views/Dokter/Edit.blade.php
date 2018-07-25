@extends('Layouts.Master')
@section('content')
  <h3>{{HRoute::Judul()}}</h3>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="{{Route('Data-Dokter')}}" class="btn btn-labeled btn-primary btn-sm" type="button">
            <span class="btn-label"><i class="fa fa-angle-double-left fa-lg"></i>
            </span>Kembali
          </a>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" action="{{Route('submitEdit-Dokter', ['Id' => HCrypt::Encrypt($Dokter->id)])}}" method="post">
            @csrf
            <div class="form-group">
              <label class="col-sm-2 control-label">NIP/NIK</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="NIP" name="nip" value="{{$Dokter->nip}}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Nama" name="nama" value="{{$Dokter->nama}}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Tempat Lahir" name="tempat_lahir" value="{{$Dokter->tempat_lahir}}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input class="form-control" type="date" name="tanggal_lahir" value="{{$Dokter->tanggal_lahir}}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Alamat" name="alamat" value="{{$Dokter->alamat}}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">No. Telepon</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="No. Telepon" name="no_telepon" value="{{$Dokter->no_telepon}}" required>
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
