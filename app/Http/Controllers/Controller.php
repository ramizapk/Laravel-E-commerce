<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Categories;
use App\Models\Subcategories;
use Error;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $thumbImageWidth=150;
    private $thumbImageHeight=150;

    public function makeImage($imageFile ,$imagePath){
        $imageName=time().Str::random(10). '.' . $imageFile->extension();
        $this->makeThumbImage($imageFile ,public_path($imagePath.'\\thumb\\'), $imageName);
        $imageFile->move(public_path($imagePath),$imageName);
        return $imageName;
    }


    public function makeThumbImage($imageFile ,$imagePath, $imageName){
        $img = Image::make($imageFile->getRealPath());
        $img->resize($this->thumbImageWidth , $this->thumbImageHeight);
        $img->save($imagePath.$imageName , 80);
    }

    public function deleteImage($imagePath ,$imageName){
        $imagePath.='\\';
        try{
        unlink(public_path($imagePath).$imageName);
        unlink(public_path($imagePath.'thumb\\').$imageName);
        }
        catch(Exception $e){}
        try{
            
            unlink(public_path($imagePath.'thumb\\').$imageName);
            }
            catch(Exception $e){}
    }

    public function editImage($oldImageName , $imageFile ,$imagePath){
        $this->deleteImage($imagePath , $oldImageName);
        $newImageName=$this->makeImage($imageFile,$imagePath);
        return $newImageName;



    }


    public function getCategoryName($id){
       
        $name=Categories::find($id)->sect_name;
        return $name;
          
    }

    
    public function getCategoryNameBySub($id){
       
        $catId=Subcategories::find($id)->sect_id;
        $name=Categories::find($catId)->sect_name;
        $x=array($catId ,$name);
        return $x;
          
    }
    public function getSubCategoryName($id){
        $name=Subcategories::find($id)->cate_name;
        return $name;
          
    }
    public function getBrandName($id){
        $name=Brands::find($id)->brand_name;
        return $name;
          
    }
    
}
