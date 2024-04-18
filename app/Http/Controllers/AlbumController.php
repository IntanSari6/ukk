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
        $user = User::all();
        $album = Album::all();
        return view('dashboard.album.index', ['album' => $album]);
    }

    public function create()
    {
        return view('dashboard.album.create');
    }


    public function store(Request $request)
    {
        // dd($request);
        $message = [
            'required' => 'Silahkan isi kolom ini!'
        ];
        $validatedData = $request->validate([
            'album_name' => 'required|max:255', 
            'description' => 'required|max:255', 
        ],$message
        
    );
    $tanggal = Carbon::now()->toDateTimeString();
        
        // insert data ke database
        $album = new Album;
        $album->album_name = $validatedData['album_name'];
        $album->description = $validatedData['description'];
        if(Auth::check()){
        $album->userId = $validatedData['userId'] = auth()->user()->userId;
        }
        $album->date_created = $tanggal;
        $album->save();
        

        return redirect('/dashboard/album')->with('success', 'Kategori baru telah ditambahkan!');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
