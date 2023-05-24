<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subCategories;

class SubcategoriesController extends Controller
{
    
    public function index($id){
        $result= Subcategories::where('sect_id',$id)->get();
        
        $categoryName=$this->getCategoryName($id);
        $categoryId= $id;
   
        return view('site.subcategories.index', compact('result','categoryName','categoryId'));
       
    }

}
