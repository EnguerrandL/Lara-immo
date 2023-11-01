<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'images',
    ];


    public function property()
    {
        return $this->belongsTo(Property::class);
    }


    public function imgUrl(): string
    {
        return Storage::disk('public')->url($this->images);
    }
}
