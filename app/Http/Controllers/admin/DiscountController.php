<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Movie\MovieService;
use Illuminate\Http\Request;
use App\Http\Services\Discount\DiscountService;
use App\Http\Services\Room\RoomService;
use Illuminate\Http\JsonResponse;
use App\Models\Discount;
use App\Models\Room;

class DiscountController extends Controller
{
    protected $discountService;

    public function __construct(DiscountService $discountService){
        $this->discountService = $discountService;
    }

    public function create(){
        return view('admin.discounts.add', [
            'title' => 'Thêm Chương Trình Khuyến Mãi Mới'
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'percent' => 'required'
        ]);

        $this->discountService->create($request);
        return redirect()->back();
    }

    public function index(){
        return view('admin.discounts.list',[
            'title' => 'Danh sách khuyến mãi mới nhất',
            'discounts' => $this->discountService->getAll()
        ]);
    }

    public function show(Discount $discount){

        return view('admin.discounts.edit', [
            'title' => 'Chỉnh sửa Khuyến Mãi: ' . $discount->dis_name,
            'discount' => $discount
        ]);
    }

    public function update(Discount $discount, Request $request){
        
        $this->validate($request, [
            'id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'percent' => 'required'
        ]);
         $this->discountService->update($discount, $request);
         return redirect('/admin/discounts/list');
    }

    public function destroy(Request $request) : JsonResponse{

        $result = $this->discountService->destroy($request);

        if ($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Chương Trình Khuyến Mãi'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xóa lỗi vui lòng thử lại'
        ]);
    }
}
