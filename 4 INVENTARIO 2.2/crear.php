<?php

include("data_base.php");

if (isset($_POST['guardar_tarea'])) {
    $empresa = $_POST['empresa'];
    $fecha = $_POST['fecha'];
    $nfactura = $_POST['nfactura'];
    $nombre = $_POST['nombre'];
    $monto = $_POST['monto'];
    $observacion = $_POST['observacion'];

    $consulta = "INSERT INTO factura(empresa, fecha, nfactura, nombre, monto, observacion) VALUES 
    ('$empresa', '$fecha', '$nfactura', '$nombre', '$monto', '$observacion')";
    $resultado = mysqli_query($conexion, $consulta);
    if (!$resultado) {
        die("consulta fallida");
    }

    $_SESSION['mensaje'] = 'Datos Guardados satisfactoriamente';
    $_SESSION['tipo_de_mensaje'] = 'success';

    header("Location: index.php");
}
