<?php include("data_base.php") ?>

<?php include("includes/cabecera.php") ?>

<div class="container-fluid p-3 border">

    <div class="row">

        <div class="col-md-3">

            <?php if (isset($_SESSION['mensaje'])) { ?>

                <div class="alert alert-<?= $_SESSION['tipo_de_mensaje']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="crear.php" method="POST">
                    <div class="form-group">
                        <h3 style="text-align: center;">Registro </h3>
                        <label for="">Empresa</label><br>
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

                    <!-- nuevos campos -->
                    <div class="form-group">
                        <label for="">Fecha</label>
                        <input type="date" name="fecha" class="form-control" placeholder="" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Numero de Factura</label>
                        <input type="text" name="nfactura" class="form-control" placeholder="" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Monto Bs.</label>
                        <input type="text" name="monto" class="form-control" placeholder="" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Observaciones</label>
                        <input type="text" name="observacion" class="form-control" placeholder="" autofocus>
                    </div>




                    <input type="submit" class="btn btn-primary btn-block" name="guardar_tarea" value="Guardar Datos">
                </form>
            </div>
        </div>

        <div class="col-md-9">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th colspan="7">Empresa</th>
                    </tr>
                    <tr>
                        <th>Nº</th>
                        <th>Fecha</th>
                        <th>Nº de Factura</th>
                        <th>Nombre</th>
                        <th>Monto Bs</th>
                        <th>Observaciones</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $consulta = "SELECT * FROM factura";
                    $resultado = mysqli_query($conexion, $consulta);

                    while ($fila = mysqli_fetch_array($resultado)) { ?>
                        <tr>
                            <td><?php echo $fila['id'] ?></td>
                            <!-- <td></td> -->
                            <td><?php echo $fila['fecha'] ?> </td>
                            <td><?php echo $fila['nfactura'] ?> </td>
                            <td><?php echo $fila['nombre'] ?> </td>
                            <td><?php echo $fila['monto'] ?> </td>
                            <td><?php echo $fila['observacion'] ?> </td>
                            <td>
                                <a href="actualizar.php?id=<?php echo $fila['id'] ?>" class="btn btn-success" title="Editar">Editar


                                    <a href="eliminar.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger" title="Eliminar">Eliminar

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>