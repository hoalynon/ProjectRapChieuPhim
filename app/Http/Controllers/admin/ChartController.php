<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Year;
use App\Models\Month;
use App\Models\Bill;

class ChartController extends Controller
{

    public function LineChartYear()
    {
        Recalculate();

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
        Recalculate();

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

    public function Recalculate(){
        if (!(Year::get())->isEmpty()){
            Month::where('mre_yre_id', '!=', null)->delete();
            Year::query()->delete();
        }

        $bills = Bill::get();
        $year = 0;
        $month = 0;
        $idmonth = "";
        
        foreach ($bills as $bill){
            $year = substr($bill->bi_date, 0, 4);
            $month = substr($bill->bi_date, 5, 2); 
            $idmonth = $year . "_" . $month;

            $result = Year::where('yre_id', '=', $year)->first();
            if ($result == null)
            {
                Year::create([
                    'yre_id' => $year,
                    'yre_year' => intval($year),
                    'yre_count' => $bill->tk_count,
                    'yre_value' => $bill->bi_value
                ]);
            }
            else {
                $result->yre_count += $bill->tk_count;
                $result->yre_value += $bill->bi_value;
                $result->save();
            }

            $result2 = Month::where('mre_id', '=', $idmonth)->first();
            if ($result2 == null)
            {
                Month::create([
                    'mre_id' => $idmonth,
                    'mre_month' => intval($month),
                    'mre_yre_id' => $year,
                    'mre_count' => $bill->tk_count,
                    'mre_value' => $bill->bi_value
                ]);
            }
            else {
                $result2->mre_count += $bill->tk_count;
                $result2->mre_value += $bill->bi_value;
                $result2->save();
            }
        }
    }
}
