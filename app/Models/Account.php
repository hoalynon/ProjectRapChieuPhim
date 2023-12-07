<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Customer;
class Account extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='account';
    protected $primaryKey = 'cus_email';
    protected $fillable = ['cus_email', 'c_pass', 'c_role'];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'cus_email');
    }
    public function createAcc($data)
    {
        return Account::create($data);
    }
}
