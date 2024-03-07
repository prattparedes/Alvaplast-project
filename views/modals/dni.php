<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

</head>

<body>



    <br>
    <br>
   
    <div class="container">
    <a name="" id="" class="btn btn-success" href="ruc.php" role="button" style="width: 430px;">Consulta RUC</a><br>
    <br>
    <label style="color: purple;">RENIEC (Registro Nacional de Identificación y Estado Civil)</label>

        <br>
        <div class="col-md-4">
            <label for="" class="form-label" style="margin-top: 5px;">Ingrese DNI a consultar</label>
            <input type="text" id="dni" autocomplete="off" name="dni" class="form-control">
            <br>
            <button id="prueba" class="btn btn-primary">Consultar Información</button>


            <br>
            <br>

            <h6 style="background: teal; color: white; text-align: center; height: 30px; line-height: 30px;" class="titulo" id="titulo">DETALLE DE LA INFORMACIÓN</h6>
            <hr>
            <div>Nombres:  <label id="nombre"> </label></div>
            <div>Apellido Paterno:  <label id="apellidop"> </label></div>
            <div>Apellido Materno:  <label id="apellidom"> </label></div>
            <hr>
            <a name="" id="" class="btn btn-danger" href="../../log.php" role="button" style="width: 100px;">Salir</a><br>

        </div>

        <script>
            $("#prueba").click(function() {

                var dni = $("#dni").val();


                $.ajax({
                    type: "POST",
                    url: "../consulta-dni-ajax.php",
                    data: 'dni=' + dni,
                    dataType: 'json',
                    success: function(data) {


                        if (data == 1) {
                            alert('El DNI tiene que tener 8 digitos');
                        } else {
                            console.log(data);
                            $("#nombre").html(data.nombres);
                            $("#apellidop").html(data.apellidoPaterno);
                            $("#apellidom").html(data.apellidoMaterno);
                          


                        }

                    }
                });

            })
        </script>
     
</body>

</html>