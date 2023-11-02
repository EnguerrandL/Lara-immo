<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestAdminForm;
use App\Models\Image;
use App\Models\Option;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function index()
    {


        return view('admin.index',  [
            'properties' =>  Property::orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->get()
        ]);
    }



    public function create()
    {

        $properties = new Property();
        $properties->fill([
            'size' => 40,
            'room' => 1,
            'part' => 2, 
            'city' => 'Avignon',
            'zipcode' => 84000,
            'isAvailable' => false
        ]);

        return view('admin.create', [
            'properties' =>$properties,
        ]);
    }

    public function store(RequestAdminForm $request, Property $property)
    {


        $validatedData = $request->validated();

        $validatedData['slug'] = Str::slug($request->title); 

        $property = Property::create($validatedData);



        $data = $request->validated('images');
        $imagesData = [];

      if($request->file('images') != null) 
      {

    
        
        foreach ($request->file('images') as $imagefile) {
            $image = new Image();
            $path = $imagefile->store('biens', 'public');
            $image->images = $path;
            $image->property_id = $property->id;

            $imagesData[] = $path;
        
            $image->save();
        }

        $data['images'] = $imagesData;

    }

        return redirect()->route('admin.index')->with('success', 'Votre bien a été ajouter avec succès !');
    }



    // private function deleteImagesOnCascade(Property $property, RequestAdminForm $request)
    // {
    //     $data = $request->validated();
    //     $images = $request->input('images');

    //     foreach ($images as $image) {
    //         if ($image != null) {
    //             // Ne faites rien ici, car vous stockerez les images plus tard.
    //         }
    //     }

    //     if ($property->images) {
    //         Storage::disk('public')->delete($property->images);
    //     }

    //     // Stockez les images ici s'il y en a de valides.
    //     $uploadedImages = [];
    //     foreach ($images as $image) {
    //         if ($image != null) {
    //             $filename = Carbon::now()->timestamp . '_' . uniqid();
    //             $path = $image->store('biens', 'public');
    //             $uploadedImages[] = $path;
    //         }
    //     }

    //     $data['images'] = $uploadedImages;

    //     return $data;
    // }



    public function edit(Property $property)
    {



        return view('admin.edit', [
            'property' => $property,
            'propertyImg' => Image::select('property_id', 'id', 'images')->where('property_id', $property->id)->get()
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
