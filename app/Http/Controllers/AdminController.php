<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestAdminForm;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function index()
    {





        return view('admin.index',  [
            'properties' =>  Property::all(),
        ]);
    }



    public function create()
    {

        $properties = Property::all();

        return view('admin.create', [
            'properties' => $properties,
        ]);
    }

    public function store(RequestAdminForm $request)
    {
        $request['slug'] = Str::slug($request->title);

        Property::create($request->validated());



        return redirect()->route('admin.index')->with('success', 'Votre bien a été ajouter avec succès !');
    }



    public function edit(Property $property)
    {



        return view('admin.edit', [
            'property' => $property
        ]);
    }


    public function update(Property $property, RequestAdminForm $request)
    {

        $property->update($request->validated());

        return redirect()->route('admin.index')->with('success', 'Votre bien a été éditer avec succès');
    }


    public function destroy(Property $property)
    {

        $property->delete();

        return redirect()->route('admin.index')->with('success', 'Le bien à été supprimé avec succès');
    }





    public function propertyOption()
    {

        return view('admin.option', [
            'options' => Option::all(),
        ]);
    }





    public function deleteOption(Option $option)
    {
        $option->delete();

       
        return redirect()->route('admin.option')
        ->with('success', 'Votre option a bien été supprimée !');
    }
}
