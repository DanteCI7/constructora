<h1>
  <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Caso de exito
</h1>
<form method="POST" action="caso.php?action=<?php echo $action; ?>" enctype="multipart/form-data">

  <div class="mb-3">
    <label class="form-label">Caso de exito</label>
    <input type="text" name="data[caso_exito]" class="form-control" placeholder="caso_exito"
      value="<?php echo isset($data[0]['caso_exito']) ? $data[0]['caso_exito'] : ''; ?>" required minlength="3" maxlength="50" />
  </div>

  <div class="mb-3">
    <label class="form-label">Descripcion</label>
      <textarea  placeholder="descripcion"  name="data[descripcion]" id="mytextarea" value="<?php echo isset($data[0]['descripcion']) ? $data[0]['descripcion'] : ''; ?>" ></textarea>  
    </div>
    
    <div class="mb-3">
    <label class="form-label">Resumen</label>
    <input type="text" name="data[resumen]" class="form-control" placeholder="resumen"
      value="<?php echo isset($data[0]['resumen']) ? $data[0]['resumen'] : ''; ?>" required minlength="3" maxlength="50" />
  </div>

<label class="form-label" for="imagen">Subir fotografía: </label>
        <input  type="file" name="imagen"
            value='<?php echo isset($data[0]['imagen']) ? $data[0]['imagen'] : ''; ?>'/>
        

            <?php if ($action == 'edit'): ?>
            <label class="form-label" for="imagen">Imagen actual:</label>
            <div class="imagenA">
                <a class="imagenActual" href="<?php echo $data[0]['imagen']?>" target="_blank">
                    <img src="images/descarga.png" class="img-fluid" alt="logo" />
                </a>
            </div>
            <?php endif;?>

            <?php if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_caso]"
            value="<?php echo isset($data[0]['id_caso']) ? $data[0]['id_caso'] : ''; ?>">
        <?php endif; ?>
        
            <div class="mb-3">
<label class="form-label">Esta activo?</label>
            </div>
            <div class="mb-3">
<input type="radio" id="html" name="data[activo]" value="1">
<label for="html">True</label><br>
<input type="radio" id="css" name="data[activo]" value="0" checked>
<label for="css">False</label><br>
  </div>


  <div class="mb-3">
    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
  </div>

</form>