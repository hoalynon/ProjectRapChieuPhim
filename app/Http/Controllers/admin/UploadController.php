<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\UploadService;

class UploadController extends Controller
{
    protected $upload;

    public function __construct(UploadService $upload){
        $this->upload = $upload;
    }

    public function storePoster(Request $request){

        $url = $this->upload->storePoster($request);
        
        if ($url != false){
            return response()->json([
                'error' => false,
                'url' => $url
            ]) ;
        }
        return response()->json([
            'error' => true,
        ]) ;
    }

    public function storeTrailer(Request $request){

        $url = $this->upload->storeTrailer($request);

        if ($url != false){
            return response()->json([
                'error' => false,
                'url' => $url
            ]) ;
        }
        return response()->json([
            'error' => true,
        ]) ;
    }
}
