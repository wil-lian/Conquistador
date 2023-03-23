<?php
if(isset($_POST['create'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    
    $sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
    
    if(mysqli_query($conexion, $sql)) {
        echo "Registro creado correctamente";
    } else {
        echo "Error al crear el registro: " . mysqli_error($conexion);
    }
}
