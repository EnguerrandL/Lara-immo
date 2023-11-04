<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;


    protected $fillable = [
        'isAvailable',
        'title',
        'description',
        'adress',
        'slug',
        'city',
        'size',
        'price',
        'zipcode',
        'room',
        'part',
        'floor',
        'updated_at',
        'created_at',
        'property_id',
        'options_id',

 
       
    ];





    public function options()
    {
        return $this->belongsToMany(Option::class);
    }
    public function images()


    {
        return $this->hasMany(Image::class);
    }
}
