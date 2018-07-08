<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Aplikasi Rujukan</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}" id="maincss">
</head>
<body>
  <div class="wrapper">
    <div class="block-center mt-xl wd-xl">
      <div class="panel panel-dark panel-flat">
        <div class="panel-heading text-center">
          <h4>
            Aplikasi Rujukan Pasien
          </h4>
        </div>
        <div class="panel-body">
          <p class="text-center pv">Login Untuk Melanjutkan</p>
          <form class="mb-lg" role="form" data-parsley-validate="" novalidate="" method="POST" action="{{ route('Login') }}">
            @csrf
            <div class="form-group has-feedback">
              <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Username" autocomplete="off" name="username" required>
              <span class="fa fa-user form-control-feedback text-muted"></span>
            </div>
            <div class="form-group has-feedback">
              <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password" required>
              <span class="fa fa-lock form-control-feedback text-muted"></span>
            </div>
            <button class="btn btn-block btn-primary mt-lg" type="submit">Login</button>
          </form>
        </div>
      </div>
    </div>
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
