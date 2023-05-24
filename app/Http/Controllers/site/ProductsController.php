<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productcatrgories;
use App\Models\Products;

class ProductsController extends Controller
{
    public function getProductByCategory($categoryId){

      
        $result=Products::where('sect_id', $categoryId)->get();
        $pageName=$this->getCategoryName($categoryId);
        $linkName=array("All Categories",$pageName,'All Products');
        $linkUrl=array('/categories/all', '/categories/'.$categoryId , '/categories/'.$categoryId.'/products/all');
      
        return view('site.products.index', compact('result','linkName','linkUrl','pageName'));
       
    }

   

    public function getProductBySubCategory($categoryId){
        
        $r=Productcatrgories::where('cate_id', $categoryId)->pluck('prod_id')->toArray();
        $result=Products::find($r);

        $pageName=$this->getSubCategoryName($categoryId);
        $x=$this->getCategoryNameBySub($categoryId);
        $linkName=array("All Categories" , $x[1] , $pageName  );
        $linkUrl=array('/categories/all' , '/categories/'.$x[0] , '/categories/'.$categoryId.'/products' );
        
      
        return view('site.products.index', compact('result','linkName','linkUrl','pageName'));
        // var_dump($result);
    }


    public function getProductByBrand($brandId){

       
        $result=Products::where('brand_id', $brandId)->get();
        $pageName=$this->getBrandName($brandId);
        $linkName=array('Brands','Products');
        $linkUrl=array('#','#');

        
      
        return view('site.products.index', compact('result','linkName','linkUrl','pageName'));
     
    }

    public function getAllProducts(){

       
        $result=Products::all();
        $pageName="All Products";
        $linkName=array('All Products');
        $linkUrl=array('allproducts');
        
      
        return view('site.products.index', compact('result','linkName','linkUrl','pageName'));
     
    }



    public function getProductInfo($id){
        $result=Products::with(['productImages'])->find($id);
        return view('site.productpage.index',compact('result'));
    }


}
