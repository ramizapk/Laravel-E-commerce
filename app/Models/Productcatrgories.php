<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productcatrgories extends Model
{
    use HasFactory;
    protected $table='product_categories';
    protected $fillable=[
        'prod_id',
        'cate_id',
    ];
    public $timestamps = false;
    protected $primaryKey = 'prod_cat_id';



}
