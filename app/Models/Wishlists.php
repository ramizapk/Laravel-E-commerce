<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    use HasFactory;
    protected $table='wishlists';
    public $timestamps = false;
    protected $primaryKey = 'wish_id';


    
    public function wishlistItems(){
        return $this->hasMany(Wishlistsitems::class,'wish_id')->select('wish_id','prod_id');
    }
}
