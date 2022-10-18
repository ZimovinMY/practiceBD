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
}
