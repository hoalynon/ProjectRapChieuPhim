<?php


namespace App\Http\Services\Discount;
use App\Models\Discount;
use App\Models\ApplyDiscount;
use Illuminate\Support\Facades\Session;

class DiscountService{

    public function getAll(){
        return Discount::orderbyDesc('dis_id')->paginate(20);
    }

    public function getChosenDiscount($billid){
        return ApplyDiscount::select('Apply_Discounts.dis_id', 'Discounts.dis_name')
                            ->join('Discounts', 'Discounts.dis_id', '=', 'Apply_Discounts.dis_id')
                            ->where('bi_id', '=', $billid)
                            ->orderBy('Discounts.dis_name')
                            ->get();
    }

    public function create($request){
        try {
 
            Discount::create([
                 'dis_id' => (String) $request->input('id'),
                 'dis_name' => (String) $request->input('name'),
                 'dis_start' => Date ($request->input('start')),
                 'dis_end' => Date ($request->input('end')),
                 'dis_percent' => (float) $request->input('percent'),
            ]);
         
            Session::flash('success','Tạo Chương Trình Khuyến Mãi thành công');
        } catch (\Exception $err){
             Session::flash('error', $err->getMessage());
 
             return false;
        }
        return true;
     }
 
     public function update($discount, $request){

             $discount->dis_id = (String) $request->input('id');
             $discount->dis_name = (String) $request->input('name');
             $discount->dis_start = Date ($request->input('start'));
             $discount->dis_end = Date ($request->input('end'));
             $discount->dis_percent = (float) $request->input('percent');
             $discount->save();
 
             Session::flash('success', 'Cập nhật thành công Chương Trình Khuyến Mãi');
             return true;
 
             Session::flash('error', 'Cập nhật không thành công Chương Trình Khuyến Mãi');
             return false;
      }

    public function destroy($request){
        $id =  $request->input('id');
        $discount = Discount::where('dis_id', $id)->first();

        if ($discount){
            return Discount::where('dis_id', $id)->delete();
        }
        
        return false;
    }

}

?>