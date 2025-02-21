<?php

namespace App\Http\Controllers;
ini_set('memory_limit', '-1');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Illuminate\Support\Facades\Response;

class MainController extends Controller
{
    public function main() {
        return view('main');
    }

    public function ChangeData(Request $request){
        $dialog_idlistedu = $request->input('dialog_idlistedu');
        $dialog_id_parent = $request->input('dialog_id_parent');
        $dialog_id_givc = $request->input('dialog_id_givc');
        $dialog_id_rubpnubp = $request->input('dialog_id_rubpnubp');
        $dialog_id_level = $request->input('dialog_id_level');
        $dialog_orgtypecode = $request->input('dialog_orgtypecode');
        $dialog_establishmentkindcode = $request->input('dialog_establishmentkindcode');
        $dialog_ogrn = $request->input('dialog_ogrn');
        $dialog_ogrn_rub = $request->input('dialog_ogrn_rub');
        $dialog_kod_status_egrul = $request->input('dialog_kod_status_egrul');
        $dialog_status_egrul = $request->input('dialog_status_egrul');
        $dialog_date_remove = $request->input('dialog_date_remove') == NULL ? '' : $request->input('dialog_date_remove');
        $dialog_egrul_updated = $request->input('dialog_egrul_updated');
        $dialog_recordnum_rub = $request->input('dialog_recordnum_rub');
        $dialog_date_start_egrul = $request->input('dialog_date_start_egrul');
        $dialog_kod_status_rub = $request->input('dialog_kod_status_rub');
        $dialog_budgetlvlcode = $request->input('dialog_budgetlvlcode');
        $dialog_inclusiondate = $request->input('dialog_inclusiondate');
        $dialog_opf_code = $request->input('dialog_opf_code');
        $dialog_budgetcode = $request->input('dialog_budgetcode');
        $dialog_budgetname = $request->input('dialog_budgetname');
        $dialog_code_spobul = $request->input('dialog_code_spobul');
        $dialog_name_spobul = $request->input('dialog_name_spobul');
        $dialog_is_reorg = $request->input('dialog_is_reorg');
        $dialog_org_create_date = $request->input('dialog_org_create_date') == NULL ? '' : $request->input('dialog_org_create_date');
        $dialog_id_spr_min = $request->input('dialog_id_spr_min');
        $dialog_name_spr_min = $request->input('dialog_name_spr_min');
        $dialog_egrul_uchred = $request->input('dialog_egrul_uchred');
        $dialog_name = $request->input('dialog_name');
        $dialog_name_rub = $request->input('dialog_name_rub');
        $dialog_shortname = $request->input('dialog_shortname');
        $dialog_name_abb = $request->input('dialog_name_abb');
        $dialog_name_small = $request->input('dialog_name_small');
        $dialog_name_human = $request->input('dialog_name_human');
        $dialog_okpo = $request->input('dialog_okpo');
        $dialog_inn = $request->input('dialog_inn');
        $dialog_inn_rub = $request->input('dialog_inn_rub');
        $dialog_kpp = $request->input('dialog_kpp');
        $dialog_kpp_rub = $request->input('dialog_kpp_rub');
        $dialog_okved = $request->input('dialog_okved');
        $dialog_okvedname = $request->input('dialog_okvedname');
        $dialog_kbkcode = $request->input('dialog_kbkcode');
        $dialog_kbkname = $request->input('dialog_kbkname');
        $dialog_okfs = $request->input('dialog_okfs');
        $dialog_okfsname = $request->input('dialog_okfsname');
        $dialog_oktmo = $request->input('dialog_oktmo');
        $dialog_oktmoname = $request->input('dialog_oktmoname');
        $dialog_kofkcode = $request->input('dialog_kofkcode');
        $dialog_org_type = $request->input('dialog_org_type');
        $dialog_id_region = $request->input('dialog_id_region');
        $dialog_name_region = $request->input('dialog_name_region');
        $dialog_tz = $request->input('dialog_tz');
        $dialog_address = $request->input('dialog_address');
        $dialog_phone = $request->input('dialog_phone');
        $dialog_site = $request->input('dialog_site');
        $dialog_mail = $request->input('dialog_mail');
        $heads = $request->input('heads');

        DB::table('orgs')
            ->where('date_stop', null)
            ->leftJoin('regions', 'regions.id_region', '=', 'orgs.id_region')
            ->leftJoin('spr_min', 'spr_min.id_spr_min', '=', 'orgs.id_spr_min')
            ->leftJoin('okveds', function ($join) {
                $join->on('okveds.code', '=', 'orgs.okved')
                    ->on('okveds.idlistedu', '=', 'orgs.idlistedu');
            })
            ->where('orgs.idlistedu', $dialog_idlistedu)
            ->update([
                'id_parent' => $dialog_id_parent,
                'id_givc' => $dialog_id_givc,
                'id_rubpnubp' => $dialog_id_rubpnubp,
                'id_level' => $dialog_id_level,
                'orgtypecode' => $dialog_orgtypecode,
                'establishmentkindcode' => $dialog_establishmentkindcode,
                'ogrn' => $dialog_ogrn,
                'ogrn_rub' => $dialog_ogrn_rub,
                'kod_status_egrul' => $dialog_kod_status_egrul,
                'status_egrul' => $dialog_status_egrul,
//                'date_remove' => $dialog_date_remove == NULL ? '' : $dialog_date_remove,
                'egrul_updated' => $dialog_egrul_updated,
                'recordnum_rub' => $dialog_recordnum_rub,
                'date_start_egrul' => $dialog_date_start_egrul,
                'kod_status_rub' => $dialog_kod_status_rub,
                'budgetlvlcode' => $dialog_budgetlvlcode,
                'inclusiondate' => $dialog_inclusiondate,
                'opf_code' => $dialog_opf_code,
                'budgetcode' => $dialog_budgetcode,
                'budgetname' => $dialog_budgetname,
                'code_spobul' => $dialog_code_spobul,
                'name_spobul' => $dialog_name_spobul,
                'is_reorg' => $dialog_is_reorg,
//                'org_create_date' => $dialog_org_create_date == NULL ? '' : $dialog_org_create_date,
//                'orgs.id_spr_min' => $dialog_id_spr_min,
//                'spr_min.name_spr_min' => $dialog_name_spr_min,
                'egrul_uchred' => $dialog_egrul_uchred,
                'orgs.name' => $dialog_name,
                'name_rub' => $dialog_name_rub,
                'shortname' => $dialog_shortname,
                'name_abb' => $dialog_name_abb,
                'name_small' => $dialog_name_small,
                'name_human' => $dialog_name_human,
                'okpo' => $dialog_okpo,
                'inn' => $dialog_inn,
                'inn_rub' => $dialog_inn_rub,
                'kpp' => $dialog_kpp,
                'kpp_rub' => $dialog_kpp_rub,
                'okved' => $dialog_okved,
//                'okveds.name' => $dialog_okvedname,
                'kbkcode' => $dialog_kbkcode,
                'kbkname' => $dialog_kbkname,
                'okfs' => $dialog_okfs,
                'okfsname' => $dialog_okfsname,
                'oktmo' => $dialog_oktmo,
                'oktmoname' => $dialog_oktmoname,
                'kofkcode' => $dialog_kofkcode,
                'org_type' => $dialog_org_type,
                'orgs.id_region' => $dialog_id_region,
//                'regions.name_region' => $dialog_name_region,
//                'tz' => $dialog_tz,
                'address' => $dialog_address,
                'phone' => $dialog_phone,
                'site' => $dialog_site,
                'mail' => $dialog_mail,
                'heads' => $heads
            ]);


//        DB::update('UPDATE orgs SET
//                id_parent = ?,
//                id_givc = ?,
//                id_rubpnubp = ?,
//                id_level = ?,
//                orgtypecode = ?,
//                establishmentkindcode = ?,
//                ogrn = ?,
//                ogrn_rub = ?,
//                kod_status_egrul = ?,
//                status_egrul = ?,
//                date_remove = ?,
//                egrul_updated = ?,
//                recordnum_rub = ?,
//                date_start_egrul = ?,
//                kod_status_rub = ?,
//                budgetlvlcode = ?,
//                inclusiondate = ?,
//                opf_code = ?,
//                budgetcode = ?,
//                budgetname = ?,
//                code_spobul = ?,
//                name_spobul = ?,
//                is_reorg = ?,
//                org_create_date = ?,
//                orgs.id_spr_min = ?,
//                name_spr_min = ?,
//                egrul_uchred = ?,
//                orgs.name = ?,
//                name_rub = ?,
//                shortname = ?,
//                name_abb = ?,
//                name_small = ?,
//                name_human = ?,
//                okpo = ?,
//                inn = ?,
//                inn_rub = ?,
//                kpp = ?,
//                kpp_rub = ?,
//                okved = ?,
//                okveds.name = ?,
//                kbkcode = ?,
//                kbkname = ?,
//                okfs = ?,
//                okfsname = ?,
//                oktmo = ?,
//                oktmoname = ?,
//                kofkcode = ?,
//                org_type = ?,
//                orgs.id_region = ?,
//                name_region = ?,
//                tz = ?,
//                address = ?,
//                phone = ?,
//                site = ?,
//                mail = ?,
//                heads = ?
//            WHERE orgs.idlistedu = ?',
//            [$dialog_id_parent, $dialog_id_givc, $dialog_id_rubpnubp, $dialog_id_level, $dialog_orgtypecode, $dialog_establishmentkindcode,
//                $dialog_ogrn, $dialog_ogrn_rub, $dialog_kod_status_egrul, $dialog_status_egrul, $dialog_date_remove, $dialog_egrul_updated,
//                $dialog_recordnum_rub, $dialog_date_start_egrul, $dialog_kod_status_rub, $dialog_budgetlvlcode, $dialog_inclusiondate, $dialog_opf_code,
//                $dialog_budgetcode, $dialog_budgetname, $dialog_code_spobul, $dialog_name_spobul, $dialog_is_reorg, $dialog_org_create_date,
//                $dialog_id_spr_min, $dialog_name_spr_min, $dialog_egrul_uchred, $dialog_name, $dialog_name_rub, $dialog_shortname, $dialog_name_abb,
//                $dialog_name_small, $dialog_name_human, $dialog_okpo, $dialog_inn, $dialog_inn_rub, $dialog_kpp, $dialog_kpp_rub, $dialog_okved,
//                $dialog_okvedname, $dialog_kbkcode, $dialog_kbkname, $dialog_okfs, $dialog_okfsname, $dialog_oktmo, $dialog_oktmoname, $dialog_kofkcode,
//                $dialog_org_type, $dialog_id_region, $dialog_name_region, $dialog_tz, $dialog_address, $dialog_phone, $dialog_site, $dialog_mail, $heads,
//                $dialog_idlistedu]);
    }

