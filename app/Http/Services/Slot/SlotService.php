<?php


namespace App\Http\Services\Slot;
use App\Models\Slot;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Cast\Double;

class SlotService{

    public function getAll(){
        return Slot::orderby('mv_id')->orderby('r_id')->orderby('sl_id')->paginate(20);
    }

    public function create($request, $durationcollection){

        $duration = $durationcollection->mv_duration;
        $timestamp = strtotime($duration) - strtotime('TODAY');;
        $time = $timestamp + strtotime($request->input('start'));
        //dd(date("Y-m-dTH:i:s", $time));
        $end = str_replace("UTC", "T", date("Y-m-dTH:i:s", $time));

        try {
 
            Slot::create([
                 'sl_id' => (String) $request->input('id'),
                 'r_id' => (String) $request->input('room'),
                 'mv_id' => (String) $request->input('movie'),
                 'mv_duration' => $duration,
                 'sl_start' => $request->input('start'),
                 'sl_end' => $end,
                 'sl_price' => (Double) $request->input('price')
            ]);
         
            Session::flash('success','Tạo Suất Chiếu thành công');
        } catch (\Exception $err){
             Session::flash('error', $err->getMessage());
 
             return false;
        }
        return true;
     }
 
     public function update($slot, $request, $durationcollection){

            $duration = $durationcollection->mv_duration;
            $timestamp = strtotime($duration) - strtotime('TODAY');;
            $time = $timestamp + strtotime($request->input('start'));

            $end = str_replace("UTC", "T", date("Y-m-dTH:i:s", $time));


            $slot->sl_id = (String) $request->input('id');
            $slot->r_id = (String) $request->input('room');
            $slot->mv_id = (String) $request->input('movie');
            $slot->mv_duration = $duration;
            $slot->sl_start = $request->input('start');
            $slot->sl_end = $end;
            $slot->sl_price = (Double) $request->input('price');
            $slot->save();
 
             Session::flash('success', 'Cập nhật thành công Suất Chiếu');
             return true;
 
             Session::flash('error', 'Cập nhật không thành công Suất Chiếu');
             return false;
      }

    public function destroy($request){
        $id =  $request->input('id');
        $room =  $request->input('id2');
        $movie =  $request->input('id3');
        $slot = Slot::where('sl_id', $id)->where('r_id', $room)->where('mv_id', $movie)->first();

        if ($slot){
            return Slot::where('sl_id', $id)->where('r_id', $room)->where('mv_id', $movie)->delete();
        }
        
        return false;
    }

}

?>