<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'cus_id',
        'cus_name',
        'cus_phone',
        'cus_gender',
        'cus_email',
        'cus_dob',
        'cus_type',
        'cus_point'
    ];

    public function bill(){
        return $this->hasMany(Bill::class, 'cus_id', 'cus_id');
    }

}
