<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table='sections';
    protected $fillable=[
        'sect_name',
        'sect_description',
        'sect_image',
        'sect_thumb',
    ];

    public $timestamps = false;
    protected $primaryKey = 'sect_id';


    public function subcategories(){
       
        return $this->hasMany(Subcategories::class,'sect_id')->select('sect_id');
    }

    public function products(){
        return $this->belongsTo('App\Models\Products');
    }
}

