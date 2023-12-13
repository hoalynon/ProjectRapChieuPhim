<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Year;
use App\Models\Month;

class ChartController extends Controller
{

    public function LineChartYear()
    {
        $result = Year::select('yre_id','yre_count','yre_value')
                    ->orderby('yre_id')->get();

        $data = "";
        foreach ($result as $val){
            $data .= "['" . $val->yre_id . "', " . $val->yre_count . ", " . $val->yre_value . "],";
        }

        return view('admin/revenue/linechart_year', [
            'title' => "Biểu đồ đường doanh số năm gần đây",
            'data' => $data
        ]);
    }

    public function LineChartMonth()
    {
        $result = Month::select('mre_id','mre_count','mre_value')
                    ->orderby('mre_id')->get();

        $data = "";
        foreach ($result as $val){
            $data .= "['" . $val->mre_id . "', " . $val->mre_count . ", " . $val->mre_value . "],";
        }

        return view('admin/revenue/linechart_month', [
            'title' => "Biểu đồ đường doanh số các tháng trong năm",
            'data' => $data
        ]);
    }
}
