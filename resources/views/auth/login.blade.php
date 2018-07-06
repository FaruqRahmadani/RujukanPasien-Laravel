<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="Bootstrap Admin App + jQuery">
  <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
  <title>Angle - Bootstrap Admin Template</title>
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
          <form class="mb-lg" role="form" data-parsley-validate="" novalidate="">
            <div class="form-group has-feedback">
              <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Enter email" autocomplete="off" required>
              <span class="fa fa-envelope form-control-feedback text-muted"></span>
            </div>
            <div class="form-group has-feedback">
              <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" required>
              <span class="fa fa-lock form-control-feedback text-muted"></span>
            </div>
              <button class="btn btn-block btn-primary mt-lg" type="submit">Login</button>
            </form>
          </div>
        </div>
        <div class="p-lg text-center">
          <span>&copy;</span>
          <span>2017</span>
          <span>-</span>
          <span>Angle</span>
          <br>
          <span>Bootstrap Admin Template</span>
        </div>
      </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
  </body>

  </html>
