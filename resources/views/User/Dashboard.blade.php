@extends('Layouts.Master')
@section('content')
  <div class="row">
    <div class="col-lg-3 col-sm-6">
      <div class="panel widget bg-primary">
        <div class="row row-table">
          <div class="col-xs-4 text-center bg-primary-dark pv-lg">
            <em class="icon-cloud-upload fa-3x"></em>
          </div>
          <div class="col-xs-8 pv-lg">
            <div class="h2 mt0">1700</div>
            <div class="text-uppercase">Pasien</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6">
      <div class="panel widget bg-purple">
        <div class="row row-table">
          <div class="col-xs-4 text-center bg-purple-dark pv-lg">
            <em class="icon-globe fa-3x"></em>
          </div>
          <div class="col-xs-8 pv-lg">
            <div class="h2 mt0">700
              <small>GB</small>
            </div>
            <div class="text-uppercase">Diterima</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="panel widget bg-info">
        <div class="row row-table">
          <div class="col-xs-4 text-center bg-info-dark pv-lg">
            <em class="icon-bubbles fa-3x"></em>
          </div>
          <div class="col-xs-8 pv-lg">
            <div class="h2 mt0">500</div>
            <div class="text-uppercase">Ditolak</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="panel widget bg-green">
        <div class="row row-table">
          <div class="col-xs-4 text-center bg-green-dark pv-lg">
            <em class="icon-bubbles fa-3x"></em>
          </div>
          <div class="col-xs-8 pv-lg">
            <div class="h2 mt0">500</div>
            <div class="text-uppercase">Menunggu</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <button class="btn btn-labeled btn-success btn-sm" type="button">
            <span class="btn-label"><i class="fa fa-plus"></i>
            </span>Success
          </button>
        </div>
        <div class="panel-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
        </div>
      </div>
    </div>
  </div>
@endsection
