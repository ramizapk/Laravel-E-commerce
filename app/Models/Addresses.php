<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use HasFactory;
    protected $table='addresses';
    public $timestamps = false;
    protected $primaryKey = 'addr_id';

    public function users(){
        return $this->belongsTo('App\Models\Users');
    }
}
