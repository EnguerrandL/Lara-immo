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
        'image',
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
       
    ];


//     public function getRouteKeyName()
// {
//     return 'slug'; // Remplacez 'slug' par le nom de la colonne que vous utilisez
// }


    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
