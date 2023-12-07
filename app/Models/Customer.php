<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
class Customer extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'c_id';
    protected $table = 'customer';
    protected $fillable = ['cus_name','cus_phone','cus_gender','cus_email','cus_dob'];

    public function account()
    {
        return $this->hasOne(Account::class, 'cus_email');
    }
    public function createCus($data)
    {
        return Customer::create($data);
    }
}
