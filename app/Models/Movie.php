<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'mv_id';
    protected $keyType = 'string';

    protected $fillable = [
        'mv_id',
        'mv_name',
        'mv_start',
        'mv_end',
        'mv_duration',
        'mv_restrict',
        'mv_cap',
        'mv_link_poster',
        'mv_link_trailer',
        'mv_detail'
    ];

    
    public function choosetype(){
        return $this->hasMany(ChooseType::class, 'mv_id', 'mv_id');
    }

}

?>