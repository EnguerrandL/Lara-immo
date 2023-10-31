<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class AgenceController extends Controller
{
    
    public function index(){

        $properties = Property::latest('updated_at')->take(4)->get();


        return view('agence.index', [
            'properties' => $properties,
        ]);

    }


}
