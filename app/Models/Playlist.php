<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'author',
    ];

    public function content()
    {
        return $this->hasOne(Content::class, 'playlist_id');
    }
}
