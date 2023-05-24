<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Productcatrgories;
use App\Models\Categories;
use App\Models\Pimages;



class ProductsController extends Controller
{
    public function add(){
      $productsPages='sel';
          $brandsList=Brands::all();
          $categoriesList=Categories::all();
        return view('admin.products.add',compact(['brandsList','categoriesList'] ,'productsPages'));
 }

    public function show(){
      $productsPages='sel';
        $result= Products::with(['brands','category'])->get();
        return view('admin.products.show', compact('result','productsPages'));
       
         
    }


    public function storeData(Request $request){

        
        $validateData = $request->validate([
            'p_name'=>'required',
            'p_price'=>'required|numeric',
            'p_main_img'=>'required|image',
            'p_max_count'=>'required|integer',
            'p_section'=>'required',
            'p_brand'=>'required|integer',
            'p_desc'=>'required'
        ]);

        
        

        $imageName=$this->makeImage($request->file('p_main_img'), 'images\products');

        //checkbox list 
       
        

        //product model 
        $product= new Products();
        $product->prod_name =$request->p_name;
        $product->prod_price =$request->p_price;
        $product->prod_image =$imageName;
        $product->prod_thumb =$imageName;
        $product->prod_max_no =$request->p_max_count;
        $product->sect_id =$request->p_section;
        // $product->brand_id =$request->p_brand;
        $request->p_brand == 0 ? $product->brand_id=null : $product->brand_id=$request->p_brand;
        $product->prod_description =$request->p_desc;
        
        $product->save();
      

        $productId = $product->prod_id;
           
        

     //insert into sub category
      
            if($request->cate_id){
           
              $list= new Productcatrgories();
              $list->cate_id =$request->cate_id;
              $product->productCatrgories()->save($list);
        
            }

        //insert into images 

        for($i=1; $i<=4; $i++){
            $images= new Pimages();

            if($request->file('p_img'.$i) != null){
              $imageName=$this->makeImage($request->file('p_img'.$i), 'images\pimages');
                $images->image =$imageName;
                $images->thumb =$imageName;
                $product->productImages()->save($images);
            }
        }
           
            

            
            
        
           
            
       
       
        return back()->with('add', $product->prod_name.' has been created !');

    }

    public function edit($id){
      if(Products::find($id)){
      $productsPages='sel';
      $result= Products::with(['productImages'])->find($id);
      $brandsList=Brands::all();
      $categoriesList=Categories::all();
      return view('admin.products.edit', compact(['brandsList','categoriesList','result'] ,'productsPages'));
      
    }
  }

  public function saveEdit(Request $request){

    if(Products::find($request->prod_id)){

             $product=Products::find($request->prod_id);

             $product->prod_name =$request->p_name;

             $product->prod_price =$request->p_price;

          
             $product->prod_max_no =$request->p_max_count;

              $product->sect_id =$request->p_section;

              $request->p_brand == 0 ? $product->brand_id=null : $product->brand_id=$request->p_brand;
              $product->prod_description =$request->p_desc;

              if($request->file('p_main_img') != null){
                    $newImage=$this->editImage($product->prod_image,$request->file('p_main_img'),'images\products');
                  $product->prod_image =$newImage;
                $product->prod_thumb =$newImage;
            }
          
            $product->save();
      

            $productId = $product->prod_id;


            if($request->cate_id){

              if(Productcatrgories::where('prod_id', $productId)->get()){
                Productcatrgories::where('prod_id', $productId)->update(['cate_id' => $request->cate_id]);
              }else{
                $list= new Productcatrgories();
                $list->cate_id =$request->cate_id;
                $product->productCatrgories()->save($list);
              }
              
            
        
            }

            //if edit images
            if(Pimages::where('prod_id', $productId)->get()){

              $images= Pimages::where('prod_id',$productId)->get();

                foreach($images as $key => $img){

                  if($request->file('ep_img'.$img->imag_id) != null){

                    $new =Pimages::find($img->imag_id);

                    $newImage=$this->editImage($img->image,$request->file('ep_img'.$img->imag_id),'images\pimages');
                    $new->image =$newImage;
                    $new->thumb =$newImage;
                    $product->productImages()->save($new);



                }
              }
            }
           //if add new images

          
            for($i=1; $i<=4; $i++){
              $images= new Pimages();

              if($request->file('ap_img'.$i) != null){
                
                $imageName=$this->makeImage($request->file('ap_img'.$i), 'images\pimages');
                  $images->image =$imageName;
                  $images->thumb =$imageName;
                  $product->productImages()->save($images);
              }
          }
            
         
          
     
     
           return back()->with('add', $product->prod_name.' Edit done !');




    }
  }
    
    public function delete($id){
      if(Products::find($id)){
      $product = Products::find($id);
      $this->deleteImage('images\products',$product->prod_image);
     
     $product->delete();
      return 'done';
      }else{
        return 'not found';
      }
    }


    public function display($id){
       
      if(Products::find($id)){
        
        $product = Products::find($id);
        $x=0;
        $product->prod_visible == 0 ? $x=1 : $x=0;
        $product->prod_visible = $x; 
        $product->save();
    

        return 'done';

      }else{
        return 'not found';

      }
        

    }
}
