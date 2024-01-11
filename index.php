<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <title>Sistema | Control de Acceso </title>
    <meta name="description" content="Sistema Administrac��n y Control de Almacen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://creditos.epicscode.com/public/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://creditos.epicscode.com/public/dist/css/theme.min.css">
    
</head>

<body>
    <div class="wrapper">
        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url(./assets/img/01.jpg)">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-center">
                                <center><img src="assets/img/alvaplast_logo.png" width="250" height=""></center>
                            </div>
                            
                            <h3 class="text-center">Sistema de Administración y Control de Almacen</h3>
                            <p>Ingrese su Usuario y Contraseña.</p>
                            <form method="POST" action="log.php">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Escriba su correo." value="alvaplast@iadvancetech.com" required>
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Escriba su contraseña." value="admin" required>
                                    <i class="ik ik-lock"></i>
                                </div>

                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme btn-block"><i class="ik ik-arrow-right-circle"></i> Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.2.0/jquery.bootstrap-touchspin.min.js" integrity="sha512-VzUh7hLMvCqgvfBmkd2OINf5/pHDbWGqxS+RFaL/fsgA+rT94LxTFnjlFkm0oKM5BXWbc9EjBQAuARqzGKLbcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.2.0/jquery.bootstrap-touchspin.css" integrity="sha512-M+RT/z+GO2INvbXyfkn7l5qN+g09mr0+JQ++nxLUfqAufrp/v5GIQ1k4IMn0BIHgxZK2Ss+YA+kHK4wJUKJK0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</body>

</html>