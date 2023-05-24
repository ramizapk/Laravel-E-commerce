<?php

namespace App\Models;

use Faker\Provider\ar_EG\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table='customers';
    public $timestamps = false;
    protected $primaryKey = 'cust_id';



    public function cart(){
        return $this->hasOne(Cart::class,'cust_id')->select('cart_id','cust_id');
    }


    public function addresses(){
        return $this->hasMany(Addresses::class,'cust_id')->select('country','city','state','zip','add1','add2','cust_id','addr_id');
    }

    public function transaction(){
        return $this->hasMany(transaction::class,'cust_id')->select('transaction_id','invoiceId','cust_id');
    }


}
