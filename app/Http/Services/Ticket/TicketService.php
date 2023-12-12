<?php


namespace App\Http\Services\Ticket;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class TicketService{

    public function getAll(){
        return Ticket::orderby('tk_id')->paginate(20);
    }

    public function getChosenTicket($billid){
        return Ticket::orderby('tk_id')->where('bi_id', '=', $billid)->paginate(20);
    }

}

?>