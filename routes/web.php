<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\BillController;
use App\Http\Controllers\admin\ChartController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\MainController;
use App\Http\Controllers\admin\MovieController;
use App\Http\Controllers\admin\RevenueController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\SeatController;
use App\Http\Controllers\admin\SlotController;
use App\Http\Controllers\admin\TicketController;
use App\Http\Controllers\admin\TypeController;
use App\Http\Controllers\admin\UploadController;

Route::get('/', [HomeController::class,'getwelcome']);

route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
// route::get('test',[HomeController::class,'test'])->middleware(['auth','admin']);

    Route::prefix('user')->group(function(){
    
        Route::get('/', [App\Http\Controllers\user\MainController::class, 'getmenu']);
    
        Route::get('menu', [App\Http\Controllers\user\MainController::class, 'getmenu']);

        Route::get('film_rc', [App\Http\Controllers\user\MainController::class, 'getfilm_rc']);

        Route::get('film_cm', [App\Http\Controllers\user\MainController::class, 'getfilm_cm']);

        Route::get('film_detail/{movie}', [App\Http\Controllers\user\MainController::class, 'getfilm_detail']);
    
        Route::get('booking/{movie}', [App\Http\Controllers\user\MainController::class, 'getbooking']);
    
        Route::get('login', [App\Http\Controllers\user\MainController::class, 'getlogin']);
    
        Route::get('slots/getdata/{slot}', [App\Http\Controllers\user\MainController::class, 'getSlotData']);
    
        Route::post('invoice', [App\Http\Controllers\user\MainController::class, 'getInvoice'])->name('invoice');
    });


    
Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
        Route::get('/', [MainController::class, 'index'])->name('admin');

    #customer
    Route::prefix('customers')->group(function(){
        Route::get('list', [CustomerController::class, 'index']);
        Route::delete('destroy', [CustomerController::class, 'destroy']);
    });

    #account
    Route::prefix('accounts')->group(function(){
        Route::get('list', [AccountController::class, 'index']);
        Route::delete('destroy', [AccountController::class, 'destroy']);
    });

    #room
    Route::prefix('rooms')->group(function(){
        Route::get('add', [RoomController::class, 'create']);
        Route::post('add', [RoomController::class, 'store']);
        Route::get('list', [RoomController::class, 'index']);
        Route::get('edit/{room}', [RoomController::class, 'show']);
        Route::post('edit/{room}', [RoomController::class, 'update']);
        Route::delete('destroy', [RoomController::class, 'destroy']);
    });

    #seat
    Route::prefix('seats')->group(function(){
        Route::get('add', [SeatController::class, 'create']);
        Route::post('add', [SeatController::class, 'store']);
        Route::get('list', [SeatController::class, 'index']);
        Route::get('edit/{seat}_{room}', [SeatController::class, 'show']);
        Route::post('edit/{seat}_{room}', [SeatController::class, 'update']);
        Route::delete('destroy', [SeatController::class, 'destroy']);
    });

    #type
    Route::prefix('types')->group(function(){
        Route::get('add', [TypeController::class, 'create']);
        Route::post('add', [TypeController::class, 'store']);
        Route::get('list', [TypeController::class, 'index']);
        Route::get('edit/{type}', [TypeController::class, 'show']);
        Route::post('edit/{type}', [TypeController::class, 'update']);
        Route::delete('destroy', [TypeController::class, 'destroy']);
    });

    #movie
    Route::prefix('movies')->group(function(){
        Route::get('add', [MovieController::class, 'create']);
        Route::post('add', [MovieController::class, 'store']);
        Route::get('list', [MovieController::class, 'index']);
        Route::get('edit/{movie}', [MovieController::class, 'show']);
        Route::post('edit/{movie}', [MovieController::class, 'update']);
        Route::delete('destroy', [MovieController::class, 'destroy']);

        Route::post('upload/poster', [UploadController::class, 'storePoster']);
        Route::post('upload/trailer', [UploadController::class, 'storeTrailer']);
    });

    #slot
    Route::prefix('slots')->group(function(){
        Route::get('add', [SlotController::class, 'create']);
        Route::post('add', [SlotController::class, 'store']);
        Route::get('list', [SlotController::class, 'index']);
        Route::get('edit/{slot}_{room}_{movie}', [SlotController::class, 'show']);
        Route::post('edit/{slot}_{room}_{movie}', [SlotController::class, 'update']);
        Route::delete('destroy', [SlotController::class, 'destroy']);
    });

    #discount
    Route::prefix('discounts')->group(function(){
        Route::get('add', [DiscountController::class, 'create']);
        Route::post('add', [DiscountController::class, 'store']);
        Route::get('list', [DiscountController::class, 'index']);
        Route::get('edit/{discount}', [DiscountController::class, 'show']);
        Route::post('edit/{discount}', [DiscountController::class, 'update']);
        Route::delete('destroy', [DiscountController::class, 'destroy']);
    });

    #bill
    Route::prefix('bills')->group(function(){
        Route::get('list', [BillController::class, 'index']);
        Route::get('detail/{bill}', [BillController::class, 'show']);
    });

      #ticket
    Route::prefix('tickets')->group(function(){
        Route::get('list', [TicketController::class, 'index']);
        Route::get('detail/{ticket}', [TicketController::class, 'show']);
    });

    #revenue
    Route::prefix('revenue')->group(function(){
        //Route::get('year', [RevenueController::class, 'yearindex']);
        //Route::get('month', [RevenueController::class, 'monthindex']);
        Route::get('year', [ChartController::class, 'LineChartYear']);
        Route::get('month', [ChartController::class, 'LineChartMonth']);
    });

});




Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

// verify email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//The Email Verification Handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//Resending The Verification Email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

require __DIR__.'/auth.php';