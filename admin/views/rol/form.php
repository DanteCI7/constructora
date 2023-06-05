<div class="container mt-5 card">
    <h1>
        <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo '; ?> Rol
    </h1>

    <form class="container-fluid" method="POST" action="rol.php?action=<?php echo ($action); ?>"
        enctype="multipart/form-data">

        <div class="row mt-5 mb-5">
            <div class="col-5">
                <div class="row">
                    <div>
                        <label for="rol">
                            <h2>Nombre del Rol:</h2>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <input required="required" type="text" class="" id="rol" name="data[rol]"
                            value="<?php echo isset($data[0]['rol']) ? $data[0]['rol'] : ''; ?>" minlength="3"
                            maxlength="200">
                    </div>
                </div>

                &nbsp;

                <div class="row">
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
                    </div>
                </div>


                <? if ($action == 'edit'): ?>
                    <input type="hidden" name="data[id_rol]"
                        value="<?php echo isset($data[0]['id_rol']) ? $data[0]['id_rol'] : ''; ?>" class="" />
                <? endif; ?>
            </div>
            <div class="col-5 border">
                <h2>
                    <?php echo ($action == 'edit') ? 'Cambiar privilegios del rol' : 'Privilegios del nuevo rol '; ?>
                </h2>
                <?php foreach ($privilegios as $key => $privilegio): ?>
                    <div class="form-check form-switch">
                        <?php if ($action == 'edit'): ?>

                            <input class="form-check-input" type="checkbox" role="switch"
                                id="<?php echo $privilegio['id_privilegio'] ?>" name="check_lista[]"
                                value="<?php echo $privilegio['id_privilegio'] ?>"
                                <?php if(isset($privActivos)): ?>
                                    <?php if(in_array($privilegio['privilegio'], $privActivos)):?>
                                        checked
                                    <?php endif; ?>
                                <?php endif; ?>
                                >

                            <label class="form-check-label" for="<?php echo $privilegio['id_privilegio'] ?>"><?php echo $privilegio['privilegio'] ?></label>

                        <?php else: ?>

                            <input class="form-check-input" type="checkbox" role="switch"
                                id="<?php echo $privilegio['id_privilegio'] ?>" name="check_lista[]"
                                value="<?php echo $privilegio['id_privilegio'] ?>">
                            <label class="form-check-label" for="<?php echo $privilegio['id_privilegio'] ?>"><?php echo $privilegio['privilegio'] ?></label>
                        <?php endif; ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </form>
</div>