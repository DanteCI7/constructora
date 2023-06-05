<h1 class="text-center">Tareas del proyecto:
    <?php echo $data[0]['proyecto']; ?>
</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success"
                    href="proyecto/tarea_form.php?action=newtask&id=<?php echo $data[0]['id_proyecto']; ?>"
                    role="button">Ingresar una nueva tarea</a>
            </p>
        </div>
    </div>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col-md-6">Tarea</th>
                <th scope="col-md-4">% Avance</th>
                <th scope="col-md-2">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $nReg = 0;
            foreach ($data_tarea as $key => $tarea):
                $nReg++; ?>
                <tr>
                    
                    <td scope="row">
                        <?php echo $tarea["tarea"] ?>
                    </td>
                    <td scope="row">
                        <?php echo $tarea["avance"] ?>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?php echo $tarea['avance']?>%;" aria-valuenow="<?php echo $tarea['avance']?>"
                                aria-valuemin="0" aria-valuemax="100"><?php echo $tarea['avance']?>%</div>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="proyecto.php?action=edittask&id=<?php echo $data[0]["id_proyecto"]; ?>&id_tarea=<?php echo $tarea["id_tarea"]; ?>"
                            type="button" class="btn btn-warning">Editar</a>    
                        <a href="proyecto.php?action=deletetask&id=<?php echo $data[0]["id_proyecto"]; ?>&id_tarea=<?php echo $tarea["id_tarea"]; ?>"
                            type="button" class="btn btn-danger">Eliminar</a>
                          
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th>
                    Se encontraron
                    <?php echo $nReg ?> registros.
                </th>
            </tr>
        </tbody>
    </table>