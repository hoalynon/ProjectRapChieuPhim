<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Customer\CustomerService;
use App\Http\Services\Discount\DiscountService;
use App\Http\Services\Ticket\TicketService;
use App\Models\Bill;

class BillController extends Controller
{

    protected $customerService;
    protected $discountService;
    protected $ticketService;

    public function __construct(CustomerService $customerService, DiscountService $discountService, TicketService $ticketService){
        $this->customerService = $customerService;
        $this->discountService = $discountService;
        $this->ticketService = $ticketService;
    }

    public function index(){
        return view('admin.bills.list',[
            'title' => 'Danh sách hóa đơn mới nhất',
            'bills' => Bill::orderbyDesc('bi_id')->paginate(20)
        ]);
    }

    public function show(Bill $bill){
        
        return view('admin.bills.detail', [
            'title' => 'Chi tiết hóa đơn: ' . $bill->bi_id,
            'bill' => $bill,
            'customer' => $this->customerService->getName($bill->cus_id),
            'discounts' => $this->discountService->getChosenDiscount($bill->bi_id),
            'tickets' => $this->ticketService->getChosenTicket($bill->bi_id)
        ]);
    }
}
