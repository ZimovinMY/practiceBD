<?php

namespace App\Http\Controllers;
ini_set('memory_limit', '-1');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Illuminate\Support\Facades\Response;

class MainController extends Controller
{
    public function main() {/*функция возврата на главную*/
        return view('main');
    }

    public function ShowUnitedTable(){/*функция получения всей таблицы из бд*/
        $query = DB::select("SELECT
        *
        FROM down1_1");
        return json_encode($query);
    }

    public function DeleteDataONE(Request $request) {
        $kod_org=$request->input('kod_org');
        DB::table('down1_1')->where('idlistedu', '=', $kod_org)->delete();
    }

    public function DeleteDataALL(Request $request) {
        $kod_org=$request->input('kod_org');
        DB::table('down1_1')->where('id_parent', '=', $kod_org)->delete();
    }

    public function ChangeData(Request $request){
        $kod_org=$request->input('kod_org');
        $dialog_id_parent=$request->input('dialog_id_parent');
        $dialog_name_human=$request->input('dialog_name_human');
        $dialog_name=$request->input('dialog_name');
        $dialog_name_small=$request->input('dialog_name_small');
        $dialog_id_region=$request->input('dialog_id_region');
        $dialog_region=$request->input('dialog_region');
        $dialog_kbkcode=$request->input('dialog_kbkcode');
        $dialog_kbkname=$request->input('dialog_kbkname');
        $dialog_establishmentkindname=$request->input('dialog_establishmentkindname');
        $dialog_org_type=$request->input('dialog_org_type');
        $dialog_level=$request->input('dialog_level');
        $dialog_id_napr=$request->input('dialog_id_napr');
        $dialog_orgtypename=$request->input('dialog_orgtypename');
        $dialog_budgetlvlname=$request->input('dialog_budgetlvlname');
        $dialog_inn=$request->input('dialog_inn');
        $dialog_kpp=$request->input('dialog_kpp');
        $dialog_address=$request->input('dialog_address');
        DB::update('update down1_1 set id_parent = ? , name_human = ?, name = ?, name_small = ?, id_region = ?,
                   region = ?, kbkcode = ?, kbkname = ?, establishmentkindname = ?, org_type = ?, level = ?, id_napr = ?,
                   orgtypename = ?, budgetlvlname = ?, inn = ?, kpp = ?, address = ?
             where idlistedu = ?',
            [$dialog_id_parent,$dialog_name_human,$dialog_name,$dialog_name_small,$dialog_id_region,$dialog_region,$dialog_kbkcode,$dialog_kbkname,$dialog_establishmentkindname,
                $dialog_org_type,$dialog_level,$dialog_id_napr,$dialog_orgtypename,$dialog_budgetlvlname,$dialog_inn,$dialog_kpp,$dialog_address,$kod_org]);
    }

    public function GetTableData(){
        $data = DB::table('down1_1')->get();
        return json_encode($data);
    }

    public function ExportReportSelection(Request $request)
    {
        $ides_export = $request->input('ides_export');
        $data = DB::select("SELECT
        idlistedu,name_human,level,region,kbkcode,establishmentkindname,org_type,id_napr,id_parent,name,name_small,kbkname,id_region,inn,kpp,orgtypename,budgetlvlname,address
        FROM down1_1
        WHERE idlistedu IN ($ides_export)");
        $data_array [] = array("Код организации", "Наименование организации", "Уровень", "Регион организации", "Код главы по БК", "Тип учреждения", "Типизация", "Направленность",
            "Код головной организации", "Полное наименование", "Сокращенное наименование", "Наименование главы по БК", "ID субъекта РФ организации", "ИНН", "КПП",
            "Тип организации", "Уровень бюджета", "Адрес");
        foreach ($data as $data_item) {
            $data_array[] = array(
                'Код организации' => $data_item->idlistedu,
                'Наименование организации' => $data_item->name_human,
                'Уровень' => $data_item->level,
                'Регион организации' => $data_item->region,
                'Код главы по БК' => $data_item->kbkcode,
                'Тип учреждения' => $data_item->establishmentkindname,
                'Типизация' => $data_item->org_type,
                'Направленность' => $data_item->id_napr,
                'Код головной организации' => $data_item->id_parent,
                'Полное наименование' => $data_item->name,
                'Сокращенное наименование' => $data_item->name_small,
                'Наименование главы по БК' => $data_item->kbkname,
                'ID субъекта РФ организации' => $data_item->id_region,
                'ИНН' => $data_item->inn,
                'КПП' => $data_item->kpp,
                'Тип организации' => $data_item->orgtypename,
                'Уровень бюджета' => $data_item->budgetlvlname,
                'Адрес' => $data_item->address,
            );
        }
        $this->ExportFunctionSelection($data_array);
    }

    public function ExportFunctionSelection($export_array){
        $spreadSheet = new Spreadsheet();
        $sheet = $spreadSheet->getActiveSheet();
        $sheet->getDefaultColumnDimension()->setWidth(16);
        $sheet->getColumnDimension('B')->setWidth(100);
        $sheet->getColumnDimension('C')->setWidth(10);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('J')->setWidth(200);
        $sheet->getColumnDimension('K')->setWidth(100);
        $sheet->getColumnDimension('L')->setWidth(60);
        $sheet->getColumnDimension('Q')->setWidth(40);
        $sheet->getColumnDimension('R')->setWidth(100);
        $sheet->getRowDimension('1')->setRowHeight(21);
        $sheet->getStyle('A1')->getFont()->setSize(12);
        $sheet->mergeCells('A1:R1');
        $borderStyleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
                'horizontal' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
                'vertical' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );
        $sheet->fromArray($export_array,NULL,'A2');
        $sheet->setCellValue('A1', 'Выбранные пользователем организации:');
        $highestRow = $sheet->getHighestDataRow();
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFFF500');
        $sheet->getStyle('A2:R'.$highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2:R'.$highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1:R'.$highestRow)->applyFromArray($borderStyleArray);
        $sheet->getStyle('A2:R2')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFF9000');
        $sheet->getStyle('A1:R2')->getFont()->setBold(true);
        $sheet->getStyle('A1:R2')->getAlignment()->setWrapText(true);
        $sheet
            ->getStyle('A1:R'.$highestRow)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM)
            ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('00000000'));
        $Excel_writer = new Xls($spreadSheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="ExportedData.xls"');
        header('Cache-Control: max-age=0');
        $Excel_writer->save('ExportedData.xls');
    }

