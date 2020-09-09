<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('public/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="{{asset('public/backend/css/sb-admin.css')}}" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Login</div>
      <div class="card-body">
        <form action="{{URL::to('/admin.dashboard')}}" method="post">
          @csrf
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="admin_email" class="form-control"  required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" class="form-control"  required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
         
          <button type="submit" class="btn btn-primary btn-block" >Send</button>
        </form>
        <div class="text-center">
          
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('public/backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('public/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('public/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

</body>

</html>
