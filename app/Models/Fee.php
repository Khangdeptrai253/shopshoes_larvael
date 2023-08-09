<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'fee_maqh','fee_matp','fee_maxaptt','fee_ship'
    ];
    protected $primaryKey = 'fee_id';
    protected $table = 'tbl_fee';
    public function City(){
        return $this->belongsTo('App\Models\City','fee_matp');
    }
    public function Province(){
        return $this->belongsTo('App\Models\Province','fee_maqh');
    }
    public function Wards(){
        return $this->belongsTo('App\Models\Wards','fee_maxaptt');
    }
}
