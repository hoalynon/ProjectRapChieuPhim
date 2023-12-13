<?php


namespace App\Http\Services\Customer;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CustomerService{

    public function getAll(){
        return Customer::orderbyDesc('cus_id')->paginate(20);
    }

    public function getName($id){
        return Customer::select('cus_name')->where('cus_id', '=', $id)->first();
    }

    public function destroy($request){
        $id =  $request->input('id');
        $customer = Customer::where('cus_id', $id)->first();
        
        if ($customer){
            return Customer::where('cus_id', $id)->delete();
        }
        
        return false;
    }

}

?>