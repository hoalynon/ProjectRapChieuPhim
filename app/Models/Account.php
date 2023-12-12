<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'cus_email',
        'c_pass',
        'c_role'
    ];


    public function customer(){
        return $this->hasOne(Customer::class, 'cus_email', 'cus_email');
    }
}
