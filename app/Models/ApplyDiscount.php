<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyDiscount extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'bi_id';
    protected $keyType = 'string';

    protected $fillable = [
        'dis_id',
        'bi_id',
    ];

    public function discount(){
        return $this->hasOne(Discount::class, 'dis_id', 'dis_id');
    }

    public function bill(){
        return $this->hasOne(Bill::class, 'bi_id', 'bi_id');
    }
}
