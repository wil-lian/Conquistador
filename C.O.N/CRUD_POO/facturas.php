<?php
class Usuario {
    
    private $conexion;

    function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Operación de creación
    function create($nombre, $email, $telefono) {
        $sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
        if(mysqli_query($this->conexion, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    // Operación de lectura
    function read() {
        $sql = "SELECT * FROM usuarios";
        $resultado = mysqli_query($this->conexion, $sql);
        $usuarios = array();
        while($fila = mysqli_fetch_assoc($resultado)) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    // Operación de actualización
    function update($id, $nombre, $email, $telefono) {
        $sql = "UPDATE usuarios SET nombre='$nombre', email='$email', telefono='$telefono' WHERE id=$id";
        if(mysqli_query($this->conexion, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    // Operación de eliminación
    function delete($id) {
        $sql = "DELETE FROM usuarios WHERE id=$id";
        if(mysqli_query($this->conexion, $sql)) {
            return true;
        } else {
            return false;
        }
    }
}