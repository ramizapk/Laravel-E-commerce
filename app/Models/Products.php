<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'sect_id',
        'brand_id',
        'prod_name',
        'prod_description',
        'prod_price',
        'prod_max_no',
        'prod_image',
        'prod_thumb',
    ];

    public $timestamps = false;
    protected $primaryKey = 'prod_id';
 

    public function brands(){
        return $this->hasOne(Brands::class,'brand_id','brand_id')->select('brand_name','brand_id');

    }

    public function category(){
        return $this->hasone(Categories::class,'sect_id','sect_id')->select('sect_id','sect_name');
    }

    public function productCatrgories(){
        // return $this->hasOne(Productcatrgories::class,'prod_id')->select('prod_id','cate_id');
        return $this->belongsTo('App\Models\Productcatrgories');
    }

    public function productImages(){
        return $this->hasMany(Pimages::class,'prod_id')->select('prod_id','image','thumb','imag_id');
    }

 



}
