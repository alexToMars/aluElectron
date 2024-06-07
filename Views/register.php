<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de Usuario</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../Util/css/login.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../Util/css/Css/all.min.css">
  <link rel="stylesheet" href="../Util/css/adminlte.min.css">
  <link rel="stylesheet" href="../Util/css/toastr.min.css">
  </head>
  <body class="content2">
    <div class="content2">
      <br /><br /><br /><br /><br /><br />
      <div class="contenedor">
        <br>
        <h1 style="text-align: center;" class="apoyo">SIGN IN</h1>
        <br />
        <form id="form-register">
          <!-- Nombre input -->
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="username">Username</label>
              <input
              type="text"
              id="username"
              name="username"
              class="form-control"
              placeholder="Ingresa tu nombre de usuario"
              required
            />
            <br>
              </div>
              <div class="form-group">
              <label for="telefono">Telefono</label>
              <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ingrese telefono">
            </div>
            <br>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" class="form-control" id="pass" placeholder="Ingrese password">
              </div>
              <br>
              <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Ingrese los nombres">
              </div>
              <br>
              <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" name="dni" class="form-control" id="dni" placeholder="Ingrese DNI">
              </div>
              <br>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="pass_repeat">Repetir password</label>
                <input type="password" name="pass_repeat" class="form-control" id="pass_repeat" placeholder="Repetir password">
              </div>
              <br>
              <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingrese sus apellidos">
              </div>
              <br>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Ingrese el email">
              </div>
              <br>
            </div>
          </div>
          <br>
          <!-- Submit button -->
          <input name="Agregar" class="btn btn-success btn_custom" type="submit" id="btnAgregar" value="Registrarse">
          <br><br>

          <!-- Register buttons -->
          <div class="text-center">
            <p class="apoyo">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
          </div>
          <div class="col-sm-12">
        </div>
        </form>
        <br><br>
      </div>
    </div>
    <!-- jQuery -->
<script src="../Util/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../Util/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../Util/js/adminlte.min.js"></script>
<!-- LLamada al codigo de login js -->
<script src="../Util/js/toastr.min.js"></script>
<script src="../Util/js/jquery.validate.min.js"></script>
<script src="../Util/js/additional-methods.min.js"></script>
  </body>
</html>
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#form-register').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>