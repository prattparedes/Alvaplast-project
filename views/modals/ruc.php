<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

</head>

<body>

    <br>
    <br>
   

    <div class="container">
    <a name="" id="" class="btn btn-success" href="dni.php" role="button"style="width: 430px;">Consulta DNI</a><br>
    <br>
    <label style="color: purple;">SUNAT (Superintendencia Nacional de Aduanas y de Administración Tributaria)</label>

        <div class="col-md-4">
            <label for="" class="form-label"style="margin-top: 5px;">Ingrese RUC a consultar</label>
            <input type="text" autocomplete="off" id="ruc" name="ruc" class="form-control" placeholder="">
       

        <br>
        <button id="pruebaruc" class="btn btn-primary">Consultar Información</button>
        <br><br>

       
        <h6 style="background: teal; color: white; text-align: center; height: 30px; line-height: 30px;" class="titulo" id="titulo">DETALLE DE LA INFORMACIÓN</h6>
        <hr>
        <div>RUC: <label id="rucNumero"> </label></div>

        <div>Nombre o Razón social: <label id="razonsocial"> </label></div>

        <div> Estado: <label id="estado"> </label> </div>

        <div> Dirección: <label id="direccion"> </label> </div>

        <div> Departamento: <label id="departamento"> </label> </div>
        <hr>
    </div>
    
            <a name="" id="" class="btn btn-danger" href="ruc.php" role="button" style="width: 100px;">Salir</a><br>
    <script>
        $("#pruebaruc").click(function() {

            var ruc = $("#ruc").val();


            $.ajax({
                type: "POST",
                url: "../consultar-ruc-ajax.php",
                data: 'ruc=' + ruc,
                dataType: 'json',
                success: function(data) {


                    if (data == 1) {
                        alert('El RUC tiene que tener 11 digitos');
                    } else {
                        console.log(data);

                        $("#rucNumero").html(data.numeroDocumento);
                        $("#razonsocial").html(data.nombre);
                        $("#estado").html(data.estado);

                        $("#direccion").html(data.direccion);
                        $("#departamento").html(data.departamento);
                    }


                }
            });

        })
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>

</html>