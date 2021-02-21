<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $guarded = [];

    public function song () {
        return $this->belongsTo(Song::class);
    }
}
