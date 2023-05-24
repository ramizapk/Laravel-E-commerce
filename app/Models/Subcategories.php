<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $fillable=[
        'sect_id',
        'cate_name',
        'cate_description',
        'cate_image',
        'cate_thumb',
    ];
    protected $primaryKey = 'cate_id';

    public $timestamps = false;


    public function categories(){
        return $this->belongsTo('App\Models\Categories');
    }
}
