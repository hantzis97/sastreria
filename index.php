<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LogIn - Sastreria</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="plugins/sweetalert/sweetalert.css" >
</head>
<body class="hold-transition login-page" background="bg-1.jpg">
<div class="login-box">
  <div class="login-logo">
    <b>SASTRERIA</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Identificarse</p>

      <form id="form-login">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordar
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="button" id="login" value="Login" name="abc" class="btn btn-primary btn-block">
          </div>
          <!-- /.col -->
        </div>
      </form>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="plugins/sweetalert/sweetalert.js"></script>

<script src="plugins/validation/jquery.validate.min.js"></script>
<script src="plugins/validation/jquery.min.js"></script>

<script>
  $(document).ready(function(){

  $("#login").click(function(){
      $.ajax({
          url: 'control/autenticacion.php',
          type : 'POST',
          data : $("#form-login").serialize(),
          success : function (data){
              if(data == 2){
                Swal.fire('Datos en blanco');
              }else if(data == 3){
                Swal.fire('Usuario no encontrado/inactivo');
              }else if(data == 4){
                Swal.fire({
                  icon: 'success',
                  title: 'Bienvenido.',
                  confirmButtonText: `Ingresar`,
                }).then((result) => {
                  if ( result.isConfirmed){
                    window.location.href = "pages/index.php";
                  }
                })
              }
          }
        })
    }) 


  })
</script>

</body>
</html>
