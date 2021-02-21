<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
    ];

    public function songs () {
        return $this->belongsToMany(Song::class, 'playlist_songs');
    }

    public function genre () {
        return $this->belongsTo(Genre::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
