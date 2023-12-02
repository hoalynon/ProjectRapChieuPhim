<?php


namespace App\Http\Services\Type;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class TypeService{

    public function getAll(){
        return Type::orderby('type_name')->paginate(20);
    }

    public function create($request){
        try {
 
            Type::create([
                 'type_id' => (String) $request->input('id'),
                 'type_name' => (String) $request->input('name')
            ]);
         
            Session::flash('success','Tạo Thể Loại thành công');
        } catch (\Exception $err){
             Session::flash('error', $err->getMessage());
 
             return false;
        }
        return true;
     }
 
     public function update($type, $request){

             $type->type_id = (String) $request->input('id');
             $type->type_name = (String) $request->input('name');
             $type->save();
 
             Session::flash('success', 'Cập nhật thành công Thể Loại');
             return true;
 
             Session::flash('error', 'Cập nhật không thành công Thể Loại');
             return false;
      }

    public function destroy($request){
        $id =  $request->input('id');
        $type = Type::where('type_id', $id)->first();
        
        if ($type){
            return Type::where('type_id', $id)->delete();
        }
        
        return false;
    }

}

?>