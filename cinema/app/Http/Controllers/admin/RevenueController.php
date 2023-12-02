<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Revenue\RevenueService;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    protected $revenueService;

    public function __construct(RevenueService $revenueService){
        $this->revenueService = $revenueService;
    }

    public function yearindex(){
        return view('admin.revenue.year',[
            'title' => 'Danh sách các doanh thu các năm',
            'years' => $this->revenueService->getAllYear()
        ]);
    }

    public function monthindex(){
        return view('admin.revenue.month',[
            'title' => 'Danh sách các doanh thu các tháng',
            'months' => $this->revenueService->getAllMonth()
        ]);
    }
}
