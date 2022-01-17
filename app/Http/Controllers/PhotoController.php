<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request){
        $attr = $request->all();
        $attr['slug'] = \Str::slug($attr['photoTitle']);
        $attr['photoPhoto'] = $request->file('photoPhoto')->store("images/photos");
        Photo::create($attr);
        return back();
    }
}
