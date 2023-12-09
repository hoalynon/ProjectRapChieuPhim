<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use App\Models\Movie;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\Slot;

class Helper{
    public static function customer($customers){
        $html = '';

        foreach($customers as $key => $customer){
                $html .= '
                <tr>
                    <td>' . $customer->cus_id . '</td>
                    <td>' . $customer->cus_name . '</td>
                    <td>' . $customer->cus_phone . '</td>
                    <td>' . $customer->cus_gender . '</td>
                    <td>' . $customer->cus_email . '</td>
                    <td>' . $customer->cus_dob . '</td>
                    <td>' . $customer->cus_type . '</td>
                    <td>' . $customer->cus_point . '</td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow(\'' . $customer->cus_id . '\', \'/admin/customers/destroy\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($customer[$key]);
        }
        return $html;
    }

    public static function account($accounts){
        $html = '';

        foreach($accounts as $key => $account){
                $html .= '
                <tr>
                    <td>' . $account->cus_email . '</td>
                    <td>' . $account->c_role . '</td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow(\'' . $account->cus_email . '\', \'/admin/accounts/destroy\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($account[$key]);
        }
        return $html;
    }

    public static function type($types){
        $html = '';

        foreach($types as $key => $type){
                $html .= '
                <tr>
                    <td>' . $type->type_id . '</td>
                    <td>' . $type->type_name . '</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/types/edit/' . $type->type_id . '" >
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow(\'' . $type->type_id . '\', \'/admin/types/destroy\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($type[$key]);
        }
        return $html;
    }

    public static function movie($movies){
        $html = '';

        foreach($movies as $key => $movie){
                $html .= '
                <tr>
                    <td>' . $movie->mv_id . '</td>
                    <td>' . $movie->mv_name . '</td>
                    <td>' . $movie->mv_start . '</td>
                    <td>' . $movie->mv_end . '</td>
                    <td> <a href="' . $movie->mv_link_poster . '" target="_blank">
                        <img src="' . $movie->mv_link_poster . '" height="40px"
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/movies/edit/' . $movie->mv_id . '" >
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow(\'' . $movie->mv_id . '\', \'/admin/movies/destroy\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($movie[$key]);
        }
        return $html;
    }

    public static function room($rooms){
        $html = '';

        foreach($rooms as $key => $room){
                $html .= '
                <tr>
                    <td>' . $room->r_id . '</td>
                    <td>' . $room->r_capacity . '</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/rooms/edit/' . $room->r_id . '" >
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow(\'' . $room->r_id . '\', \'/admin/rooms/destroy\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($room[$key]);
        }
        return $html;
    }

    public static function seat($seats){
        $html = '';

        foreach($seats as $key => $seat){
                $html .= '
                <tr>
                    <td>' . $seat->st_id . '</td>
                    <td>' . $seat->r_id . '</td>
                    <td>' . $seat->st_type . '</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/seats/edit/' . $seat->st_id . '_' . $seat->r_id . '" >
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow2(\'' . $seat->st_id . '\' , \'' . $seat->r_id . '\', \'/admin/seats/destroy\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($seat[$key]);
        }
        return $html;
    }

    public static function slot($slots){
        $html = '';

        foreach($slots as $key => $slot){
                $movie = Movie::select('mv_name')->where('mv_id', '=', $slot->mv_id)->first()->mv_name;
                $html .= '
                <tr>
                    <td>' . $slot->sl_id . '</td>
                    <td>' . $slot->r_id . '</td>
                    <td>' . $movie . '</td>
                    <td>' . $slot->sl_start . '</td>
                    <td>' . $slot->sl_end . '</td>
                    <td>' . $slot->sl_price . '</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/slots/edit/' . $slot->sl_id . "_" . $slot->r_id .  "_" . $slot->mv_id  . '" >
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow3(\'' . $slot->sl_id .  '\' , \'' . $slot->r_id .  
                            '\' , \'' . $slot->mv_id . '\', \'/admin/slots/destroy\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($slot[$key]);
        }
        return $html;
    }

    public static function discount($discounts){
        $html = '';

        foreach($discounts as $key => $discount){
                $html .= '
                <tr>
                    <td>' . $discount->dis_id . '</td>
                    <td>' . $discount->dis_name. '</td>
                    <td>' . $discount->dis_start . '</td>
                    <td>' . $discount->dis_end. '</td>
                    <td>' . $discount->dis_percent . '</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/discounts/edit/' . $discount->dis_id . '" >
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow(\'' . $discount->dis_id . '\', \'/admin/discounts/destroy\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($discount[$key]);
        }
        return $html;
    }

    public static function bill($bills){
        $html = '';

        foreach($bills as $key => $bill){
                $customer = Customer::select('cus_name')->where('cus_id', '=', $bill->cus_id)->first()->cus_name;

                $html .= '
                <tr>
                    <td>' . $bill->bi_id . '</td>
                    <td>' . $customer . '</td>
                    <td>' . $bill->bi_date . '</td>
                    <td>' . $bill->tk_count . '</td>
                    <td>' . $bill->bi_value . '</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/bills/detail/' . $bill->bi_id . '" >
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($bill[$key]);
        }
        return $html;
    }

    public static function ticket($tickets){
        $html = '';

        foreach($tickets as $key => $ticket){
                $html .= '
                <tr>
                    <td>' . $ticket->tk_id . '</td>
                    <td>' . $ticket->sl_id . '</td>
                    <td>' . $ticket->r_id . '</td>
                    <td>' . $ticket->st_id . '</td>
                    <td>' . $ticket->tk_type . '</td>
                    <td>' . self::active($ticket->tk_available) . '</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/tickets/detail/' . $ticket->tk_id  . '" >
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($ticket[$key]);
        }
        return $html;
    }

    public static function year($years){
        $html = '';

        foreach($years as $key => $year){
                $html .= '
                <tr>
                    <td>' . $year->yre_id . '</td>
                    <td>' . $year->yre_year . '</td>
                    <td>' . $year->yre_count . '</td>
                    <td>' . $year->yre_value . '</td>
                </tr>
                ';

                unset($year[$key]);
        }
        return $html;
    }

    public static function month($months){
        $html = '';

        foreach($months as $key => $month){
                $html .= '
                <tr>
                    <td>' . $month->mre_id . '</td>
                    <td>' . $month->mre_month . '</td>
                    <td>' . $month->mre_yre_id . '</td>
                    <td>' . $month->mre_count . '</td>
                    <td>' . $month->mre_value . '</td>
                </tr>
                ';

                unset($month[$key]);
        }
        return $html;
    }
    

    public static function active($active = 0) : string{
        return $active == 0 ? '<span class="btn btn-danger btn-xs">Không</span>' : 
                                '<span class="btn btn-success btn-xs">Có</span>';
    }

    public static function setseat($sl_id){

        $html = '';
        $count = 0;

        $room = Slot::select('r_id')->where('sl_id','=', $sl_id)->first()->r_id;
        
        $count = 120;
        $html .= '
        <div class="row">';
        for ($i = 1; $i < 13; $i++){
            $tkid = ('A' . strval($i));
            $ticket = Ticket::select('st_id')->where('sl_id', '=', $sl_id)
                                        ->where('st_id', '=', $tkid)
                                        ->where('r_id', '=', $room)
                                        ->first();
            if ($ticket == null){
                $html .= '
                        <label style="cursor: pointer;">
                        <div class="standard" style="top: 252px; left: '. strval($count) .'px; position: absolute; ">
                        <input type="checkbox" name="tickets[]" id="'. $tkid .'" value="'. $tkid .'" onclick="myFunction('. $tkid .')">'. $tkid .'
                        </div>
                    <label>
                ';
            }
            else {
                $html .= '<div class="standard" style="top: 252px; left: '. strval($count) .'px; position: absolute; background-color: #D80032">'. $tkid .'</div>';
            }
            $count += 45;
        }
        $html .= '</div>';


        $count = 120;
        $html .= '
        <div class="row">';
        for ($i = 1; $i < 13; $i++){
            $tkid = ('B' . strval($i));
            $ticket = Ticket::select('st_id')->where('sl_id', '=', $sl_id)
                                        ->where('st_id', '=', $tkid)
                                        ->where('r_id', '=', $room)
                                        ->first();
            if ($ticket == null){
                $html .= '
                        <label style="cursor: pointer;">
                        <div class="standard" style="top: 302px; left: '. strval($count) .'px; position: absolute; ">
                        <input type="checkbox" name="tickets[]" id="'. $tkid .'" value="'. $tkid .'" onclick="myFunction('. $tkid .')">'. $tkid .'
                        </div>
                    <label>
                ';
            }
            else {
                $html .= '<div class="standard" style="top: 302px; left: '. strval($count) .'px; position: absolute; background-color: #D80032">'. $tkid .'</div>';
            }
            $count += 45;
        }
        $html .= '</div>';


        $count = 120;
        $html .= '
        <div class="row">';
        for ($i = 1; $i < 13; $i++){
            $tkid = ('C' . strval($i));
            $ticket = Ticket::select('st_id')->where('sl_id', '=', $sl_id)
                                        ->where('st_id', '=', $tkid)
                                        ->where('r_id', '=', $room)
                                        ->first();
            if ($ticket == null){
                $html .= '
                        <label style="cursor: pointer;">
                        <div class="standard" style="top: 352px; left: '. strval($count) .'px; position: absolute; ">
                        <input type="checkbox" name="tickets[]" id="'. $tkid .'" value="'. $tkid .'" onclick="myFunction('. $tkid .')">'. $tkid .'
                        </div>
                    <label>
                ';
            }
            else {
                $html .= '<div class="standard" style="top: 352px; left: '. strval($count) .'px; position: absolute; background-color: #D80032">'. $tkid .'</div>';
            }
            $count += 45;
        }
        $html .= '</div>';


        $count = 120;
        $html .= '
        <div class="row">';
        for ($i = 1; $i < 13; $i++){
            $tkid = ('D' . strval($i));
            $ticket = Ticket::select('st_id')->where('sl_id', '=', $sl_id)
                                        ->where('st_id', '=', $tkid)
                                        ->where('r_id', '=', $room)
                                        ->first();
            if ($ticket == null){
                $html .= '
                        <label style="cursor: pointer;">
                        <div class="vip" style="top: 402px; left: '. strval($count) .'px; position: absolute; ">
                        <input type="checkbox" name="tickets[]" id="'. $tkid .'" value="'. $tkid .'" onclick="myFunction('. $tkid .')">'. $tkid .'
                        </div>
                    <label>
                ';
            }
            else {
                $html .= '<div class="vip" style="top: 402px; left: '. strval($count) .'px; position: absolute; background-color: #D80032">'. $tkid .'</div>';
            }
            $count += 45;
        }
        $html .= '</div>';


        $count = 120;
        $html .= '
        <div class="row">';
        for ($i = 1; $i < 13; $i++){
            $tkid = ('E' . strval($i));
            $ticket = Ticket::select('st_id')->where('sl_id', '=', $sl_id)
                                        ->where('st_id', '=', $tkid)
                                        ->where('r_id', '=', $room)
                                        ->first();
            if ($ticket == null){
                $html .= '
                        <label style="cursor: pointer;">
                        <div class="vip" style="top: 452px; left: '. strval($count) .'px; position: absolute; ">
                        <input type="checkbox" name="tickets[]" id="'. $tkid .'" value="'. $tkid .'" onclick="myFunction('. $tkid .')">'. $tkid .'
                        </div>
                    <label>
                ';
            }
            else {
                $html .= '<div class="vip" style="top: 452px; left: '. strval($count) .'px; position: absolute; background-color: #D80032">'. $tkid .'</div>';
            }
            $count += 45;
        }
        $html .= '</div>';


        $count = 120;
        $html .= '
        <div class="row">';
        for ($i = 1; $i < 13; $i++){
            $tkid = ('F' . strval($i));
            $ticket = Ticket::select('st_id')->where('sl_id', '=', $sl_id)
                                        ->where('st_id', '=', $tkid)
                                        ->where('r_id', '=', $room)
                                        ->first();
            if ($ticket == null){
                $html .= '
                        <label style="cursor: pointer;">
                        <div class="vip" style="top: 502px; left: '. strval($count) .'px; position: absolute; ">
                        <input type="checkbox" name="tickets[]" id="'. $tkid .'" value="'. $tkid .'" onclick="myFunction('. $tkid .')">'. $tkid .'
                        </div>
                    <label>
                ';
            }
            else {
                $html .= '<div class="vip" style="top: 502px; left: '. strval($count) .'px; position: absolute; background-color: #D80032">'. $tkid .'</div>';
            }
            $count += 45;
        }
        $html .= '</div>';


        $count = 150;
        $html .= '
        <div class="row">';
        for ($i = 1; $i < 7; $i++){
            $tkid = ('G' . strval($i));
            $ticket = Ticket::select('st_id')->where('sl_id', '=', $sl_id)
                                        ->where('st_id', '=', $tkid)
                                        ->where('r_id', '=', $room)
                                        ->first();
            if ($ticket == null){
                $html .= '
                        <label style="cursor: pointer;">
                        <div class="sweetbox" style="top: 552px; left: '. strval($count) .'px; position: absolute; ">
                        <input type="checkbox" name="tickets[]" id="'. $tkid .'" value="'. $tkid .'" onclick="myFunction('. $tkid .')">'. $tkid .'
                        </div>
                    <label>
                ';
            }
            else {
                $html .= '<div class="sweetbox" style="top: 552px; left: '. strval($count) .'px; position: absolute; background-color: #D80032">'. $tkid .'</div>';
            }
            $count += 80;
        }
        $html .= '</div>';

        return $html;
    }
}
