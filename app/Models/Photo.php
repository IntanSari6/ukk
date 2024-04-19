<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $primaryKey = 'photoId';

    protected $fillable = ['photo_title', 'photo_description', 'upload_date', 'file_location', 'albumId', 'userId', 'likes'];

    public function user(){
        return $this->belongsTo(User::class, 'userId');
    }
    public function album(){
        return $this->belongsTo(Album::class);
    }
}
