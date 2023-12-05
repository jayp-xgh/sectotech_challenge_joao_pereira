<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'author',
        'playlist_id',
    ];

    public function creationDate(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return Carbon::parse($value)->format('d/m/Y');
            },
            set: function ($value) {
                return Carbon::createFromFormat('d/m/Y', $value);
            }
        );
    }

    public function playlist()
    {
        return $this->belongsTo(Playlist::class, 'playlist_id');
    }
}
