<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="shortcut icon" href="../public/icon.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tu empresa | Go-Q</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="login" style="background: url(../public/images/15.jpg) no-repeat center center fixed; -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
        <div style="width: 100%; text-align: center">
            <img src="../public/images/logo.png" alt="" style="width: 40%">
        </div>
          <section class="login_content">
            <form method="post" action="{{ route('login')}}">
              {{ csrf_field() }}
              <h1 style="color: #fff">Ingreso al sistema</h1>
              @if (session('status'))
                  <div class="alert alert-danger">
                      {{ session('status') }}
                  </div>
              @endif
              <div>
                <input type="text" class="form-control" name="correo" placeholder="Cédula o RUC" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="acceso" placeholder="Contraseña" required="" />
              </div>
              <div>
                <button class="btn btn-round btn-info btn-lg" style="background-color: #00FC01" type="submit">Ingresar</button>
                {{-- <a class="btn btn-round btn-info btn-lg" type="submit" >Ingresar</a> --}}
                <a class="reset_pass" style="color: #fff" href="#">Olvidaste tu contraseña</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  {{-- <h1> Markget-Go!</h1> --}}
                  <p style="color: #000">Copyright ©2020 Todos los derechos</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
