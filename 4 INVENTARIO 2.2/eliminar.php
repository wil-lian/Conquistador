<?php

include("data_base.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $consulta = "DELETE FROM factura WHERE id = $id";
    $resultado = mysqli_query($conexion, $consulta);
    if (!$resultado) {
        die("Consulta Fallida");
    }

    $_SESSION['mensaje'] = 'Datos Eliminados Satisfactoriamente';
    $_SESSION['tipo_de_mensaje'] = 'danger';
    
    header("Location: index.php");
}
