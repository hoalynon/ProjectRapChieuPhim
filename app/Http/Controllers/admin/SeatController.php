<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Seat\SeatService;
use App\Http\Services\Room\RoomService;
use App\Models\ChooseRoom;
use Illuminate\Http\JsonResponse;
use App\Models\Seat;
use App\Models\Room;

class SeatController extends Controller
{
    protected $seatService;
    protected $roomService;

    public function __construct(SeatService $seatService, RoomService $roomService){
        $this->seatService = $seatService;
        $this->roomService = $roomService;
    }

    public function create(){
        return view('admin.seats.add', [
            'title' => 'Thêm Ghế Ngồi Mới',
            'rooms' => $this->roomService->getAll()
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'room' => 'required',
            'type' => 'required',
        ]);

        $this->seatService->create($request);
        return redirect()->back();
    }

    public function index(){
        return view('admin.seats.list',[
            'title' => 'Danh sách ghế ngồi mới nhất',
            'seats' => $this->seatService->getAll()
        ]);
    }

    public function show(Seat $seat){

        return view('admin.seats.edit', [
            'title' => 'Chỉnh sửa Ghế: ' . $seat->st_id . ", thuộc Phòng: " . $seat->r_id,
            'seat' => $seat,
            'rooms' => $this->roomService->getAll()
        ]);
    }

    public function update(Seat $seat, Request $request){
        
        $this->validate($request, [
            'id' => 'required',
            'room' => 'required',
            'type' => 'required',
        ]);
         $this->seatService->update($seat, $request);
         return redirect('/admin/seats/list');
    }

    public function destroy(Request $request) : JsonResponse{

        $result = $this->seatService->destroy($request);

        if ($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Ghế Ngồi'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xóa lỗi vui lòng thử lại'
        ]);
    }
}
