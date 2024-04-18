<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('dashboard.album.index', compact('user'));
    }

    public function create()
    {
        $user = User::all();
        return view('dashboard.album.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'album_name' => 'required',
            'date_created' => 'required',
            'userId' => 'required',
        ]);

        $album = new Album([
            'album_name' => $request->album_name,
            'description' => $request->description,
            'date_created' => $request->date_created,
            'userId' => $request->userId,
        ]);
        $album->save();
        return redirect('/dashboard/album')->with('success', 'tambah data sukses');
    }

}
