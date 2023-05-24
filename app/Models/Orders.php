<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table='orders';
    public $timestamps = false;
    protected $primaryKey = 'order_id';


    public function users(){
       
        return $this->belongsTo(Users::class,'cust_id')->select('cust_id','cust_fname','cust_lname','cust_phone','cust_email');
    }

    
  
}
