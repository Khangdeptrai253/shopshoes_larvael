<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'coupon_name','coupon_code','coupon_number','counpon_func','coupon_condition'
    ];
    protected $primaryKey = 'coupon_id';
    protected $table = 'coupon';
}
