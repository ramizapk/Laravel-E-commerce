<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatItems extends Model
{
    use HasFactory;
    protected $table='cart_items';
    protected $fillable=[
        'cart_id',
        'prod_id',
        'quantity',
        'description',
        'state',
    ];

    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    public function cart(){
        return $this->belongsTo('App\Models\Cart');
    }


    
    public function products(){
        return $this->hasMany(Products::class,'prod_id')->select('prod_id','prod_price','prod_max_no','prod_name','prod_image');
    }


   
}
