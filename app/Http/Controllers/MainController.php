<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function main() {/*функция возврата на главную*/
        return view('main');
    }

    public function ShowUnitedTable(){/*функция получения данных*/
        $query = DB::select("SELECT
        *
        FROM down1_1");
        return json_encode($query);
    }

    public function DeleteDataONE(Request $request) {/*функция возврата на главную*/
        $kod_org=$request->input('kod_org');
        DB::table('down1_1')->where('idlistedu', '=', $kod_org)->delete();
    }

    public function DeleteDataALL(Request $request) {/*функция возврата на главную*/
        $kod_org=$request->input('kod_org');
        DB::table('down1_1')->where('id_parent', '=', $kod_org)->delete();
    }
}
