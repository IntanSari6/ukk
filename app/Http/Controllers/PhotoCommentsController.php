<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoComment ;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PhotoCommentsController extends Controller
{
    public function storeComment(Request $request, String $id)
{
    $validatedData = $request->validate([
        'comment_content' => 'required'
    ]);
    

    if(Auth::check()) {
        $user = Auth::user();
        $comment = new PhotoComment();
        $comment->photoId = $id;
        $comment->comment_content = $request->comment_content;
        $comment->date_of_comment = now(); 
        $comment->userId = auth()->user()->userId;
        $comment->save();

        // Redirect ke halaman detail foto
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    } else {
        // Tindakan jika tidak ada pengguna yang sedang login
        return redirect()->back()->with('error', 'Silakan login terlebih dahulu untuk menambahkan komentar');
    }
}

// public function deleteComment($commentId)
// {
//     $comment = PhotoComment::find($commentId);

//     if(!$comment) {
//         // Komentar tidak ditemukan
//         return redirect()->back()->with('error', 'Komentar tidak ditemukan');
//     }

//     // Pastikan pengguna yang menghapus adalah pemilik komentar atau memiliki hak akses yang sesuai
//     if(Auth::id() == $comment->userId) {
//         $comment->delete();
//         return redirect()->back()->with('success', 'Komentar berhasil dihapus');
//     } else {
//         // Tidak diizinkan menghapus komentar
//         return redirect()->back()->with('error', 'Anda tidak diizinkan menghapus komentar ini');
//     }
// }
    

}
