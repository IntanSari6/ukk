<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Album;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class PhotoDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo = Photo::join('albums', 'albums.albumId', '=', 'photos.albumId')
                   ->where('photos.userId', '=', Auth::user()->userId)
                   ->get();
                //    dd($photo);
        $user = User::all();
        $album = Album::all();
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
        $photo = Photo::where('photoId',$id)->first();
        $like = Like::where('photoId', $id)->count();
        return view('initial-view.detail-photo', compact(['photo', 'like']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $photoId)
    {
        $photo = Photo::where('photoId', $photoId)->first();
        $user = User::all();
        $album = Album::get();
        
        // Periksa jika photo ditemukan
        if (!$photo) {
            abort(404); // Tampilkan halaman 404 jika photo tidak ditemukan
        }
    
        return view('/dashboard.photo-data.edit', compact(['photo','album', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $photoId)
{
    // Ambil tanggal saat ini
    $tanggal = Carbon::now()->toDateTimeString();
    
    // Temukan foto berdasarkan photoId
    $photo = Photo::where('photoId', $photoId)->first();
    
    // Perbarui atribut foto dengan data dari request
    $photo->photo_title = $request->photo_title;
    $photo->photo_description = $request->photo_description;
    $photo->albumId = $request->albumId;
    
    // Periksa jika file_location ada dalam request
    if ($request->hasFile('file_location')) {
        $file = $request->file('file_location');
        $path = storage_path('app/public');
        $file_name = 'public/' . date('Ymd') . '-' . $file->getClientOriginalName();
        $file->storeAs('public', $file_name);
        $photo->file_location = $file_name;
    }

    // Tidak perlu memperbarui tanggal pembuatan
    // Perbarui atribut 'userId' dengan ID pengguna yang sedang masuk
    $photo->userId = auth()->user()->userId;

    // Simpan perubahan pada foto
    $photo->save();

    // Redirect ke halaman foto-data dengan pesan sukses
    return redirect('/dashboard/photo-data')->with('success', 'Photo telah diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($photoId)
    {
        Photo::destroy($photoId);
        return redirect('/dashboard/photo-data')->with('success','Data Berhasil Dihapus');
    }
    
    


}
