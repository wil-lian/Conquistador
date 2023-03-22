<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTROL DE FACTURAS</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CONTROL DE FACTURAS</a>
            <form action="crear.php" method="POST">
                <div class="form-group">
                    <label class="badge badge-primary text-wrap">Empresa</label>
                    <select id="generate" name="empresa">
                        <option disabled selected>Seleccionar Empresa</option>
                        <?php
                        $consulta = "SELECT * FROM empresa";
                        $resultado = mysqli_query($conexion, $consulta);

                        while ($fila = mysqli_fetch_array($resultado)) { ?>
                            <option><?php echo $fila['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </form>
        </div>
    </nav>