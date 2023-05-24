<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index(){
        $getAllCategories= Categories::all();
   
        return view('site.categories.index', compact('getAllCategories'));
    }
}
