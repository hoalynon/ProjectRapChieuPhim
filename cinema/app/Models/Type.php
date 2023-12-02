<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $primaryKey = 'type_id';
    protected $keyType = 'string';

    protected $fillable = [
        'type_id',
        'type_name',
    ];

    public function choosetype(){
        return $this->hasMany(ChooseType::class, 'type_id', 'type_id');
    }

}
