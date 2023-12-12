<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'yre_id';
    protected $keyType = 'string';

    protected $fillable = [
        'yre_id',
        'yre_year',
        'yre_count',
        'yre_value',
    ];

    public function month(){
        return $this->hasMany(Month::class, 'mre_yre_id', 'yre_id');
    }
}
