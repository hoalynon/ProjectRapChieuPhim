<?php

namespace App\Http\Services;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class UploadService{

    public function storePoster($request){
        if ($request->hasFile('file')){
            
            try {
                $name = $request->file('file')->getClientOriginalName();

                $pathFull = 'uploads/poster/' . date("Y/m/d");

                $request->file('file')->storeAs(
                    'public/' . $pathFull , $name
                );

                return '/storage/' . $pathFull . '/' . $name;
            }
            catch (\Exception){
                return false;
            }
            
        };
    }

    public function storeTrailer($request){
        if ($request->hasFile('file')){
            
            try {
                $name = $request->file('file')->getClientOriginalName();

                $pathFull = 'uploads/trailer/' . date("Y/m/d");

                $request->file('file')->storeAs(
                    'public/' . $pathFull , $name
                );

                return '/storage/' . $pathFull . '/' . $name;
            }
            catch (\Exception){
                return false;
            }
            
        };
    }
}

?>