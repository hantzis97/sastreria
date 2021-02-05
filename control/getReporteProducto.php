<?php
require_once '../excel/PHPExcel.php';
require_once '../modelo/producto.php';
$objProducto = new Producto();
$objPHPExcel = new PHPExcel();

$productos = $objProducto->getCantidad();


$objPHPExcel->getProperties()
        ->setCreator("El arte del vestir")
        ->setLastModifiedBy("EADV")
        ->setTitle("Reportes de productos")
        ->setSubject("Total de productos")
        ->setDescription("Reporte generador para obtener el total de productos")
        ->setCategory("Productos");

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nombre Producto')
            ->setCellValue('B1', 'Cantidad');

$i=2;

foreach ($productos as $producto) {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $producto[0])
                    ->setCellValue('B'.$i, $producto[1]);
        $i++;
}

$objPHPExcel->getActiveSheet()->setTitle('Productos');
$objPHPExcel->setActiveSheetIndex(0);

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="Reporte.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');

?>
