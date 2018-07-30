@extends('Layouts.Master')
@section('content')
  <h3>Puskesmas Guntung Payung Banjarbaru
    <small>{{HRoute::Judul()}}</small></h3>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-lg-6 bottom-padding">
                  <a href="{{Route('Tambah-Pasien')}}" class="btn btn-labeled btn-success btn-sm" type="button">
                    <span class="btn-label"><i class="fa fa-plus"></i>
                    </span>Tambah
                  </a>
                  <a href="{{Route('Cetak-Pasien', ['Status' => $Filter])}}" target="_blank" class="btn btn-labeled btn-info btn-sm" type="button">
                    <span class="btn-label"><i class="fa fa-print"></i>
                    </span>Cetak
                  </a>
              </div>
              <form class="form-horizontal" action="{{Route('Data-Pasien-Filter')}}" method="POST">
                @csrf
                <div class="col-lg-6">
                  <div class="col-lg-8 col-xs-8 no-padding">
                    <select class="form-control" name="filter" required>
                      <option value="" selected hidden>Filter Status</option>
                      <option value="Semua" {{(isset($Filter)) && ($Filter == "Semua") ? 'selected' : ''}}>Semua</option>
                      <option value="Menunggu" {{(isset($Filter)) && ($Filter == "Menunggu") ? 'selected' : ''}}>Menunggu</option>
                      <option value="1" {{(isset($Filter)) && ($Filter == "1") ? 'selected' : ''}}>Diterima</option>
                      <option value="0" {{(isset($Filter)) && ($Filter == "0") ? 'selected' : ''}}>Ditolak</option>
                    </select>
                  </div>
                  <div class="col-lg-4 col-xs-4">
                    <button type="submit" class="btn btn-labeled btn-info btn-sm">
                      <span class="btn-label"><i class="fa fa-filter"></i>
                      </span>Filter
                    </button>
                  </div>
                </div>
              </form>
            </div>
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
                      <td>{{$DataPasien->Diagnosa->kode}}</td>
                      <td>{{HTanggal::Format($DataPasien->created_at)}}</td>
                      <td class="text-center" style="white-space: nowrap;">{!!$DataPasien->Status!!}</td>
                      <td>
                        @if (!$DataPasien->Respon)
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
