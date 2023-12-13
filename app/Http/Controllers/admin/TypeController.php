<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Type\TypeService;
use Illuminate\Http\JsonResponse;
use App\Models\Type;

class TypeController extends Controller
{
    protected $typeService;

    public function __construct(TypeService $typeService){
        $this->typeService = $typeService;
    }

    public function create(){
        return view('admin.types.add', [
            'title' => 'Thêm Thể Loại Phim Mới'
        ]);
    }

    public function store(Request $request){

        $this->validate($request, [
            'id' => 'required',
            'name' => 'required'
        ]);

        $this->typeService->create($request);
        return redirect()->back();
    }

    public function index(){
        return view('admin.types.list',[
            'title' => 'Danh sách thể loại phim mới nhất',
            'types' => $this->typeService->getAll()
        ]);
    }

    public function show(Type $type){
        return view('admin.types.edit', [
            'title' => 'Chỉnh sửa Thể Loại: ' . $type->type_name,
            'type' => $type
        ]);
    }

    public function update(Type $type, Request $request){
        
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required'
        ]);
         $this->typeService->update($type, $request);
        return redirect('/admin/types/list');
    }

    public function destroy(Request $request) : JsonResponse{

        $result = $this->typeService->destroy($request);

        if ($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Thể Loại'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xóa lỗi vui lòng thử lại'
        ]);
    }
}
