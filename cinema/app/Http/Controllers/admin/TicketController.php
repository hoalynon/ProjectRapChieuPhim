<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function __construct(){
    }

    public function index(){
        return view('admin.tickets.list',[
            'title' => 'Danh sách vé xem phim mới nhất',
            'tickets' => Ticket::orderbyDesc('tk_id')
                                ->orderby('sl_id')
                                ->orderby('st_id')
                                ->paginate(20)
        ]);
    }

    public function show(Ticket $ticket){

        return view('admin.tickets.detail', [
            'title' => 'Chi tiết vé: ' . $ticket->tk_id,
            'ticket' => $ticket
        ]);
    }
}
