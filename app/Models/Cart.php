<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table='carts';
    protected $fillable=[
        'cust_id'
    ];

    public $timestamps = false;
    protected $primaryKey = 'cart_id';

    public function users(){
        return $this->belongsTo('App\Models\Users');
    }

    public function cartItems(){
        return $this->hasMany(cartItems::class,'cart_id')->select('cart_id','prod_id','quantity','description','state');
    }

}
