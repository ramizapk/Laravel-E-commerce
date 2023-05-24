<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlistsitems extends Model
{
    use HasFactory;
    protected $table='wishlist_items';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    public function whislist(){
        return $this->belongsTo('App\Models\Wishlists');
    }
}
