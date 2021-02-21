<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedSong extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $guarded = [];
}
