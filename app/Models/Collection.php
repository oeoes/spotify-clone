<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $guarded = [];

    public function artist () {
        return $this->belongsTo(Artist::class);
    }

    public function songs () {
        return $this->hasMany(Song::class);
    }

    // Local scopes
    public function scopeAlbum ($query) {
        return $query->where('collection_type', 'album');
    }

    public function scopeSingleAndEp ($query) {
        return $query->where('collection_type', '!=', 'album');
    }

    public function scopeSingle($query)
    {
        return $query->where('collection_type', 'single');
    }

    public function scopeEp($query)
    {
        return $query->where('collection_type', 'ep');
    }
}
