<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class Library extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $guarded = [];

    public function user () {
        return $this->belongsTo(User::class);
    }
}
