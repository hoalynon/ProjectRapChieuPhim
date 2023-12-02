<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Movie\MovieService;
use App\Http\Services\Type\TypeService;
use App\Models\ChooseType;
use Illuminate\Http\JsonResponse;
use App\Models\Movie;
use App\Models\Type;

class MovieController extends Controller
{
    protected $movieService;
    protected $typeService;

    public function __construct(MovieService $movieService, TypeService $typeService){
        $this->movieService = $movieService;
        $this->typeService = $typeService;
    }

    public function create(){
        return view('admin.movies.add', [
            'title' => 'Thêm Phim Mới',
            'types' => $this->typeService->getAll()
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'start' => 'required',
            'end' => 'required',
            'duration' => 'required',
            'restrict' => 'required',
            'caption' => 'required',
            'link_poster' => 'required',
            'link_trailer' => 'required'
        ]);

        $this->movieService->create($request);
        return redirect()->back();
    }

    public function index(){
        return view('admin.movies.list',[
            'title' => 'Danh sách phim mới nhất',
            'movies' => $this->movieService->getAll()
        ]);
    }

    public function show(Movie $movie){

        return view('admin.movies.edit', [
            'title' => 'Chỉnh sửa Phim: ' . $movie->mv_name,
            'movie' => $movie,
            'types' => $this->typeService->getAll(),
            'chosentypes' => ChooseType::orderby('type_id')->where('mv_id', '=', $movie->mv_id)->paginate(20)
        ]);
    }

    public function update(Movie $movie, Request $request){
        
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'start' => 'required',
            'end' => 'required',
            'duration' => 'required',
            'restrict' => 'required',
            'caption' => 'required',
            'link_poster' => 'required',
            'link_trailer' => 'required'
        ]);
         $this->movieService->update($movie, $request);
         return redirect('/admin/movies/list');
    }

    public function destroy(Request $request) : JsonResponse{

        $result = $this->movieService->destroy($request);

        if ($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Phim'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xóa lỗi vui lòng thử lại'
        ]);
    }
}
