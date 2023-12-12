<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'r_id';
    protected $keyType = 'string';

    protected $fillable = [
        'r_id',
        'r_capacity',
    ];

    public function seat(){
        return $this->hasMany(Seat::class, 'r_id', 'r_id');
    }
}
