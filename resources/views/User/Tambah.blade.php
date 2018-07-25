@extends('Layouts.Master')
@section('content')
  <h3>{{HRoute::Judul()}}</h3>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="{{Route('Data-User')}}" class="btn btn-labeled btn-primary btn-sm" type="button">
            <span class="btn-label"><i class="fa fa-angle-double-left fa-lg"></i>
            </span>Kembali
          </a>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" action="{{Route('submitTambah-User')}}" method="post">
            @csrf
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Nama" name="nama" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tipe</label>
              <div class="col-sm-10">
                <select class="form-control" name="tipe" required>
                  <option value="" selected hidden>Tipe</option>
                  <option value="1">Admin</option>
                  <option value="2">Puskesmas</option>
                  <option value="3">Rumah Sakit</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Username" name="username" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input class="form-control" type="password" placeholder="Password" name="password" required>
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
