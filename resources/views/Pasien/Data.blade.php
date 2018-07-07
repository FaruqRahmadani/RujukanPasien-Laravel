@extends('Layouts.Master')
@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="{{Route('Tambah-Pasien')}}" class="btn btn-labeled btn-success btn-sm" type="button">
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
                  <th>Nomor RM</th>
                  <th>Nama</th>
                  <th>Umur</th>
                  <th>Poli</th>
                  <th>Dokter</th>
                  <th>Keluhan</th>
                  <th>Diagnosa</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($Pasien as $Index=>$DataPasien)
                  <tr>
                    <td>{{$Index=+1}}</td>
                    <td>{{$DataPasien->nomor_rm}}</td>
                    <td>{{$DataPasien->nama}}</td>
                    <td>{{$DataPasien->umur}}</td>
                    <td>{{$DataPasien->Dokter->Spesialis->nama}}</td>
                    <td>{{$DataPasien->Dokter->nama}}</td>
                    <td>{{$DataPasien->keluhan}}</td>
                    <td>{{$DataPasien->diagnosa}}</td>
                    <td>{{$DataPasien->Status}}</td>
                    <td>
                      <a href="{{Route('Edit-Pasien', ['Id' => HCrypt::Encrypt($DataPasien->id)])}}" class="btn btn-labeled btn-info btn-xs">
                        <span class="btn-label"><i class="fa fa-pencil"></i>
                        </span>Edit
                      </a>
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
