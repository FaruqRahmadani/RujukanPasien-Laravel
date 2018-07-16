<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Aplikasi Rujukan Pasien</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}" id="maincss">
</head>

<body>
  <div class="wrapper">
    <header class="topnavbar-wrapper">
      <nav class="navbar topnavbar" role="navigation">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            <div class="brand-logo">
              <p>APLIKASI RUJUKAN</p>
            </div>
            <div class="brand-logo-collapsed">
              <p>AP</p>
            </div>
          </a>
        </div>
        <div class="nav-wrapper">
          <ul class="nav navbar-nav">
            <li>
              <a class="hidden-xs" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed">
                <em class="fa fa-navicon"></em>
              </a>
              <a class="visible-xs sidebar-toggle" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
                <em class="fa fa-navicon"></em>
              </a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-list">
              <a href="#" data-toggle="dropdown" data-toggle-state="offsidebar-open" data-no-persist="true">
                <em class="icon-bell"></em>
                <div class="label label-danger">{{HRujukan::Count()}}</div>
              </a>
            </li>
            <li>
              <a href="#" data-toggle-fullscreen="" onclick="logout()">
                <em class="fa fa-power-off"></em>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="aside">
      <div class="aside-inner">
        <nav class="sidebar" data-sidebar-anyclick-close="">
          <ul class="nav">
            <li class="has-user-block">
              <div id="user-block">
                <div class="item user-block">
                  <div class="user-block-picture">
                    <div class="user-block-status">
                      <img class="img-thumbnail img-circle" src="{{asset('img/user/'.Auth::User()->foto)}}" alt="Avatar" width="60" height="60">
                      <div class="circle circle-success circle-lg"></div>
                    </div>
                  </div>
                  <div class="user-block-info">
                    <span class="user-block-name">{{Auth::User()->nama}}</span>
                    <span class="user-block-role">{{Auth::User()->TipeText}}</span>
                  </div>
                </div>
              </div>
            </li>
            <li {{HRoute::Active('Dashboard')}}>
              <a href="{{Route('Dashboard')}}">
                <em class="icon-grid"></em>
                <span>Dashboard</span>
              </a>
            </li>
            @if (Auth::User()->tipe == 1)
              <li {{HRoute::Active('Data-User')}}>
                <a href="{{Route('Data-User')}}">
                  <em class="icon-user"></em>
                  <span>User</span>
                </a>
              </li>
              <li {{HRoute::Active('Data-Poli-Dari')}}>
                <a href="{{Route('Data-Poli-Dari')}}">
                  <em class="icon-layers"></em>
                  <span>Poli Dari</span>
                </a>
              </li>
              <li {{HRoute::Active('Data-Dokter')}}>
                <a href="{{Route('Data-Dokter')}}">
                  <em class="icon-paper-clip"></em>
                  <span>Dokter</span>
                </a>
              </li>
            @endif
            @if ((Auth::User()->tipe == 1) || (Auth::User()->tipe == 2))
              <li {{HRoute::Active('Data-Pasien')}}>
                <a href="{{Route('Data-Pasien')}}">
                  <em class="icon-paper-clip"></em>
                  <span>Pasien</span>
                </a>
              </li>
            @endif
            @if (Auth::User()->tipe == 3)
              <li {{HRoute::Active('Data-Rujukan')}}>
                <a href="{{Route('Data-Rujukan')}}">
                  <em class="icon-paper-clip"></em>
                  <span>Rujukan</span>
                </a>
              </li>
            @endif
          </ul>
        </nav>
      </div>
    </aside>
    <aside class="offsidebar hide">
      <nav>
        <div role="tabpanel">
          <div class="tab-content">
            <div class="tab-pane fade in active" id="app-chat" role="tabpanel">
              <h3 class="text-center text-thin">Pasien Rujukan</h3>
              <ul class="nav">
                <hr>
                @foreach (HRujukan::Data() as $Index=>$DataPasien)
                  <li>
                    <a class="media-box p mt0" href="{{Auth::User()->tipe == 3 ? Route('Respon-Rujukan', ['Id' => HCrypt::Encrypt($DataPasien->id)]) : '#'}}">
                      <span class="pull-right">
                        <h4 class="btn btn-labeled btn-info btn-xs">
                          <span class="btn-label"><i class="fa fa-exclamation-circle"></i>
                          </span>Respon
                        </h4>
                      </span>
                      <span class="pull-left">
                        <h4>{{$Index+=1}}</h4>
                      </span>
                      <span class="media-box-body">
                        <span class="media-box-heading">
                          <strong>{{$DataPasien->nama}}</strong>
                          <br>
                          <small class="text-muted"> {{HTanggal::Format($DataPasien->created_at)}}</small>
                        </span>
                      </span>
                    </a>
                  </li>
                  <hr>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </aside>
    <section>
      <div id="app" class="content-wrapper">
        <h3>{{HRoute::Judul()}}</h3>
        @yield('content')
      </div>
    </section>
    <footer>
      <span>&copy; 2017 - Angle</span>
    </footer>
  </div>
  <script src="{{asset('js/app.js')}}"></script>
  @if (session('alert'))
    <script type="text/javascript">
    notif('{{session('tipe')}}', '{{session('judul')}}', '{{session('pesan')}}');
    </script>
  @endif
  @if ($errors->any())
    <script type="text/javascript">
    notif('error', 'Error', '{{ $errors->first() }}');
    </script>
  @endif
</body>
</html>
