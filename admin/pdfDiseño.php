<page backtop="25mm" backbottom="25mm" backleft="10mm" backright="10mm">
    <page_header>
        <div style="background-color:black;">
            <table>
                <tr>
                    <td><img src="../images/logo.jpg" style="width: 180px;" /></td>
                    <td style="padding-left:150px; padding-top:10px;">
                        <h2 style="color:white; text-align:center;">Informe de Proyecto</h2>
                    </td>
                </tr>
            </table>
        </div>

    </page_header>

    <page_footer>
        <div style="background-color:black; height:80px;">
        <table>
                <tr>
                    <td>
                    <ul>
                    <li style="color:white">Teléfono: <span>461-399-82-16</span></li>
                    <li style="color:white">Correo Eléctronico: <span>constructorag2@gmail.com</span></li>
                </ul>
                    </td>
                    <td style="padding-left:200px; padding-top:5px; padding-bottom:5px;">
                        <img src="../images/logo.jpg" style="width: 180px;" />
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>
    <table style="border: 2px; margin-top:10px;">
        <tr>
            <td>
                <ul>
                    <li>Departamento: <span style="color:orange"><?php echo $data[0]['departamento']; ?></span></li>
                    <li>Nombre del Proyecto: <span style="color:orange"><?php echo $data[0]['proyecto']; ?></span></li>
                    <li>Fecha Inicial: <span style="color:orange"><?php echo $data[0]['fecha_inicial']; ?></span></li>
                    <li>Fecha Final: <span style="color:orange"><?php echo $data[0]['fecha_final']; ?></span></li>
                </ul>
        </td>
        </tr>
    </table>
    
    <div style="background-color:black; margin-top:30px;">
        <h2 style="color:white; text-align:center;">Tareas del proyecto: <?php echo $data[0]['proyecto']; ?> </h2>
    </div>
  

    <table style="border: 2px; margin-top:20px; margin-bottom: 3px;">
        <tr>
            <th>Tarea</th>
            <th>Avance</th>
        </tr>
        <?php foreach ($data as $key => $tarea): ?>
        <tr style="border: 2px;">
            <td><span>  <?php echo $tarea['tarea']; ?></span></td>
            <td><span>  <?php echo $tarea['avance']; ?> %</span></td>
        </tr>
        <?php endforeach ?>
    </table>
</page>