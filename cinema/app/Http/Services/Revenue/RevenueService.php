<?php


namespace App\Http\Services\Revenue;
use App\Models\Year;
use App\Models\Month;

class RevenueService{

    public function getAllYear(){
        return Year::orderbyDesc('yre_id')->paginate(10);
    }

    public function getAllMonth(){
        return Month::orderbyDesc('mre_yre_id')->orderby('mre_id')->paginate(24);
    }

}

?>