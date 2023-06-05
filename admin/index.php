<?php 
require_once(__DIR__."/controllers/departamento.php");

require_once(__DIR__."/controllers/sistema.php");
require_once(__DIR__."/controllers/proyecto.php");
include_once("views/header.php");
include_once("views/menu.php");

$reporte = $proyecto->chartProyecto();
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link href="./css/estilos.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
  
  // Load the Visualization API and the corechart package.
  google.charts.load('current', { 'packages': ['corechart'] });

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChart() {

    // Create the data table.

    var data = google.visualization.arrayToDataTable([
      ["Element", "Density", { role: "style" } ],
      <?php foreach ($reporte as $key => $value): ?> 
        ['<?php echo $value['mes']; ?>', <?php echo $value['cantidad']; ?>, '#b87333'],
         <?php endforeach; ?>
    ]);

    // Set chart options
    var options = {
      'title': 'Proyectos mensuales',
      'width': 400,
      'height': 300
    };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>

<div class="row" id="banner">
        <div class="col">
          <div id="imagen_banner">
            <h1 class="blanco">OHLA, con Siria y Turquia</h1>
            <h2 class="blanco">Apoyamos en las tareas de rescate tras los terremotos</h2>
          </div>
        </div>
      </div>

    <section class="element_section">
      <div class="titulos">
        Grupo Global de Infra Estructuras
        <br>
        con mas de 110 años de experiencia
      </div>
      <div id="mainbtn">
        <img src="images/template.jpg" alt="template">
      </div>

      <div class="titulos">
        Actualidad
      </div>

      <div class="row" >
        <div class="col">
          <div id="imagen_banner9">
            <p class="blanco"> 19 de Febrero de 2023</p>
            <h2 class="blanco">OHLA, una nueva marca para un grupo global de infraestructuras preparada para volver a la senda del beneficio</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <h2 class="news">
            El equipo de OHLA en Turquía dona maquinaria y herramientas para ayudar en las tareas de rescate del
            terremoto
          </h2>
          <p>
            Tras el fuerte terremoto que sacudió el sur de Turquía el pasado 6 de febrero, el equipo de OHLA en el país
            se ha movilizado donando maquinaria y equipamientos para ayudar en las labores de rescate.
          </p>
        </div>
        <div class="col">
          <h2 class="news">
            Ingesan introduce robots de limpieza para su servicio en hospitales
          </h2>
          <p>
            Ingesan, filial de cabecera de la división de Servicios de OHLA, ha presentado las nuevas unidades de robots
            autónomos de limpieza que desempeñarán su función en el Parque Hospitalario Martí i Julià (Girona).
          </p>
        </div>
        <div class="col">
          <h2 class="news">
            OHLA implementa en España Coordinal y VerSat, dos soluciones digitales para una mejor gestión del clima
            urbano
          </h2>
          <p>
            OHLA, a través de Ingesan, filial de cabecera de su línea de actividad de Servicios, ha implementado en
            España Coordinal y VerSat, dos soluciones digitales de diseño e propio.
          </p>
        </div>
      </div>
    </section>

<body>
  <!--Div that will hold the pie chart-->
  <div id="chart_div"></div>
</body>
<?php
include_once("views/footer.php");
?>