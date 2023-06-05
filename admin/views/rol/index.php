<h1 class="text-center">Roles y privilegios</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="rol.php?action=new" role="button">Crear nuevo Rol</a>
            </p>
        </div>
        <div class="col-3">
            <p><a class="btn btn-success" href="privilegio.php" role="button">Privilegios</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Privilegios</th>
                    
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $rol):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $rol["id_rol"] ?>
                            </td>
                            <td>
                                <?php echo $rol["rol"] ?>
                            </td>
                            <td>
                                <ul>
                                    <?php if(empty($rol['privilegio'])): ?>
                                        <li><p>El usuario no tiene privilegio activos</p></li>
                                    <?php endif; ?>
                                    <?php foreach($rol['privilegio'] as $key => $privilegio): ?>
                                    <li>
                                        <?php echo $privilegio['privilegio'] ?>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="rol.php?action=edit&id=<?php echo $rol["id_rol"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="rol.php?action=delete&id=<?php echo $rol["id_rol"] ?>"
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