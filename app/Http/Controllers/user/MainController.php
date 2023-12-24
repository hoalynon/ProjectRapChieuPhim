<?php

namespace App\Http\Controllers\user;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slot;
use App\Models\Movie;
use App\Models\ChooseType;
use App\Models\Type;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function getmenu(){
        return view('user.menu', [
            'title' => 'Trang chủ đặt vé phim',
            'movies_rc' => Movie::orderby('mv_start')
                            ->where('mv_start', '<=', Carbon::now('Asia/Ho_Chi_Minh'))
                            ->where('mv_end', '>=', Carbon::now('Asia/Ho_Chi_Minh'))
                            ->paginate(8),
            'movies_cm' => Movie::orderby('mv_start')
            ->whereDate('mv_start', '>', Carbon::now('Asia/Ho_Chi_Minh'))
            ->paginate(8)
        ]);
    }

    public function getfilm_rc(){
        return view('user.film_rc', [
            'title' => 'Phim đang chiếu',
            'movies' => Movie::orderby('mv_start')
                            ->where('mv_start', '<=', Carbon::now('Asia/Ho_Chi_Minh'))
                            ->where('mv_end', '>=', Carbon::now('Asia/Ho_Chi_Minh'))
                            ->paginate(8),
        ]);
    }

    public function getfilm_cm(){
        return view('user.film_cm', [
            'title' => 'Phim sắp chiếu',
            'movies' => Movie::orderby('mv_start')
                            ->whereDate('mv_start', '>', Carbon::now('Asia/Ho_Chi_Minh'))
                            ->paginate(8),
        ]);
    }

    public function getfilm_detail(Movie $movie){
        return view('user.film_detail', [
            'title' => 'Chi tiết phim',
            'movie' => $movie,
            'types' => ChooseType::join('Types','Types.type_id','=','Choose_Types.type_id')
                                ->where('Choose_Types.mv_id', '=', $movie->mv_id)
                                ->get(['Types.type_name'])
        ]);
    }

    public function getbooking(Movie $movie){
        //dd(Carbon::now('Asia/Ho_Chi_Minh'));
        return view('user.booking', [
            'title' => 'Đặt vé',
            'slots' => Slot::orderby('sl_start')
                            ->where('mv_id', '=', $movie->mv_id)
                            ->where('sl_start', '>=', Carbon::now('Asia/Ho_Chi_Minh'))
                            ->paginate(20),
            'movie' => $movie
        ]);
    }

    public function getlogin(){
        return view('user.login', [
            'title' => 'Đăng nhập'
        ]);
    }

    public function getSlotData(Slot $slot){
        
        return response()->json([
            'slot' => $slot,
            'allseat' => \App\Helpers\Helper::setseat($slot->sl_id)
        ]) ;
    }

    public function getInvoice(Request $request){
        $seats = $request->input("tickets");
        $slot = $request->input("slot");
        $room = $request->input("room");
        $movieid = $request->input("movieid");
        $movie = Movie::where('mv_id', '=', $movieid)->first();
        $totalpay = (float)$request->input("totalpay");
        $count = sizeof($seats);
        
        $check = true;
        if ($seats == null){
            Session::flash('error', 'Vui lòng chọn ghế trước khi thanh toán');
            return redirect()->back();
        }
        foreach ($seats as $seat){

            switch($seat){
                case "A2":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','A1')->first() == null
                        && !($this->checkSeat($seats, "A1")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng A1');
                            return redirect()->back();
                        }
                    break;
                case "B2":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','B1')->first() == null
                            && !($this->checkSeat($seats, "B1")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng B1');
                            return redirect()->back();
                        }
                    break;
                case "C2":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','C1')->first() == null
                        && !($this->checkSeat($seats, "C1")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng C1');
                            return redirect()->back();
                        }
                    break;
                case "D2":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','D1')->first() == null
                        && !($this->checkSeat($seats, "D1")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng D1');
                            return redirect()->back();
                        }
                    break;
                case "E2":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','E1')->first() == null
                        && !($this->checkSeat($seats, "E1")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng E1');
                            return redirect()->back();
                        }
                    break;
                case "F2":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','F1')->first() == null
                        && !($this->checkSeat($seats, "F1")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng F1');
                            return redirect()->back();
                        }
                    break;
                case "A11":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','A12')->first() == null
                        && !($this->checkSeat($seats, "A12")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng A12');
                            return redirect()->back();
                        }
                    break;
                case "B11":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','B12')->first() == null
                            && !($this->checkSeat($seats, "B12")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng B12');
                            return redirect()->back();
                        }
                    break;
                case "C11":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','C12')->first() == null
                        && !($this->checkSeat($seats, "C12")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng C12');
                            return redirect()->back();
                        }
                    break;
                case "D11":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','D12')->first() == null
                        && !($this->checkSeat($seats, "D12")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng D12');
                            return redirect()->back();
                        }
                    break;
                case "E11":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','E12')->first() == null
                        && !($this->checkSeat($seats, "E12")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng E12');
                            return redirect()->back();
                        }
                    break;
                case "F11":
                    if (Ticket::where('sl_id', '=', $slot)->where('st_id','=','F12')->first() == null
                        && !($this->checkSeat($seats, "F12")))
                        {
                            Session::flash('error', 'Không được để trống ghế trong cùng F12');
                            return redirect()->back();
                        }
                    break;
            }
        }
        // Session::flash('success', 'Các vé đều hợp lệ');
        // dd($seats);

        return view('user.invoice')->with('seats', $seats)
                                   ->with('slot', $slot)
                                   ->with('room', $room)
                                   ->with('movie', $movie)
                                   ->with('totalpay', $totalpay)
                                   ->with('count', $count);
    }

    public function checkSeat($arrayseat, $seat){
        foreach ($arrayseat as $checkseat){
            if ($checkseat == $seat)
                return true;
        }
        return false;
    }

    public function getInfo(){

        $user = User::where('cus_name', '=', Auth::user()->cus_name)->first();
        $email = $user->email;
        $bills = Bill::where('email','=',$email)->orderBy('Bills.bi_date', 'desc')->get();
        $tickets = Ticket::join('Bills','Bills.bi_id','=','Tickets.bi_id')
                                ->join('Movies','Movies.mv_id','=','Tickets.mv_id')
                                ->where('Bills.email', '=', $email)
                                ->orderBy('Bills.bi_date', 'desc')
                                ->get();
        return view('user.info', [
            'title' => 'Thông tin cá nhân',
            'user' => $user,
            'bills' => $bills,
            'tickets' => $tickets
        ]);
    }

    public function postInfo(Request $request){
        $user = User::where('email','=', (String) $request->input('email'))->first();

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'birth' => 'required',
            'gender' => 'required'
        ]);

        $user->cus_name = (String) $request->input('name');
        $user->cus_dob = $request->input('birth');
        $user->cus_phone = (String) $request->input('phone');
        $user->cus_gender = (String) $request->input('gender');
        $user->save();

         return redirect('/user/info');
    }
    
}

?>