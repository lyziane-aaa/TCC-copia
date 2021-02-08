<?php
session_start();
include_once ('../conexao.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


$spreadsheet = new Spreadsheet();




$sheet = $spreadsheet->getActiveSheet();
$spreadsheet->getDefaultStyle()->getFont()->setName('Liberation Serif');

$bold = [
    'font' => [
        'bold' => true,
   
    ],
    
];

$styleArray = [
   
    
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    
];
$spreadsheet->getActiveSheet()->getStyle('A2:J2')->applyFromArray($styleArray);

$spreadsheet->getActiveSheet()->getStyle('A2:J2')->applyFromArray($bold);



$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(8);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(24);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(30);

$sheet->setCellValue('B1', 'Relatório do Achados e Perdidos');
$sheet->setCellValue('A2', 'ID');
$sheet->setCellValue('B2', 'Nome do objeto');
$sheet->setCellValue('C2', 'Descrição do Objeto:');
$sheet->setCellValue('D2', 'Gremista que recebeu:');
$sheet->setCellValue('E2', 'Quando foi achado:');
$sheet->setCellValue('F2', 'Onde foi achado:');
$sheet->setCellValue('G2', 'Quem reivindicou:');
$sheet->setCellValue('H2', 'CPF/Matrícula de quem reivindicou:');
$sheet->setCellValue('I2', 'Postado:');
$sheet->setCellValue('J2', 'Situação:');


$resultado_relatorio_achados = "SELECT * FROM achados";
$resultado_relatorio_achados = mysqli_query($conn , $resultado_relatorio_achados);

if ($resultado_relatorio_achados -> num_rows > 0) {
    $n=1;
    while($row = $resultado_relatorio_achados->fetch_assoc()){
        $rowNum = $n+2;
        $sheet->setCellValue('A'.$rowNum, $row["idAchados"]);
        $sheet->setCellValue('B'.$rowNum, $row["nomeAchados"]);
        $sheet->setCellValue('C'.$rowNum, $row["descricaoAchados"]);
        $sheet->setCellValue('D'.$rowNum, $row["gremistaRecebeuAchados"]);
        $sheet->setCellValue('E'.$rowNum, $row["quandoAchados"]);
        $sheet->setCellValue('F'.$rowNum, $row["ondeAchados"]);
        $sheet->setCellValue('G'.$rowNum, $row["quemReivindicouAchados"]);

        $sheet->setCellValue('H'.$rowNum, $row ["cpfMatriculaAchados"]);
        $sheet->setCellValue('I'.$rowNum, $row["postadoAchados"]);
        $sheet->setCellValue('J'.$rowNum, $row["statusAchados"]);

        $spreadsheet->getActiveSheet()->getStyle('A'.$rowNum.':J'.$rowNum)->applyFromArray($styleArray);

        $n++;
    }
}

date_default_timezone_set('America/Fortaleza');

$data = date ('H:i:s');
$data = $data.'___'.date('d/m/Y');

$filename = 'Relatório Achados e Perdidos -'.$data.'.xlsx';
// Redirect output to a client's web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
 
// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT-3'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');