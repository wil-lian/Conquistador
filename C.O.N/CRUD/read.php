<?php
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion, $sql);

while($fila = mysqli_fetch_assoc($resultado)) {
    echo "ID: " . $fila['id'] . "<br>";
    echo "Nombre: " . $fila['nombre'] . "<br>";
    echo "Email: " . $fila['email'] . "<br>";
    echo "Teléfono: " . $fila['telefono'] . "<br><br>";
}
