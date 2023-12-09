<?php


namespace App\Http\Services\Room;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class RoomService{

    public function getAll(){
        return Room::orderby('r_id')->paginate(20);
    }

    public function create($request){
        try {
            $rid = (String) $request->input('id');

            Room::create([
                 'r_id' => $rid,
                 //'r_capacity' => (String) $request->input('capacity')
                 'r_capacity' => "78"
            ]);

            for ($i = 1; $i < 13; $i++) Seat::create(['st_id' => ("A". strval($i)) , 'r_id' => $rid , 'st_type' => 'standard']);
            for ($i = 1; $i < 13; $i++) Seat::create(['st_id' => ("B". strval($i)) , 'r_id' => $rid , 'st_type' => 'standard']);
            for ($i = 1; $i < 13; $i++) Seat::create(['st_id' => ("C". strval($i)) , 'r_id' => $rid , 'st_type' => 'standard']);
            for ($i = 1; $i < 13; $i++) Seat::create(['st_id' => ("D". strval($i)) , 'r_id' => $rid , 'st_type' => 'vip']);
            for ($i = 1; $i < 13; $i++) Seat::create(['st_id' => ("E". strval($i)) , 'r_id' => $rid , 'st_type' => 'vip']);
            for ($i = 1; $i < 13; $i++) Seat::create(['st_id' => ("F". strval($i)) , 'r_id' => $rid , 'st_type' => 'vip']);
            for ($i = 1; $i < 7; $i++) Seat::create(['st_id' => ("G". strval($i)) , 'r_id' => $rid , 'st_type' => 'sweetbox']);
         
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