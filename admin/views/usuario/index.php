<h1 class="text-center">Usuarios</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                                        data-bs-target="#createUser">
                                        Ingresar nuevo usuario
                                    </button>
        </div>
    </div>

    <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="usuario.php?action=new" method="POST">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresar nuevo usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-5 container">
                        <div class="row">
                            <input type="hidden" name="check_listaCreate[]" value="3" class="" />
                        </div>
                        <div class="row">
                            <label for="correo">Correo:</label>
                            <input required="required" type="text" class="" id="correo" name="data[correo]" minlength="3" maxlength="200">
                        </div>
                        <div class="row mt-3">
                            <label for="contrasena">Contrasena:</label>
                            <input required="required" type="password" class="" id="contrasena" name="data[contrasena]"
                             minlength="3" maxlength="200">
                        </div>
                    </div>
                    <div class="col-5 container">
                        <h2>Roles del nuevo usuario:</h2>
                        <p>El rol <mark>Usuario</mark> es obligatorio para todos los usuarios, por lo tanto no se puede modificar</p>
                        <?php foreach($roles as $key => $rol): ?>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="<?php echo $rol['id_rol'] ?>" name="check_listaCreate[]"
                                value="<?php echo $rol['id_rol'] ?>">
                                <label class="form-check-label" for="<?php echo $rol['id_rol'] ?>"><?php echo $rol['rol'] ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
            </div>
        </div>
    </div>
        </form>
</div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Correo eléctronico</th>
                        <th scope="col">Roles activos</th>
                        <th scope="col">operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $usuario):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $usuario["id_usuario"] ?>
                            </td>
                            <td>
                                <?php echo $usuario["correo"] ?>
                            </td>
                            <td>
                                <ul>
                                    <?php foreach ($usuario['rol'] as $key => $rol): ?>
                                        <li>
                                            <?php echo $rol['rol'] ?>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editUsuario<?php echo $usuario['id_usuario'] ?>">
                                        Modificar
                                    </button>
                                    <a href="usuario.php?action=delete&id=<?php echo $usuario["id_usuario"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="editUsuario<?php echo $usuario['id_usuario'] ?>"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="container">
                                            <form method="POST" action="usuario.php?action=edit">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar al
                                                                usuario:
                                                                <?php echo $usuario['correo'] ?>
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-5 container">
                                                                    <div class="row">
                                                                    <input type="hidden" name="data[id_usuario]"
                                                                            value="<?php echo $usuario["id_usuario"] ?>" class="" />
                                                                    <input type="hidden" name="check_lista[]"
                                                                            value="3" class="" />
                                                                    </div>
                                                                    <div class="row">
                                                                        <label for="correo">Correo:</label>
                                                                        <input required="required" type="text" class=""
                                                                            id="correo" name="data[correo]"
                                                                            value="<?php echo $usuario['correo'] ?>"
                                                                            minlength="3" maxlength="200">
                                                                    </div>
                                                                    <div class="row mt-3 mx-auto">
                                                                        <button class="btn btn-primary btn-sm">
                                                                            Generar nueva contraseña
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5 container">
                                                                    <h2>Roles activos del usuario</h2>
                                                                    <p>El rol <mark>Usuario</mark> es obligatorio para todos los usuarios, por lo tanto no se puede modificar</p>
                                                                    <?php foreach ($roles as $key => $rol): ?>
                                                                        <div class="row form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                role="switch" id="<?php echo $rol['id_rol'] ?>"
                                                                                name="check_lista[]"
                                                                                value="<?php echo $rol['id_rol'] ?>"
                                                                                <?php foreach($usuario['rol'] as $key => $rolActivo): ?>
                                                                                        <?php if($rolActivo['rol'] == $rol['rol']): ?>
                                                                                            checked
                                                                                        <?php endif ?>
                                                                                <?php endforeach ?>
                                                                                >
                                                                            <label class="form-check-label"
                                                                                for="<?php echo $rol['id_rol'] ?>"><?php echo $rol['rol'] ?></label>
                                                                        </div>
                                                                    <?php endforeach ?>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-primary mb-3"
                                                                    name="enviar" value="Guardar">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
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