    public function ExportReport(Request $request)
    {
        $level = $request->input('level');
        $kod_region = $request->input('kod_region');
        $region = $request->input('region');
        $code_kbk = $request->input('code_kbk');
        $kbk = $request->input('kbk');
        $type_uchr = $request->input('type_uchr');
        $type = $request->input('type');
        $napr = $request->input('napr');
        $type_org = $request->input('type_org');
        $budgetlvl = $request->input('budgetlvl');
        $filter_array [] = array("Уровень организации", "Код региона организации", "Регион организации", "Код главы по БК", "Наименование главы по БК", "Тип учреждения", "Типизация","Направленность","Тип огранизации","Уровень бюджета");
        $filter_array [] = array(
            'Уровень организации' => $level,
            'Код региона организации' => $kod_region,
            'Регион организации' => $region,
            'Код главы по БК' => $code_kbk,
            'Наименование главы по БК' => $kbk,
            'Тип учреждения' => $type_uchr,
            'Типизация' => $type,
            'Направленность' => $napr,
            'Тип огранизации' => $type_org,
            'Уровень бюджета' => $budgetlvl);
        $ides_export = $request->input('ides_export');
        $data = DB::select("SELECT
        idlistedu,name_human,level,region,kbkcode,establishmentkindname,org_type,id_napr,id_parent,name,name_small,kbkname,id_region,inn,kpp,orgtypename,budgetlvlname,address
        FROM down1_1
        WHERE idlistedu IN ($ides_export)");
        $data_array [] = array("Код организации", "Наименование организации", "Уровень", "Регион организации", "Код главы по БК", "Тип учреждения", "Типизация", "Направленность",
            "Код головной организации", "Полное наименование", "Сокращенное наименование", "Наименование главы по БК", "ID субъекта РФ организации", "ИНН", "КПП",
            "Тип организации", "Уровень бюджета", "Адрес");
        foreach ($data as $data_item) {
            $data_array[] = array(
                'Код организации' => $data_item->idlistedu,
                'Наименование организации' => $data_item->name_human,
                'Уровень' => $data_item->level,
                'Регион организации' => $data_item->region,
                'Код главы по БК' => $data_item->kbkcode,
                'Тип учреждения' => $data_item->establishmentkindname,
                'Типизация' => $data_item->org_type,
                'Направленность' => $data_item->id_napr,
                'Код головной организации' => $data_item->id_parent,
                'Полное наименование' => $data_item->name,
                'Сокращенное наименование' => $data_item->name_small,
                'Наименование главы по БК' => $data_item->kbkname,
                'ID субъекта РФ организации' => $data_item->id_region,
                'ИНН' => $data_item->inn,
                'КПП' => $data_item->kpp,
                'Тип организации' => $data_item->orgtypename,
                'Уровень бюджета' => $data_item->budgetlvlname,
                'Адрес' => $data_item->address,
            );
        }
        $this->ExportFunction($data_array,$filter_array);
    }
    public function ExportFunction($export_array,$export_filter){
        $spreadSheet = new Spreadsheet();
        $sheet = $spreadSheet->getActiveSheet();
        $sheet->getDefaultColumnDimension()->setWidth(16);
        $sheet->getColumnDimension('A')->setWidth(26);
        $sheet->getColumnDimension('B')->setWidth(100);
        $sheet->getColumnDimension('C')->setWidth(10);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('J')->setWidth(200);
        $sheet->getColumnDimension('K')->setWidth(100);
        $sheet->getColumnDimension('L')->setWidth(60);
        $sheet->getColumnDimension('Q')->setWidth(40);
        $sheet->getColumnDimension('R')->setWidth(100);
        $borderStyleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
                'horizontal' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
                'vertical' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );
        $export_filter_headers= array_values($export_filter)[0];
        $i = 0;
        foreach ($export_filter_headers as $key => $value) {
            $export_filter_headers1[$i][0] = $value;
            $i++;
        }
        $export_filter_inputs = array_values($export_filter)[1];
        $i = 0;
        foreach ($export_filter_inputs as $key => $value) {
            $export_filter_inputs1[$i][0] = $value;
            $i++;
        }
        $sheet->mergeCells('B1:R1');
        $sheet->mergeCells('B2:R2');
        $sheet->mergeCells('B3:R3');
        $sheet->mergeCells('B4:R4');
        $sheet->mergeCells('B5:R5');
        $sheet->mergeCells('B6:R6');
        $sheet->mergeCells('B7:R7');
        $sheet->mergeCells('B8:R8');
        $sheet->mergeCells('B9:R9');
        $sheet->mergeCells('B10:R10');
        $sheet->fromArray($export_filter_headers1,NULL,'A1');
        $sheet->fromArray($export_filter_inputs1,NULL,'B1');
        print_r($export_filter_headers1);
        print_r($export_filter_inputs1);
        $sheet->fromArray($export_array,NULL,'A11');
        $highestRow = $sheet->getHighestDataRow();
        $sheet->getStyle('A1:A10')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A11:R'.$highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('B1:R10')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A1:R'.$highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1:R'.$highestRow)->applyFromArray($borderStyleArray);
        $sheet->getStyle('A1:A10')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFFF500');
        $sheet->getStyle('A11:R11')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFF9000');
        $sheet->getStyle('A1:A10')->getFont()->setBold(true);
        $sheet->getStyle('A11:R11')->getFont()->setBold(true);
        $sheet->getStyle('A1:R11')->getAlignment()->setWrapText(true);
        $sheet
            ->getStyle('A1:R'.$highestRow)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM)
            ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('00000000'));
        $Excel_writer = new Xls($spreadSheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="ExportedData.xls"');
        header('Cache-Control: max-age=0');
        $Excel_writer->save('ExportedData.xls');
    }

    public function ExportReportBranches(Request $request)
    {
        $ides_export = $request->input('ides_export');
        $golov_org = $request->input('golov_org');
        $data = DB::select("SELECT
        idlistedu,name_human,level,region,kbkcode,establishmentkindname,org_type,id_napr,id_parent,name,name_small,kbkname,id_region,inn,kpp,orgtypename,budgetlvlname,address
        FROM down1_1
        WHERE idlistedu IN ($ides_export)");
        $data_array [] = array("Код организации", "Наименование организации", "Уровень", "Регион организации", "Код главы по БК", "Тип учреждения", "Типизация", "Направленность",
            "Код головной организации", "Полное наименование", "Сокращенное наименование", "Наименование главы по БК", "ID субъекта РФ организации", "ИНН", "КПП",
            "Тип организации", "Уровень бюджета", "Адрес");
        foreach ($data as $data_item) {
            $data_array[] = array(
                'Код организации' => $data_item->idlistedu,
                'Наименование организации' => $data_item->name_human,
                'Уровень' => $data_item->level,
                'Регион организации' => $data_item->region,
                'Код главы по БК' => $data_item->kbkcode,
                'Тип учреждения' => $data_item->establishmentkindname,
                'Типизация' => $data_item->org_type,
                'Направленность' => $data_item->id_napr,
                'Код головной организации' => $data_item->id_parent,
                'Полное наименование' => $data_item->name,
                'Сокращенное наименование' => $data_item->name_small,
                'Наименование главы по БК' => $data_item->kbkname,
                'ID субъекта РФ организации' => $data_item->id_region,
                'ИНН' => $data_item->inn,
                'КПП' => $data_item->kpp,
                'Тип организации' => $data_item->orgtypename,
                'Уровень бюджета' => $data_item->budgetlvlname,
                'Адрес' => $data_item->address,
            );
        }

        $this->ExportFunctionBranches($data_array,$golov_org);
    }
    public function ExportFunctionBranches($export_array,$golov_org){
        $spreadSheet = new Spreadsheet();
        $sheet = $spreadSheet->getActiveSheet();
        $sheet->getDefaultColumnDimension()->setWidth(16);
        $sheet->getColumnDimension('B')->setWidth(100);
        $sheet->getColumnDimension('C')->setWidth(10);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('J')->setWidth(200);
        $sheet->getColumnDimension('K')->setWidth(100);
        $sheet->getColumnDimension('L')->setWidth(60);
        $sheet->getColumnDimension('Q')->setWidth(40);
        $sheet->getColumnDimension('R')->setWidth(100);
        $sheet->getRowDimension('1')->setRowHeight(21);
        $sheet->getStyle('A1')->getFont()->setSize(12);
        $borderStyleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
                'horizontal' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
                'vertical' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );
        $sheet->mergeCells('A1:R1');
        $sheet->setCellValue('A1', $golov_org.' имеет филиалы:');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFFF500');
        $sheet->fromArray($export_array,NULL,'A2');
        $highestRow = $sheet->getHighestDataRow();
        $sheet->getStyle('A2:R'.$highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2:R'.$highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A2:R'.$highestRow)->applyFromArray($borderStyleArray);
        $sheet->getStyle('A2:R2')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFF9000');
        $sheet->getStyle('A1:R2')->getFont()->setBold(true);
        $sheet->getStyle('A1:R2')->getAlignment()->setWrapText(true);
        $sheet
            ->getStyle('A1:R'.$highestRow)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM)
            ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('00000000'));
        $Excel_writer = new Xls($spreadSheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="ExportedData.xls"');
        header('Cache-Control: max-age=0');
        $Excel_writer->save('ExportedData.xls');
    }

    public function ExportReportBranchesSelection(Request $request)
    {
        $ides_export = $request->input('ides_export');
        $data = DB::select("SELECT
        idlistedu,name_human,level,region,kbkcode,establishmentkindname,org_type,id_napr,id_parent,name,name_small,kbkname,id_region,inn,kpp,orgtypename,budgetlvlname,address
        FROM down1_1
        WHERE idlistedu IN ($ides_export)");
        $data_array [] = array("Код организации", "Наименование организации", "Уровень", "Регион организации", "Код главы по БК", "Тип учреждения", "Типизация", "Направленность",
            "Код головной организации", "Полное наименование", "Сокращенное наименование", "Наименование главы по БК", "ID субъекта РФ организации", "ИНН", "КПП",
            "Тип организации", "Уровень бюджета", "Адрес");
        foreach ($data as $data_item) {
            $data_array[] = array(
                'Код организации' => $data_item->idlistedu,
                'Наименование организации' => $data_item->name_human,
                'Уровень' => $data_item->level,
                'Регион организации' => $data_item->region,
                'Код главы по БК' => $data_item->kbkcode,
                'Тип учреждения' => $data_item->establishmentkindname,
                'Типизация' => $data_item->org_type,
                'Направленность' => $data_item->id_napr,
                'Код головной организации' => $data_item->id_parent,
                'Полное наименование' => $data_item->name,
                'Сокращенное наименование' => $data_item->name_small,
                'Наименование главы по БК' => $data_item->kbkname,
                'ID субъекта РФ организации' => $data_item->id_region,
                'ИНН' => $data_item->inn,
                'КПП' => $data_item->kpp,
                'Тип организации' => $data_item->orgtypename,
                'Уровень бюджета' => $data_item->budgetlvlname,
                'Адрес' => $data_item->address,
            );
        }
        $this->ExportFunctionBranchesSelection($data_array);
    }

    public function ExportFunctionBranchesSelection($export_array){
        $spreadSheet = new Spreadsheet();
        $sheet = $spreadSheet->getActiveSheet();
        $sheet->getDefaultColumnDimension()->setWidth(16);
        $sheet->getColumnDimension('B')->setWidth(100);
        $sheet->getColumnDimension('C')->setWidth(10);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('J')->setWidth(200);
        $sheet->getColumnDimension('K')->setWidth(100);
        $sheet->getColumnDimension('L')->setWidth(60);
        $sheet->getColumnDimension('Q')->setWidth(40);
        $sheet->getColumnDimension('R')->setWidth(100);
        $sheet->getRowDimension('1')->setRowHeight(21);
        $sheet->getStyle('A1')->getFont()->setSize(12);
        $sheet->mergeCells('A1:R1');
        $borderStyleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
                'horizontal' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
                'vertical' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );
        $sheet->fromArray($export_array,NULL,'A2');
        $sheet->setCellValue('A1', 'Выбранные пользователем филиалы:');
        $highestRow = $sheet->getHighestDataRow();
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFFF500');
        $sheet->getStyle('A2:R'.$highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2:R'.$highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1:R'.$highestRow)->applyFromArray($borderStyleArray);
        $sheet->getStyle('A2:R2')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFF9000');
        $sheet->getStyle('A1:R2')->getFont()->setBold(true);
        $sheet->getStyle('A1:R2')->getAlignment()->setWrapText(true);
        $sheet
            ->getStyle('A1:R'.$highestRow)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM)
            ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('00000000'));
        $Excel_writer = new Xls($spreadSheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="ExportedData.xls"');
        header('Cache-Control: max-age=0');
        $Excel_writer->save('ExportedData.xls');
    }
    public function GetDownload()
    {
        $file= public_path(). "/ExportedData.xls";

        $headers = array(
            'Content-Type: application/xls',
        );
        return Response::download($file, 'ExportedData.xls', $headers);
    }
}
