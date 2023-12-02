<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Room\RoomService;
use Illuminate\Http\JsonResponse;
use App\Models\Room;

class RoomController extends Controller
{
    protected $roomService;

    public function __construct(RoomService $roomService){
        $this->roomService = $roomService;
    }

    public function create(){
        return view('admin.rooms.add', [
            'title' => 'Thêm Phòng Chiếu Mới'
        ]);
    }

    public function store(Request $request){

        $this->validate($request, [
            'id' => 'required',
            'capacity' => 'required'
        ]);

        $this->roomService->create($request);
        return redirect()->back();
    }

    public function index(){
        return view('admin.rooms.list',[
            'title' => 'Danh sách thể loại phim mới nhất',
            'rooms' => $this->roomService->getAll()
        ]);
    }

    public function show(Room $room){
        return view('admin.rooms.edit', [
            'title' => 'Chỉnh sửa Phòng Chiếu: ' . $room->r_id,
            'room' => $room
        ]);
    }

    public function update(Room $room, Request $request){
        
        $this->validate($request, [
            'id' => 'required',
            'capacity' => 'required'
        ]);
         $this->roomService->update($room, $request);
        return redirect('/admin/rooms/list');
    }

    public function destroy(Request $request) : JsonResponse{

        $result = $this->roomService->destroy($request);

        if ($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Phòng Chiếu'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xóa lỗi vui lòng thử lại'
        ]);
    }
}
