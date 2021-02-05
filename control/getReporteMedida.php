<?php
require_once '../excel/PHPExcel.php';
require_once '../modelo/medida.php';
$objMedida = new Medida();
$objPHPExcel = new PHPExcel();

$medidas = $objMedida->getCantidad();


$objPHPExcel->getProperties()
        ->setCreator("El arte del vestir")
        ->setLastModifiedBy("EADV")
        ->setTitle("Reportes de pedidos")
        ->setSubject("Total de pedidos")
        ->setDescription("Reporte generador para obtener el total de pedidos")
        ->setCategory("Pedidos");

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nombre del Pedido')
            ->setCellValue('B1', 'Cantidad')
            ->setCellValue('C1', 'Fecha');

$i=2;

foreach ($medidas as $medida) {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $medida[0])
                    ->setCellValue('B'.$i, $medida[2])
                    ->setCellValue('C'.$i, $medida[1]);
        $i++;
}

$objPHPExcel->getActiveSheet()->setTitle('Medidas');
$objPHPExcel->setActiveSheetIndex(0);

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="Reporte.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');

?>
