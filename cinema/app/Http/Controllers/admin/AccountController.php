<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Account\AccountService;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{
    protected $accountService;

    public function __construct(AccountService $accountService){
        $this->accountService = $accountService;
    }

    public function index(){

        return view('admin.accounts.list',[
            'title' => 'Danh sách tài khoản mới nhất',
            'accounts' => $this->accountService->getAll()
        ]);
    }

    public function destroy(Request $request) : JsonResponse{

        $result = $this->accountService->destroy($request);

        if ($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Tài Khoản'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xóa lỗi vui lòng thử lại'
        ]);
    }
}
