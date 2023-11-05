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


    public function search(Request $request)
    {

        $surface = $request->surface;
        $parts = $request->parts;
        $searchPrice = $request->price;
        $search = $request->search;

        $properties = Property::query();

        // dd($properties);

        if (!empty($surface)) {
            $properties->where('size', '>=', $surface);
        }
        
        
        if(!empty($parts)){
            $properties->where('part', '>=', $parts);
        }

        if (!empty($searchPrice)) {
            $properties->where('price', '<=', $searchPrice);
        }


        if (!empty($search)) {
            $properties->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('city', 'like', "%$search%")
                ->orWhereHas('options', function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', "%$search");
                });
                
        }


        $properties = $properties->get();


        return view('agence.listing', compact('properties', 'surface') );
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
