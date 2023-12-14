<?php


namespace App\Http\Services\Customer;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CustomerService{

    public function getAll(){
        return User::orderbyDesc('id')->paginate(20);
    }

    public function getName($id){
        return User::select('cus_name')->where('id', '=', $id)->first();
    }

    public function destroy($request){
        $id =  $request->input('id');
        $user = User::where('id', $id)->first();
        
        if ($user){
            return User::where('id', $id)->delete();
        }
        
        return false;
    }

}

?>