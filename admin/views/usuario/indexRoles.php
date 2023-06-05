<h1 class="text-center">Roles del usuario:
    <?php echo $rol[0]['correo']; ?>
</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="usuario.php?action=newRoles" role="button">Ingresar un nuevo rol</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Id usuario</th>
                        <th scope="col">Id rol</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($rol as $key => $rol):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $rol["id_usuario"] ?>
                            </td>
                            <td>
                                <?php echo $rol["id_rol"] ?>
                            </td>
                            <td>
                                <?php echo $rol["rol"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="usuario.php?action=editRoles&id=<?php echo $rol["id_usuario"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="usuario.php?action=deleteRoles&id=<?php echo $rol["id_usuario"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th>
                            Se encontraron
                            <?php echo $nReg ?> registros.
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>