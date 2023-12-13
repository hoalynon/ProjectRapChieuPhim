<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'st_id';
    protected $keyType = 'string';

    protected $fillable = [
        'st_id',
        'r_id',
        'st_type',
    ];

    
    public function room(){
        return $this->hasOne(Room::class, 'r_id', 'r_id');
    }
}
