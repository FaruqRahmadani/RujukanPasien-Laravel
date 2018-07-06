@extends('Layouts.Master')
@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="{{Route('Tambah-User')}}" class="btn btn-labeled btn-success btn-sm" type="button">
            <span class="btn-label"><i class="fa fa-plus"></i>
            </span>Tambah
          </a>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="datatable2">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Tipe</th>
                  <th>Username</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($User as $Index=>$DataUser)
                  <tr>
                    <td>{{$Index+=1}}</td>
                    <td>{{$DataUser->nama}}</td>
                    <td>{{$DataUser->TipeText}}</td>
                    <td>{{$DataUser->username}}</td>
                    <td>
                      <a href="{{Route('Edit-User', ['Id' => HCrypt::Encrypt($DataUser->id)])}}" class="btn btn-labeled btn-info btn-xs">
                        <span class="btn-label"><i class="fa fa-pencil"></i>
                        </span>Edit
                      </a>
                      <button class="btn btn-labeled btn-danger btn-xs" onclick="hapus('{{Route('Hapus-User', ['Id' => HCrypt::Encrypt($DataUser->id)])}}', {{$DataUser->id == Auth::User()->id ? "'Tidak Dapat Hapus Data Sendiri'" : 0}})">
                        <span class="btn-label"><i class="fa fa-close"></i>
                        </span>Hapus
                      </button>
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
