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
            <table class="table table-striped table-hover table-nowrap" id="datatable2">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nomor RM</th>
                  <th>Nama</th>
                  <th>Umur</th>
                  <th>Poli Dari</th>
                  <th>Poli Tujuan</th>
                  <th>Dokter</th>
                  <th>Keluhan</th>
                  <th>Diagnosa</th>
                  <th>Tanggal</th>
                  <th class="text-center">Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($Pasien as $Index=>$DataPasien)
                  <tr>
                    <td>{{$Index+1}}</td>
                    <td>{{$DataPasien->nomor_rm}}</td>
                    <td>{{$DataPasien->nama}}</td>
                    <td>{{$DataPasien->umur}} Tahun</td>
                    <td>{{$DataPasien->PoliDari->nama}}</td>
                    <td>{{$DataPasien->PoliTujuan->nama}}</td>
                    <td>{{$DataPasien->Dokter->nama}}</td>
                    <td>{{$DataPasien->keluhan}}</td>
                    <td>{{$DataPasien->diagnosa}}</td>
                    <td>{{HTanggal::Format($DataPasien->created_at)}}</td>
                    <td class="text-center" style="white-space: nowrap;">{!!$DataPasien->Status!!}</td>
                    <td>
                      @if (($DataPasien->Respon) && ($DataPasien->Respon->status == 1))
                        <a href="{{Route('Cetak-Rujukan', ['Id' => HCrypt::Encrypt($DataPasien->id)])}}" class="btn btn-labeled btn-success btn-xs" target="_blank">
                          <span class="btn-label"><i class="fa fa-print"></i>
                          </span>Cetak
                        </a>
                      @else
                        <a href="{{Route('Edit-Pasien', ['Id' => HCrypt::Encrypt($DataPasien->id)])}}" class="btn btn-labeled btn-info btn-xs">
                          <span class="btn-label"><i class="fa fa-pencil"></i>
                          </span>Edit
                        </a>
                      @endif
                      <a href="{{Route('Info-Pasien', ['Id' => HCrypt::Encrypt($DataPasien->id)])}}" class="btn btn-labeled btn-primary btn-xs">
                        <span class="btn-label"><i class="fa fa-info"></i>
                        </span>Info
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
