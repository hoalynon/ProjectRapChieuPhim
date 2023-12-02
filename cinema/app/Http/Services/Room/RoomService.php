<?php


namespace App\Http\Services\Room;
use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class RoomService{

    public function getAll(){
        return Room::orderby('r_id')->paginate(20);
    }

    public function create($request){
        try {
 
            Room::create([
                 'r_id' => (String) $request->input('id'),
                 'r_capacity' => (String) $request->input('capacity')
            ]);
         
            Session::flash('success','Tạo Phòng Chiếu thành công');
        } catch (\Exception $err){
             Session::flash('error', $err->getMessage());
 
             return false;
        }
        return true;
     }
 
     public function update($room, $request){

             $room->r_id = (String) $request->input('id');
             $room->r_capacity = (int) $request->input('capacity');
             $room->save();
 
             Session::flash('success', 'Cập nhật thành công Phòng Chiếu');
             return true;
 
             Session::flash('error', 'Cập nhật không thành công Phòng Chiếu');
             return false;
      }

    public function destroy($request){
        $id =  $request->input('id');
        $room = Room::where('r_id', $id)->first();
        
        if ($room){
            return Room::where('r_id', $id)->delete();
        }
        
        return false;
    }

}

?>