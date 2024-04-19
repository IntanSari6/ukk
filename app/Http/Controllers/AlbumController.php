<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $album = Album::where('userId', '=', Auth::user()->userId)->get();
        $user = User::all();
        return view('dashboard.album.index', ['album' => $album]);
    }

    public function create()
    {
        return view('dashboard.album.create');
    }


    public function store(Request $request)
{
    $message = [
        'required' => 'Silahkan isi kolom ini!',
        'unique' => 'Nama album telah digunakan'
    ];

    $validatedData = $request->validate([
        'album_name' => 'unique:albums|required|max:255', 
        'description' => 'required|max:255', 
    ], $message);

    $tanggal = Carbon::now()->toDateTimeString();

    // insert data ke database
    $album = new Album;
    $album->album_name = $validatedData['album_name'];
    $album->description = $validatedData['description'];

    if (Auth::check()) {
        $album->userId = auth()->user()->userId;
    }

    $album->date_created = $tanggal;
    $album->save();

    return redirect('/dashboard/album')->with('success', 'Album baru telah ditambahkan!');
}

    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $albumId)
    {
            $album = Album::where('albumId', $albumId)->first();
        
            // Periksa jika album ditemukan
            if (!$album) {
                abort(404); // Tampilkan halaman 404 jika album tidak ditemukan
            }
        
            return view('/dashboard.album.edit', compact(['album']));
        
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $albumId)
    {
        $tanggal = Carbon::now()->toDateTimeString();
        $album = Album::where('albumId', $albumId)->first();
        $album->album_name = $request->album_name;
        $album->description = $request->description;
        
        if (Auth::check()) {
            $album->userId = auth()->user()->userId;
        }
        
        // Tidak perlu memperbarui tanggal pembuatan
        $album->save();
        
        return redirect('/dashboard/album')->with('success', 'Album telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($albumId)
    {
        Album::destroy($albumId);
        return redirect('/dashboard/album')->with('success','Data Berhasil Dihapus');
    }
}
