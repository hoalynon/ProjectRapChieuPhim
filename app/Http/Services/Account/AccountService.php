<?php


namespace App\Http\Services\account;
use App\Models\account;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class accountService{

    public function getAll(){
        return Account::orderbyDesc('cus_email')->paginate(20);
    }

    public function destroy($request){
        $id =  $request->input('id');
        $account = Account::where('cus_email', $id)->first();
        
        if ($account){
            return Account::where('cus_email', $id)->delete();
        }
        
        return false;
    }

}

?>