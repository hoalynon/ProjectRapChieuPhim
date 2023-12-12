<?php

use Illuminate\Support\Facades\Route;
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

Route::prefix('admin')->group(function(){
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

Route::prefix('user')->group(function(){
    
    Route::get('/', [App\Http\Controllers\user\MainController::class, 'getmenu']);

    Route::get('menu', [App\Http\Controllers\user\MainController::class, 'getmenu']);

    Route::get('booking/{movie}', [App\Http\Controllers\user\MainController::class, 'getbooking']);

    Route::get('login', [App\Http\Controllers\user\MainController::class, 'getlogin']);

    Route::get('slots/getdata/{slot}', [App\Http\Controllers\user\MainController::class, 'getSlotData']);

    Route::post('invoice', [App\Http\Controllers\user\MainController::class, 'getInvoice']);
});


?>