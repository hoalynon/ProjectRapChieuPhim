<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Customer\CustomerService;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService){
        $this->customerService = $customerService;
    }

    public function index(){
        
        return view('admin.customers.list',[
            'title' => 'Danh sách khách hàng mới nhất',
            'customers' => $this->customerService->getAll()
        ]);
    }

    public function destroy(Request $request) : JsonResponse{

        $result = $this->customerService->destroy($request);

        if ($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Khách Hàng'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xóa lỗi vui lòng thử lại'
        ]);
    }
}
