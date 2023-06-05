<?php
require_once(__DIR__.'/controllers/sistema.php');
require_once('../vendor/autoload.php');
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use PhpOffice\PhpSpreadsheet\{Spreadsheet,IOFactory};
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$html2pdf = new Html2Pdf();
$action = (isset($_GET["action"])) ? $_GET["action"] : 'get';
$id = (isset($_GET["id"])) ? $_GET["id"] : null;
$sistema->db();
switch ($action) {
    case 'proyecto':
        $sql = "select p.proyecto, p.fecha_inicial, p.fecha_final, d.departamento,t.tarea,t.avance  from proyecto p left join departamento d ON p.id_departamento=d.id_departamento
        left join tarea t on t.id_proyecto=p.id_proyecto
        where p.id_proyecto = :id_proyecto";
        $st = $sistema->db->prepare($sql);
        $st->bindParam(":id_proyecto", $id, PDO::PARAM_INT);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);

        try {
            ob_start();
            include("pdfDiseño.php");
            $content = ob_get_clean();
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(10,10,10,10));
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content);
            $html2pdf->output('ejemplo.pdf');
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
        break;
        
        case 'excel':
            $sql = "select p.proyecto, p.fecha_inicial, p.fecha_final, d.departamento,t.tarea,t.avance  from proyecto p left join departamento d ON p.id_departamento=d.id_departamento
            left join tarea t on t.id_proyecto=p.id_proyecto
            where p.id_proyecto = :id_proyecto";
            $st = $sistema->db->prepare($sql);
            $st->bindParam(":id_proyecto", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);

            $excel = new Spreadsheet();
            $hojaActiva = $excel->getActiveSheet();
            $hojaActiva -> setTitle("Excel Reporte");
            $hojaActiva -> getColumnDimension('A')->setWidth(30);
            $hojaActiva->setCellValue('A1', 'Departamento');
            $hojaActiva -> getColumnDimension('B')->setWidth(30);
            $hojaActiva->setCellValue('B1', 'Proyecto');
            $hojaActiva -> getColumnDimension('C')->setWidth(70);
            $hojaActiva->setCellValue('C1', 'Fecha Inicial');
            $hojaActiva -> getColumnDimension('E')->setWidth(20);
            $hojaActiva->setCellValue('D1', 'Fecha Final');
            $hojaActiva -> getColumnDimension('F')->setWidth(20);
            $hojaActiva->setCellValue('E1', 'Tarea');
            $hojaActiva -> getColumnDimension('G')->setWidth(10);
            $hojaActiva->setCellValue('F1', 'Avance');

            $fila=2;

            foreach ($data as $key => $rows){
                $hojaActiva ->setCellValue('A'.$fila,$rows['departamento']);
                $hojaActiva ->setCellValue('B'.$fila,$rows['proyecto']);
                $hojaActiva ->setCellValue('C'.$fila,$rows['fecha_inicial']);
                $hojaActiva ->setCellValue('D'.$fila,$rows['fecha_final']);
                $hojaActiva ->setCellValue('E'.$fila,$rows['tarea']);
                $hojaActiva ->setCellValue('F'.$fila,$rows['avance']);
                $fila++;
            }

            $writer = new Xlsx($excel);
            $writer->save('reporte.xlsx');
            
            header("Content-disposition: attachment; filename=reporte.xlsx");
            header("Content-type: application/xlsx");
            readfile("reporte.xlsx");
            break;
    default:
        $html = '<h1>Sin reporte</h1>No hay ningun reporte a generar';
}
$html2pdf->writeHTML($html);
$html2pdf->output();
?>