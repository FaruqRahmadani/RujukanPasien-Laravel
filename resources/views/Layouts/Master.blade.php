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
  <div class="wrapper" id="app">
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
            @if (Auth::User()->tipe == 3)
              <notif show="button"></notif>
            @endif
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
                      <img class="img-thumbnail img-circle" src="{{asset('img/user/'.(Auth::User()->tipe == 3 ? 'rs.jpeg' : 'default.png'))}}" alt="Avatar" width="60" height="60">
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
              <li {{HRoute::Active('Data-Diagnosa')}}>
                <a href="{{Route('Data-Diagnosa')}}">
                  <em class="icon-user"></em>
                  <span>Diagnosa</span>
                </a>
              </li>
              <li {{HRoute::Active('Data-Poliklinik')}}>
                <a href="{{Route('Data-Poliklinik')}}">
                  <em class="icon-layers"></em>
                  <span>Poliklinik</span>
                </a>
              </li>
              <li {{HRoute::Active('Data-Poliklinik-Tujuan')}}>
                <a href="{{Route('Data-Poliklinik-Tujuan')}}">
                  <em class="icon-layers"></em>
                  <span>Poliklinik Tujuan</span>
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
    @if (Auth::User()->tipe == 3)
      <notif show="panel"></notif>
    @endif
    <section>
      <div class="content-wrapper">
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
