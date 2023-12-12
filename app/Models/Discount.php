<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'dis_id';
    protected $keyType = 'string';

    protected $fillable = [
        'dis_id',
        'dis_name',
        'dis_start',
        'dis_end',
        'dis_percent'
    ];

    
    public function applydiscount(){
        return $this->hasMany(ApplyDiscount::class, 'dis_id', 'dis_id');
    }
}
