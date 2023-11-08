<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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


    // public function imgUrl(): string
    // {


    //     if (Str::contains($this->images, 'placeholder')) {
    //         return $this->images;
    //     } else {
    //         return Storage::disk('public')->url($this->images);
    //     }
    // }


    public function imgUrl(): string
{
    if (Str::contains($this->images, 'placeholder')) {
        return $this->images; // Si l'image est une URL externe ou une URL de placeholder, retournez-la telle quelle.
    } else {
        // Utilisez asset() pour générer l'URL complète en fonction du chemin relatif de l'image.
        return asset(Storage::disk('public')->url($this->images));
    }
}

}
