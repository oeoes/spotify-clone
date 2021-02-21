<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;
    
    protected $guarded = [];

    public function getFullNameAttribute ($full_name) {
        return ucwords($full_name);
    }

    public function collections () {
        return $this->hasMany(Collection::class);
    }

    public function songs () {
        return $this->belongsToMany(Song::class, 'singers');
    }
}
