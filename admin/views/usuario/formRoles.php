<h1>
    <?php echo ($action == 'editRoles') ? 'Modificar el' : ' Añadir Nuevo: '; ?> rol
</h1>

<form class="container-fluid" method="POST" action="usuario.php?action=<?php echo ($action); ?>" enctype="multipart/form-data">

<input type="hidden" name="data[id_usuario]"
            value="<?php echo isset($dataRoles[0]['id_usuario']) ? $dataRoles[0]['id_usuario'] : ''; ?>" class="" />    

    <div class="row">
        <div class="col-2">
            <label for="id_rol">Roles:</label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-2">
            <select name="data[id_rol]" required="required">
                <?php
                $selected = " ";
                foreach ($dataRoles as $key => $rol):
                        $selected = "selected";
                    ?>
                    <option value="<?php echo $rol['id_rol']; ?>" <?php echo $selected; ?>>
                        <?php echo $rol['rol'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>


</form>