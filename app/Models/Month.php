<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'mre_id';
    protected $keyType = 'string';

    protected $fillable = [
        'mre_id',
        'mre_year',
        'mre_yre_id',
        'mre_count',
        'mre_value',
    ];

    public function year(){
        return $this->hasOne(Year::class, 'yre_id', 'mre_yre_id');
    }
}
