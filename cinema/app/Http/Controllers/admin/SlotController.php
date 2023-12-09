<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Movie\MovieService;
use Illuminate\Http\Request;
use App\Http\Services\Slot\SlotService;
use App\Http\Services\Room\RoomService;
use Illuminate\Http\JsonResponse;
use App\Models\Slot;
use App\Models\Room;

class SlotController extends Controller
{
    protected $slotService;
    protected $roomService;
    protected $movieService;

    public function __construct(SlotService $slotService, RoomService $roomService, MovieService $movieService){
        $this->slotService = $slotService;
        $this->roomService = $roomService;
        $this->movieService = $movieService;
    }

    public function create(){
        return view('admin.slots.add', [
            'title' => 'Thêm Suất Chiếu Mới',
            'rooms' => $this->roomService->getAll(),
            'movies' => $this->movieService->getAllName()
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'room' => 'required',
            'movie' => 'required',
            'start' => 'required',
            'price' => 'required'
        ]);

        $this->slotService->create($request, $this->movieService->getDuration($request->input('movie')));
        return redirect()->back();
    }

    public function index(){
        return view('admin.slots.list',[
            'title' => 'Danh sách suất chiếu mới nhất',
            'slots' => $this->slotService->getAll()
        ]);
    }

    public function show(Slot $slot){

        return view('admin.slots.edit', [
            'title' => 'Chỉnh sửa Suất Chiếu: ' . $slot->sl_id . ", thuộc Phòng: " . $slot->r_id .
             ", thuộc Phim: " . $this->movieService->getName($slot->mv_id)->mv_name,
            'slot' => $slot,
            'rooms' => $this->roomService->getAll(),
            'movies' => $this->movieService->getAllName()
        ]);
    }

    public function update(Slot $slot, Request $request){
        
        $this->validate($request, [
            'id' => 'required',
            'room' => 'required',
            'movie' => 'required',
            'start' => 'required',
            'price' => 'required'
        ]);
         $this->slotService->update($slot, $request, $this->movieService->getDuration($request->input('movie')));
         return redirect('/admin/slots/list');
    }

    public function destroy(Request $request) : JsonResponse{

        $result = $this->slotService->destroy($request);

        if ($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Suất Chiếu'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xóa lỗi vui lòng thử lại'
        ]);
    }
}
