<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgenceController extends Controller
{

    public function index()
    {

        $properties = Property::latest('updated_at')->take(4)->get();


        return view('agence.index', [
            'properties' => $properties,
            'images' => Property::with('images')->get(),

        ]);
    }



    public function listing()
    {


        return view('agence.listing', [
            'properties' => Property::all(),
            'images' => Property::with('images')->get(),
        ]);
    }


    public function show(String $slug, Property $property)
    {

        $checkSlug = $property->slug;

        if ($slug != $checkSlug) {
            return to_route('agence.show', ['slug' => $checkSlug, 'property' => $property]);
        }


        return view('agence.show',  [
            'property' => $property,
            'slug' => $property->slug
        ]);
    }
}
