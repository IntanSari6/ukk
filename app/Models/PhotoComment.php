<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_content',
        'date_of_comment',
        'photoId',
        'userId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class, 'photoId');
    }
}
