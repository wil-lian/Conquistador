<?php

include("data_base.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "SELECT * FROM factura WHERE id = $id";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_array($resultado);
        $empresa = $fila['empresa'];
        $fecha = $fila['fecha'];
        $nfactura = $fila['nfactura'];
        $nombre = $fila['nombre'];
        $monto = $fila['monto'];
        $observacion = $fila['observacion'];
    }
}

if (isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $empresa = $_POST['empresa'];
    $fecha = $_POST['fecha'];
    $nfactura = $_POST['nfactura'];
    $nombre = $_POST['nombre'];
    $monto = $_POST['monto'];
    $observacion = $_POST['observacion'];

    $consulta = "UPDATE factura set
    empresa = '$empresa', fecha = '$fecha',
    nfactura = '$nfactura', nombre = '$nombre',
    monto = '$monto', observacion = '$observacion' WHERE id = $id";
    mysqli_query($conexion, $consulta);

    $_SESSION['mensaje'] = 'Datos Actualizados Satisfactoriamente';
    $_SESSION['tipo_de_mensaje'] = 'success';

    header("Location: index.php");
}

?>

<?php include("includes/cabecera.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="actualizar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <h3 style="text-align: center;">Actualizar Datos</h3>
                    <div class="form-group">
                        <label for="">Empresa</label><br>
                        <select id="generate" name="empresa">
                            <option disabled selected><?php echo $empresa; ?></option>
                            <?php
                            $consulta = "SELECT * FROM empresa";
                            $resultado = mysqli_query($conexion, $consulta);

                            while ($fila = mysqli_fetch_array($resultado)) { ?>
                                <option><?php echo $fila['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Fecha</label>
                        <input type="date" name="fecha" value="<?php echo $fecha; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Numero de Factura</label>
                        <input type="text" name="nfactura" value="<?php echo $nfactura; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Monto Bs.</label>
                        <input type="text" name="monto" value="<?php echo $monto; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Observaciones</label>
                        <input type="text" name="observacion" value="<?php echo $observacion; ?>" class="form-control" class="form-control">
                    </div>



                    <button class="btn btn-success" name="actualizar">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>