<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $primaryKey = 'sl_id';
    protected $keyType = 'string';

    protected $fillable = [
        'sl_id',
        'r_id',
        'mv_id',
        'mv_duration',
        'sl_start',
        'sl_end',
        'sl_price'
    ];

    
    public function room(){
        return $this->hasOne(Room::class, 'r_id', 'r_id');
    }

    public function movie(){
        return $this->hasOne(Movie::class, 'mv_id', 'mv_id');
    }
}