    public function ShowUnitedTable(){
        $query = DB::select("SELECT id, public.orgs.idlistedu, id_parent, public.orgs.id_spr_min, id_spr_ou, id_rubpnubp,
        id_level, public.orgs.name, name_small,name_human, name_abb, public.orgs.id_region, address, ogrn, date_remove, kod_status_egrul, status_egrul,
        okpo, name_rub, egrul_updated, phone, site, mail, recordnum_rub, inn, inn_rub, kpp, kpp_rub, okved, date_start_egrul, oktmo, okfs,
        egrul_uchred, kod_status_rub, kbkcode, kbkname, budgetlvlcode, org_type, heads, inclusiondate, shortname, opf_code, okfsname,
        kofkcode, budgetcode, budgetname, code_spobul, name_spobul, is_reorg, ogrn_rub, oktmoname, org_create_date, name_region, tz,
        name_spr_min, establishmentkindcode, orgtypecode, id_givc, public.okveds.name as okvedname
	    FROM public.orgs
        LEFT JOIN public.regions ON public.regions.id_region = public.orgs.id_region
        LEFT JOIN public.spr_min ON public.spr_min.id_spr_min = public.orgs.id_spr_min
        LEFT JOIN public.okveds ON public.okveds.code = public.orgs.okved AND public.okveds.idlistedu = public.orgs.idlistedu
        WHERE date_stop isNull
        ORDER BY idlistedu");
        return json_encode($query);
    }

    public function GetTableData(){
        $query = DB::select("SELECT id, public.orgs.idlistedu, id_parent, public.orgs.id_spr_min, id_spr_ou, id_rubpnubp,
        id_level, public.orgs.name, name_small,name_human, name_abb, public.orgs.id_region, address, ogrn, date_remove, kod_status_egrul, status_egrul,
        okpo, name_rub, egrul_updated, phone, site, mail, recordnum_rub, inn, inn_rub, kpp, kpp_rub, okved, date_start_egrul, oktmo, okfs,
        egrul_uchred, kod_status_rub, kbkcode, kbkname, budgetlvlcode, org_type, heads, inclusiondate, shortname, opf_code, okfsname,
        kofkcode, budgetcode, budgetname, code_spobul, name_spobul, is_reorg, ogrn_rub, oktmoname, org_create_date, name_region, tz,
        name_spr_min, establishmentkindcode, orgtypecode, id_givc, public.okveds.name as okvedname
	    FROM public.orgs
        LEFT JOIN public.regions ON public.regions.id_region = public.orgs.id_region
        LEFT JOIN public.spr_min ON public.spr_min.id_spr_min = public.orgs.id_spr_min
        LEFT JOIN public.okveds ON public.okveds.code = public.orgs.okved AND public.okveds.idlistedu = public.orgs.idlistedu
        WHERE date_stop isNull
        ORDER BY idlistedu");
        return json_encode($query);
    }

    public function ShowOrgInfo($id){
        $data = DB::select("SELECT id, public.orgs.idlistedu, id_parent, public.orgs.id_spr_min, id_spr_ou, id_rubpnubp,
        id_level, public.orgs.name, name_small,name_human, name_abb, public.orgs.id_region, address, ogrn, date_remove, kod_status_egrul, status_egrul,
        okpo, name_rub, egrul_updated, phone, site, mail, recordnum_rub, inn, inn_rub, kpp, kpp_rub, okved, date_start_egrul, oktmo, okfs,
        egrul_uchred, kod_status_rub, kbkcode, kbkname, budgetlvlcode, org_type, heads, inclusiondate, shortname, opf_code, okfsname,
        kofkcode, budgetcode, budgetname, code_spobul, name_spobul, is_reorg, ogrn_rub, oktmoname, org_create_date, name_region, tz,
        name_spr_min, establishmentkindcode, orgtypecode, id_givc, public.okveds.name as okvedname
	    FROM public.orgs
        LEFT JOIN public.regions ON public.regions.id_region = public.orgs.id_region
        LEFT JOIN public.spr_min ON public.spr_min.id_spr_min = public.orgs.id_spr_min
        LEFT JOIN public.okveds ON public.okveds.code = public.orgs.okved AND public.okveds.idlistedu = public.orgs.idlistedu
        WHERE date_stop isNull AND public.orgs.idlistedu = $id
        ORDER BY idlistedu");
        $dataBranches = DB::select("SELECT public.orgs.idlistedu, id_parent, public.orgs.name, name_human
	    FROM public.orgs
        LEFT JOIN public.regions ON public.regions.id_region = public.orgs.id_region
        LEFT JOIN public.spr_min ON public.spr_min.id_spr_min = public.orgs.id_spr_min
        LEFT JOIN public.okveds ON public.okveds.code = public.orgs.okved AND public.okveds.idlistedu = public.orgs.idlistedu
        WHERE date_stop isNull AND id_parent = $id AND public.orgs.idlistedu != $id
        ORDER BY idlistedu");
        return view('orgInfo', ['info' => $data, 'info_branches' => $dataBranches]);
        ///compact('dataBranches')
    }

    public function ShowBranches($id){
        $dataBranches = DB::table('public.orgs')->whereNull('date_stop')->where('id_parent', '=', $id)->get();

        return view('orgInfo', compact('dataBranches'));
    }

    public function ExportReportSelection(Request $request)
    {
        $ides = $request->input('ides');
        $idesArray = explode(',', $ides);
        $attributes = $request->input('attributes');
        $attributesArray = explode(',', $attributes);
        $etalon = [
            'Код МЭИ организации' => 'orgs.idlistedu',
            'Код МЭИ головной организации' => 'id_parent',
            'Идентификатор ГИВЦ' => 'id_givc',
            'Код организации по Сводному реестру' => 'id_rubpnubp',
            'Код уровеня организации' => 'id_level',
            'Код типа организации' => 'orgtypecode',
            'Код типа учреждения' => 'establishmentkindcode',
            'ОГРН организации ЕГРЮЛ' => 'ogrn',
            'ОГРН организации РУБПНУБП' => 'ogrn_rub',
            'Код статуса записи в ЕГРЮЛ' => 'kod_status_egrul',
            'Статус записи в ЕГРЮЛ' => 'status_egrul',
            'Дата прекращения деятельности ЕГРЮЛ' => 'date_remove',
            'Дата обновления ЕГРЮЛ' => 'egrul_updated',
            'Номер реестровой записи' => 'recordnum_rub',
            'Дата постановки на учет в ФНС' => 'date_start_egrul',
            'Код статуса организации РУБПНУБП' => 'kod_status_rub',
            'Код уровня бюджета' => 'budgetlvlcode',
            'Дата включения организации в Сводный реестр' => 'inclusiondate',
            'Код ОКОПФ' => 'opf_code',
            'Код бюджета' => 'budgetcode',
            'Наименование бюджета' => 'budgetname',
            'Код способа образования' => 'code_spobul',
            'Наименование способа образования' => 'name_spobul',
            'Метка о реорганизации' => 'is_reorg',
            'Дата создания организации МОН' => 'org_create_date',
            'Код учредителя' => 'orgs.id_spr_min',
            'Наименование учредителя' => 'name_spr_min',
            'Наименование учредителя ЕГРЮЛ' => 'egrul_uchred',
            'Полное наименование организации ЕГРЮЛ' => 'orgs.name',
            'Полное наименование организации РУБПНУБП' => 'name_rub',
            'Сокращенное наименование организации' => 'shortname',
            'Сокращенное наименование организации ЕГРЮЛ' => 'name_abb',
            'Наименование для отчетов' => 'name_small',
            'Наименование для АККСУФ' => 'name_human',
            'ОКПО / Идентификационный номер ТОСП' => 'okpo',
            'ИНН организации (ЕГРЮЛ)' => 'inn',
            'ИНН организации (РУБПНУБП)' => 'inn_rub',
            'КПП организации (ЕГРЮЛ)' => 'kpp',
            'КПП организации (РУБПНУБП)' => 'kpp_rub',
            'ОКВЭД основной' => 'okved',
            'Наименование ОКВЭД основной' => 'okveds.name as okvedname',
            'Код ГРБС' => 'kbkcode',
            'ГРБС' => 'kbkname',
            'Код ОКФС' => 'okfs',
            'ОКФС' => 'okfsname',
            'Код территории населенного пункта по ОКТМО' => 'oktmo',
            'Наименование территории населенного пункта по ОКТМО' => 'oktmoname',
            'Код по КОФК территориального органа Федерального казначейства по месту нахождения организации' => 'kofkcode',
            'Классификация по деятельности' => 'org_type',
            'Код субъекта' => 'orgs.id_region',
            'Наименование субъекта' => 'name_region',
            'Часовой пояс' => 'tz',
            'Адрес' => 'address',
            'Номер телефона организации' => 'phone',
            'Web-сайт' => 'site',
            'E-Mail' => 'mail',
            'Информация о руководителе организации' => 'heads'
        ];
        $sortedAttributesArray = [];
        $result = [];
        foreach ($etalon as $key => $value) {
            if (in_array($key, $attributesArray)) {
                $sortedAttributesArray[] = $key;
                $result[] = $value;
            }
        }
        $data = DB::table('orgs')
            ->select($result)
            ->where('date_stop', null)
            ->whereIn('orgs.idlistedu', $idesArray)
            ->leftJoin('regions', 'regions.id_region', '=', 'orgs.id_region')
            ->leftJoin('spr_min', 'spr_min.id_spr_min', '=', 'orgs.id_spr_min')
            ->leftJoin('okveds', function ($join) {
                $join->on('okveds.code', '=', 'orgs.okved')
                    ->on('okveds.idlistedu', '=', 'orgs.idlistedu');
            })
            ->get();
        $expData = $data
            ->sortBy('idlistedu')
            ->values()
            ->map(function ($item) {
                return (array)$item;
            })
            ->toArray();
        $this->ExportFunctionSelection($expData, $sortedAttributesArray);
    }

    public function ExportFunctionSelection($export_array, $attributes){
        $spreadSheet = new Spreadsheet();
        $sheet = $spreadSheet->getActiveSheet();
        $sheet->fromArray($attributes,NULL,'A1');
        $sheet->fromArray($export_array,NULL,'A2');

        // Auto size columns for each worksheet
        foreach ($spreadSheet->getWorksheetIterator() as $worksheet) {

            $spreadSheet->setActiveSheetIndex($spreadSheet->getIndex($worksheet));

            $sheet = $spreadSheet->getActiveSheet();
            $cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);
            /** @var PHPExcel_Cell $cell */
            foreach ($cellIterator as $cell) {
                $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
            }
        }

        // Apply styles to the table
        $styleHeaders = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFFFA500'],
            ],
        ];

        $styleArray = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFE0E0E0'],
            ],
        ];

        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A1:' . $highestColumn . '1')->applyFromArray($styleHeaders);
        $sheet->getStyle('A2:' . $highestColumn . $highestRow)->applyFromArray($styleArray);
        $sheet->getStyle('A2:' . $highestColumn . $highestRow)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER);

        // Apply styles to the outer border of the table
        $outerBorderStyle = [
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:' . $highestColumn . $highestRow)->applyFromArray($outerBorderStyle);

        $Excel_writer = new Xls($spreadSheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="ExportedData.xls"');
        header('Cache-Control: max-age=0');
        $Excel_writer->save('ExportedData.xls');
    }

    public function GetDownload()
    {
        $file = public_path() . "/ExportedData.xls";

        $headers = array(
            'Content-Type' => 'application/xls',
        );

        return response()->download($file, 'ExportedData.xls', $headers);
    }
}
