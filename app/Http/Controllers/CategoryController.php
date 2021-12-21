<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('contents.categories.index', compact('categories'));
    }

    public function show(Category $category){
        $albums = $category->albums()->get();
        return view('contents.categories.show', compact('category', 'albums'));
    }
}
