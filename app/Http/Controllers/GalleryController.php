<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use App\Models\Album;
use App\Models\Like;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $photo = Photo::join('albums', 'albums.albumId', '=', 'photos.albumId')->get();
        return view('initial-view.home', compact('photo'));
    }
    public function gallery(){
        $album = Album::all();
        return view('initial-view.gallery', compact('album'));
    }
    public function detail(){
        $like = Like::all();
        return view('initial-view.detail-photo', compact('likephoto'));
    }
    
}
