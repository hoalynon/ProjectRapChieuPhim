<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChooseType extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'type_id';
    protected $keyType = 'string';

    protected $fillable = [
        'type_id',
        'mv_id',
    ];

    public function type(){
        return $this->hasOne(Type::class, 'type_id', 'type_id');
    }

    public function movie(){
        return $this->hasOne(Movie::class, 'mv_id', 'mv_id');
    }
}
