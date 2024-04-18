<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Album;

class PhotoDataController extends Controller
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
        $photo = Photo::all();
        return view('dashboard.photo-data.index', ['photo' => $photo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $album = Album::get();
        $photo = Photo::all();
        return view ('dashboard.photo-data.create', compact('album', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $massages = [
            'required' => 'Silahkan isi kolom ini !',
            'max' => 'Tidak boleh lebih dari 100 karakter',
            'image' => 'Anda hanya dapat menambahkan gambar',
        ];

        $request->validate([
            'photo_title' => 'required|max:255',
            'photo_description' => 'required|max:255',
            'file_location' => 'image|required',
            'albumId' => 'required', 
        ], $massages);
        $tanggal = Carbon::now()->toDateTimeString();
        $photo = new Photo;
        $photo->photo_title = $request->photo_title;
        $photo->photo_description = $request->photo_description;
        $photo->file_location = $request->file_location;
        $photo->upload_date = $tanggal;
        $photo->albumId = $request->albumId;
        $photo['userId'] = auth()->user()->userId;

        if ($request->hasFile('file_location')) {
            $files = $request->file('file_location');
            $path = storage_path('app/public');
            $files_name = 'public' . '/' . date('Ymd') . '-' .
            $files->getClientOriginalName();
            $files->storeAs('public', $files_name);
            $photo->file_location = $files_name;
        }

        $photo->save();

        return redirect('/dashboard/photo-data')->with('success', 'tambah data sukses!!');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $photo = PhotoData::whereId($id)->first();
        return view('show', compact(['photo']));
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
