@extends('Layouts.Master')
@section('content')
  <div class="row">
    <div class="col-lg-3 col-sm-6">
      <div class="panel widget bg-primary">
        <div class="row row-table">
          <div class="col-xs-4 text-center bg-primary-dark pv-lg">
            <em class="icon-people fa-3x"></em>
          </div>
          <div class="col-xs-8 pv-lg">
            <div class="h2 mt0">{{HRujukan::Pasien()->count()}}</div>
            <div class="text-uppercase">Pasien</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6">
      <div class="panel widget bg-purple">
        <div class="row row-table">
          <div class="col-xs-4 text-center bg-purple-dark pv-lg">
            <em class="icon-user-following fa-3x"></em>
          </div>
          <div class="col-xs-8 pv-lg">
            <div class="h2 mt0">{{HRujukan::Diterima()->count()}}</div>
            <div class="text-uppercase">Diterima</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="panel widget bg-info">
        <div class="row row-table">
          <div class="col-xs-4 text-center bg-info-dark pv-lg">
            <em class="icon-user-unfollow fa-3x"></em>
          </div>
          <div class="col-xs-8 pv-lg">
            <div class="h2 mt0">{{HRujukan::Ditolak()->count()}}</div>
            <div class="text-uppercase">Ditolak</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="panel widget bg-green">
        <div class="row row-table">
          <div class="col-xs-4 text-center bg-green-dark pv-lg">
            <em class="icon-options fa-3x"></em>
          </div>
          <div class="col-xs-8 pv-lg">
            <div class="h2 mt0">{{HRujukan::BelumDitanggap()->count()}}</div>
            <div class="text-uppercase">Menunggu</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
        </div>
      </div>
    </div>
  </div>
@endsection
