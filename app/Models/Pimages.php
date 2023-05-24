<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pimages extends Model
{
    use HasFactory;
    protected $table='images';
    protected $fillable=[
        'prod_id',
        'image',
        'thumb',
        
    ];

    public $timestamps = false;
    protected $primaryKey = 'imag_id';

    public function productImages(){
        return $this->belongsTo('App\Models\Products');
    }
}
