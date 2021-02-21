<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistSong extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
    ];

    public function song () {
        return $this->belongsTo(Song::class);
    }

    public function playlist () {
        return $this->belongsTo(Playlist::class);
    }
}
