<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoComment ;
use Carbon\Carbon;

class PhotoCommentsController extends Controller
{
    public function store(Request $request, String $id)
    {
        $comment = PhotoComment ::where('photoId', $id)->where('userId', auth()->user()->userId)->first();
        // Validasi input
        $request->validate([
            'comment_content' => 'required|string|max:255',
        ]);
        
        // Buat objek Comment dan isi dengan data dari request
        $tanggal = Carbon::now()->toDateTimeString();
        $comment = new PhotoComment ();
        $comment->comment_content = $request->input('comment_content');
        $comment->date_of_comment = $tanggal;
        $comment->photoId = $id;
        $comment->userId = auth()->user()->userId;
    
        // Simpan komentar ke dalam database
        $comment->save();
    
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
    

}
