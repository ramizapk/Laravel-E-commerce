<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class SearchControlller extends Controller
{
    public function search($name){
     $product =Products::where('prod_name', 'LIKE', '%'.$name.'%')->limit(10)->orderBy('prod_id', 'DESC')->get();
     if($product){
      
      return response()->json($product);
     }else{
         return 'notFound';
     }
    }
}
