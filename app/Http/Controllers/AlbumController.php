<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'user_id' => $request->user_id,
            'albumThumbnail' => $request->file('albumThumbnail')->store("images/albums")
        ]);
        return redirect('/');
    }

    public function show(Album $album){
        $photos = $album->photos()->get();
        return view('contents.albums.show', compact('album', 'photos'));
    }

    public function edit(Album $album){
        $categories = Category::all();
        return view('contents.albums.edit', compact('categories', 'album'));
    }

    public function update(Request $request, Album $album){
        $requestThumbnail = $request->albumThumbnail;
        if($requestThumbnail){
            $thumbnail = $request->file('albumThumbnail')->store("images/albums");
        }else{
            $thumbnail = $album->albumThumbnail;
        }

        $this->deleteImage($album->albumThumbnail);

        $album->update([
            'albumName' => $request->albumName,
            'albumDescription' => $request->albumDescription,
            'slug' => \Str::slug($request->albumName),
            'category_id' => $request->category_id,
            'user_id' => 1,
            'albumThumbnail' => $thumbnail
        ]);

        return redirect('/');
    }

    public function deleteImage(Album $album){
        Storage::delete([$album->albumThumbnail]);
    }

    public function destroy(Album $album){
        $this->deleteImage($album);
        $album->delete();
        return redirect('/');
    }
}
