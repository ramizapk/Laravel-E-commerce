<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    
    public function add(){
      $ctegoritesPages="sel";
        return view('admin.categories.add',compact('ctegoritesPages'));
 }

    public function edit($id){
      if(Categories::find($id)){
        $ctegoritesPages="sel";
       $result= Categories::find($id);
       return view('admin.categories.edit', compact('result' ,'ctegoritesPages'));
      
      }

    
    }


public function saveEdit(Request $request){
 if(Categories::find($request->sect_id)){
    $categories= Categories::find($request->sect_id);

    $categories->sect_name=$request->category_name; 
    $categories->sect_description=$request->category_description;
    
    if($request->file('category_image') != null){
      $newImage=$this->editImage($categories->sect_image,$request->file('category_image'),'images\categories');
      $categories->sect_image =$newImage;
      $categories->sect_thumb =$newImage;
    }

    $categories->save();

    return back()->with('add', $categories->sect_name.' Edit done !');
  }

}


 public function storeData(Request $request){

    $validateData = $request->validate([
        'category_name'=>'required',
        'category_image'=>'required',
    ]);

      
      $categoryName=$request->category_name;  //name
      //  $categoryDesc;//desc
      
      if(isset($request->category_description)){
        $categoryDesc=$request->category_description; //desc
      }else{
        $categoryDesc=null;
      }

      $imageName=$this->makeImage($request->file('category_image'), 'images\categories');
    

   

    


      $category= new Categories();
      $category->sect_name =$categoryName;
      $category->sect_description =$categoryDesc;
      $category->sect_image =$imageName;
      $category->sect_thumb =$imageName;
      $category->save();
      return back()->with('add', $category->sect_name.' has been created !');
      
    
}




public function show(){
  $ctegoritesPages="sel";
  $result= Categories::with(['subcategories'])->get();
   
    return view('admin.categories.show', compact('result','ctegoritesPages'));

      
}




//used by Ajax

public function delete($id){
  if(Categories::find($id)){
  $cat = Categories::find($id);
  $this->deleteImage('images\categories',$cat->sect_image);
 $cat->delete();
  return 'done';
  }else{
    return 'not found';
  }
}


public function display($id){
       
  if(Categories::find($id)){
    
    $cat = Categories::find($id);
    $x=0;
    $cat->sect_visible == 0 ? $x=1 : $x=0;
    $cat->sect_visible = $x; 
    $cat->save();


    return 'done';

  }else{
    return 'not found';

  }
    

}

}
