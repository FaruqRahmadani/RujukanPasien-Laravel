@extends('Layouts.Master')
@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="{{Route('Tambah-Dokter')}}" class="btn btn-labeled btn-success btn-sm" type="button">
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
                  <th>NIP/NIK</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No Telp.</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($Dokter as $Index=>$DataDokter)
                  <tr>
                    <td>{{$Index+=1}}</td>
                    <td>{{$DataDokter->nip}}</td>
                    <td>{{$DataDokter->nama}}</td>
                    <td>{{$DataDokter->alamat}}</td>
                    <td>{{$DataDokter->no_telepon}}</td>
                    <td>
                      <a href="{{Route('Edit-Dokter', ['Id' => HCrypt::Encrypt($DataDokter->id)])}}" class="btn btn-labeled btn-info btn-xs">
                        <span class="btn-label"><i class="fa fa-pencil"></i>
                        </span>Edit
                      </a>
                      <button class="btn btn-labeled btn-danger btn-xs" onclick="hapus('{{Route('Hapus-Dokter', ['Id' => HCrypt::Encrypt($DataDokter->id)])}}')">
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
