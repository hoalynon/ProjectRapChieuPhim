<?php


namespace App\Http\Services\Seat;
use App\Models\Seat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class SeatService{

    public function getAll(){
        return Seat::orderby('st_id')->orderby('r_id')->paginate(20);
    }

    public function create($request){
        try {
 
            Seat::create([
                 'st_id' => (String) $request->input('id'),
                 'r_id' => (String) $request->input('room'),
                 'st_type' => (String) $request->input('type')
            ]);
         
            Session::flash('success','Tạo Ghế Ngồi thành công');
        } catch (\Exception $err){
             Session::flash('error', $err->getMessage());
 
             return false;
        }
        return true;
     }
 
     public function update($seat, $request){

             $seat->st_id = (String) $request->input('id');
             $seat->r_id = (String) $request->input('room');
             $seat->st_type = (String) $request->input('type');
             $seat->save();
 
             Session::flash('success', 'Cập nhật thành công Ghế Ngồi');
             return true;
 
             Session::flash('error', 'Cập nhật không thành công Ghế Ngồi');
             return false;
      }

    public function destroy($request){
        $id =  $request->input('id');
        $room =  $request->input('id2');
        $seat = Seat::where('st_id', $id)->where('r_id', $room)->first();

        if ($seat){
            return Seat::where('st_id', $id)->where('r_id', $room)->delete();
        }
        
        return false;
    }

}

?>