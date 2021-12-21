<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Category;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    //sebagai view tampilan
    public function create(){
        $categories = Category::all();
        return view('contents.albums.create', compact('categories'));
    }

    //sebagai function pengirim ke database
    public function store(Request $request){
        Album::create([
            'albumName' => $request->albumName,
            'albumDescription' => $request->albumDescription,
            'slug' => \Str::slug($request->albumName),
            'category_id' => $request->category_id,
            'user_id' => 1,
            'albumThumbnail' => $request->file('albumThumbnail')->store("images/albums")
        ]);
        return redirect('/');
    }
}
