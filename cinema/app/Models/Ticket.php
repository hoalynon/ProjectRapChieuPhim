<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'tk_id';
    protected $keyType = 'string';

    protected $fillable = [
        'tk_id',
        'mv_id',
        'sl_id',
        'r_id',
        'tk_value',
        'st_id',
        'tk_type',
        'bi_id',
        'tk_available'
    ];

    public function slot(){
        return $this->hasOne(Slot::class, 'sl_id', 'sl_id');
    }

    public function seat(){
        return $this->hasOne(Seat::class, 'st_id', 'st_id');
    }

    public function bill(){
        return $this->hasOne(Bill::class, 'bi_id', 'bi_id');
    }
}
