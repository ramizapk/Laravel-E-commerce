<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subCategories;
use App\Models\Categories;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class SubcategoriesController extends Controller
{


    
    public function show($id)
    {
      $ctegoritesPages="sel";
        $result= Subcategories::where('sect_id',$id)->get();
        if(count($result) >0){
         
         return view('admin.subcategories.show', compact('result','ctegoritesPages'));
        }else{
           return redirect()->route('admin.categories.show');
          
        }  
    }


    public function add($id){
      $ctegoritesPages="sel";
          $cat=Categories::find($id);
         $sect_id=$cat->sect_id;
          
         return view('admin.subcategories.add' , compact('sect_id','ctegoritesPages'));
    }


    public function storeData(Request $request){

        
        $validateData = $request->validate([
            'sub_category_name'=>'required',
            'sub_category_image'=>'required|image',
            
        ]);

        
      


        $imageName=$this->makeImage($request->file('sub_category_image'), 'images\subcategories');

        if(isset($request->sub_category_description)){
          $categoryDesc=$request->sub_category_description; //desc
        }else{
          $categoryDesc=null;
        }
        
        Subcategories::insert([
            'sect_id'=>$request->sect_id,
          'cate_name'=>$request->sub_category_name,
          'cate_description'=>$categoryDesc,
          'cate_image'=>$imageName,
          'cate_thumb'=>$imageName
        ]);
       
        return back()->with('add', $request->sub_category_name.' has been created !');

    }


    public function edit($id){
      if(Subcategories::find($id)){
        $ctegoritesPages="sel";
       $result= Subcategories::find($id);
       return view('admin.subcategories.edit', compact('result' ,'ctegoritesPages'));
      
      }

    
    }

    public function saveEdit(Request $request){
      if(Subcategories::find($request->cate_id)){
         $sub= Subcategories::find($request->cate_id);
     
         $sub->cate_name=$request->sub_category_name; 
         $sub->cate_description=$request->sub_category_description;
         
         if($request->file('sub_category_image') != null){
           $newImage=$this->editImage($sub->cate_image,$request->file('sub_category_image'),'images\subcategories');
           $sub->cate_image =$newImage;
           $sub->cate_thumb =$newImage;
         }
     
         $sub->save();
     
         return back()->with('add', $sub->cate_name.' Edit done !');
       }
     
     }





    //used by Ajax

    public function ajaxGetSubById($id){
      $result= Subcategories::where('sect_id',$id)->get();

      return response()->json($result);
    }





    public function delete($id){
      if(Subcategories::find($id)){
      $sub = Subcategories::find($id);

     $this->deleteImage('images\subcategories',$sub->cate_image);

     $sub->delete();
      return 'done';
      }else{
        return 'not found';
      }
    }


    public function display($id){
       
      if(subCategories::find($id)){
        
        $sub = subCategories::find($id);
        $x=0;
        $sub->cate_visible == 0 ? $x=1 : $x=0;
        $sub->cate_visible = $x; 
        $sub->save();
    

        return 'done';

      }else{
        return 'not found';

      }
        

    }

}
