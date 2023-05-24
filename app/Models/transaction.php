<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $table='transaction';
    public $timestamps = false;
    protected $primaryKey = 'transaction_id';


    public function users(){
        return $this->belongsTo('App\Models\Users');
    }
}
