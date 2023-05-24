<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;








class BrandsController extends Controller
{

 
      public function add(){
        $brandsPages='sel';
             return view('admin.brands.add',compact('brandsPages'));
      }

      public function edit($id){
        if(Brands::find($id)){
        $brandsPages='sel';
        $result= brands::find($id);
        return view('admin.brands.edit', compact('result' ,'brandsPages'));
        
      }
  
          
    }


    public function saveEdit(Request $request){
      if(Brands::find($request->brand_id)){
        $brand= brands::find($request->brand_id);

        $brand->brand_name=$request->brand_name; 

        
        if($request->file('brand_image') != null){
           $newImage=$this->editImage($brand->brand_image,$request->file('brand_image'),'images\brands');
           $brand->brand_image =$newImage;
           $brand->brand_thumb =$newImage;
        }

         $brand->save();

         return back()->with('add', $brand->brand_name.' Edit done !');
      }

    }



      public function storeData(Request $request){

        $validateData = $request->validate([
            'brand_name'=>'required|alpha',
            'brand_image'=>'required'
        ]);

          
          $brandsName=$request->brand_name; 
        

        $imageName=$this->makeImage($request->file('brand_image'), 'images\brands');

         
          
        

       

        


          $brand= new Brands();
          $brand->brand_name =$brandsName;
          $brand->brand_image =$imageName;
          $brand->brand_thumb =$imageName;
          $brand->save();
          return back()->with('add', $brand->brand_name.' has been created !');
          
        
 }

      public function show(){
        $brandsPages='sel';
        $result= brands::all();
        return view('admin.brands.show', compact('result' ,'brandsPages'));
  
          
    }

  //used by Ajax

    public function delete($id){
      if(Brands::find($id)){
      $brand = Brands::find($id);
      
  
     $this->deleteImage('images\brands',$brand->brand_image);
     $brand->delete();
      return 'done';
      }else{
        return 'not found';
      }
    }

    public function display($id){
       
      if(Brands::find($id)){
        
        $brand = Brands::find($id);
        $x=0;
        $brand->brand_visible == 0 ? $x=1 : $x=0;
        $brand->brand_visible = $x; 
        $brand->save();
    

        return 'done';

      }else{
        return 'not found';

      }
        

    }
}
