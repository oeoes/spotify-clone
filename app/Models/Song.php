<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
    ];

    public function collection () {
        return $this->belongsTo(Collection::class);
    }

    public function getDurationAttribute ($duration) {
        return floor($duration/60) . ':' . str_pad(($duration%60), 2, '0', STR_PAD_LEFT);
    }

    public function singers () {
        return $this->belongsToMany(Artist::class, 'singers');
    }

    public function playlist () {
        return $this->belongsToMany(Playlist::class, 'playlist_songs');
    }

    public function getTitleAttribute ($title) {
        return ucwords($title);
    }
}
