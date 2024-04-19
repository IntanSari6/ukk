<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class PhotoComments extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment_content' => 'required|string|max:255',
            'photoId' => 'required|exists:photos,id',
        ]);
        $tanggal = Carbon::now()->toDateTimeString();
        $comment = new Comment();
        $comment->content = $request->content;
        $photo->upload_date = $tanggal;
        $comment->user_id = auth()->id(); // Assuming you have authentication set up
        $comment->photo_id = $request->photo_id;
        $comment->save();

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
    public function like(){
        
    }
}
