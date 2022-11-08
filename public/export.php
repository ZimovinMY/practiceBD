<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Код организации');
$sheet->setCellValue('B1', 'Наименование организации');
$sheet->setCellValue('C1', 'Уровень');
$sheet->setCellValue('D1', 'Регион организации');
$sheet->setCellValue('E1', 'Наименование основного ОКВЭД');
$sheet->setCellValue('F1', 'Тип организации');
$sheet->setCellValue('G1', 'Тип учреждения');
$sheet->setCellValue('H1', 'Уровень бюджета');
$sheet->setCellValue('I1', 'Типизация');
$sheet->setCellValue('J1', 'Направленность');
$sheet->setCellValue('K1', 'Адрес');

$filename = 'output_data-'.time().'.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
