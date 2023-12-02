<?php


namespace App\Http\Services\Movie;

use App\Models\ChooseType;
use App\Models\Movie;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Time;

class MovieService{

    public function getAll(){
        return Movie::orderbyDesc('mv_id')->paginate(20);
    }

    public function getDuration($id){
        return Movie::select('mv_duration')->where('mv_id', '=', $id)->first();
    }

    public function getAllName(){
        return Movie::select('mv_id','mv_name')->orderBy('mv_name')->get();
    }

    public function getName($id){
        return Movie::select('mv_name')->where('mv_id', '=', $id)->first();
    }

    public function create($request){
        try {
            
            Movie::create([
                'mv_id' => (String) $request->input('id'),
                'mv_name' => (String) $request->input('name'),
                'mv_start' => Date($request->input('start')),
                'mv_end' => Date($request->input('end')),
                'mv_duration' => $request->input('duration'),
                'mv_restrict' => (String) $request->input('restrict'),
                'mv_cap' => (String) $request->input('caption'),
                'mv_link_poster' => (String) $request->input('link_poster'),
                'mv_link_trailer' => (String) $request->input('link_trailer'),
                'mv_detail' => (String) $request->input('detail')
            ]);

            $chosenTypes = $request->input('movie_type');
            $mv_id = (String) $request->input('id');
            if($chosenTypes == null){
                Session::flash('error', 'Phim phải thuộc ít nhất một thể loại');
                return false;
            }
            foreach($chosenTypes as $type_id){
                ChooseType::create([
                    'type_id' => $type_id,
                    'mv_id' => $mv_id
                ]);
            }
         
            Session::flash('success','Tạo Phim thành công');
        } catch (\Exception $err){
             Session::flash('error', $err->getMessage());
 
             return false;
        }
        return true;
     }
 
     public function update($movie, $request){

            $movie->mv_id = (String) $request->input('id');
            $movie->mv_name = (String) $request->input('name');
            $movie->mv_start = Date($request->input('start'));
            $movie->mv_end = Date($request->input('end'));
            $movie->mv_duration = $request->input('duration');
            $movie->mv_restrict = (String) $request->input('restrict');
            $movie->mv_cap = (String) $request->input('caption');
            $movie->mv_link_poster = (String) $request->input('link_poster');
            $movie->mv_link_trailer = (String) $request->input('link_trailer');
            $movie->mv_detail = (String) $request->input('detail');
            $movie->save();

            $chosenTypes = $request->input('movie_type');
            $mv_id = (String) $request->input('id');
            if($chosenTypes == null){
                Session::flash('error', 'Phim phải thuộc ít nhất một thể loại');
                return false;
            }

            ChooseType::where('mv_id',$mv_id)->delete();

            foreach($chosenTypes as $type_id){
                ChooseType::create([
                    'type_id' => $type_id,
                    'mv_id' => $mv_id
                ]);
            }
 
             Session::flash('success', 'Cập nhật thành công Phim');
             return true;
 
             Session::flash('error', 'Cập nhật không thành công Phim');
             return false;
      }

    public function destroy($request){
        $id =  $request->input('id');
        $movie = Movie::where('mv_id', $id)->first();
        
        if ($movie){
            return Movie::where('mv_id', $id)->delete();
        }
        
        return false;
    }

}

?>