<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Brands;

class indexController extends Controller
{
    public function getLastCategories(){
        $lastCategories= Categories::limit(10)->orderBy('sect_id', 'DESC')->get();
   
        return $lastCategories;
    }

    public function getLastProducts(){
        $lastProducts= Products::limit(12)->orderBy('prod_id', 'DESC')->get();
   
        return $lastProducts;
    }

    public function getLastAllProducts(){
        $allProducts= Products::all();
   
        return $allProducts;
    }

    public function getLastBrands(){
        $lastBrands= Brands::orderBy('brand_id', 'DESC')->get();
   
        return $lastBrands;
    }

    public function index(){
        $lastCategories=$this->getLastCategories();
        $lastProducts=$this->getLastProducts();
        $allProducts=$this->getLastAllProducts();
        $lastBrands=$this->getLastBrands();
        return view('site.index.index', compact('lastCategories' ,'lastProducts' , 'allProducts','lastBrands'));

    }



}
