<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestAdminForm;
use App\Http\Requests\RequestOptionForm;
use App\Models\Image;
use App\Models\Option;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;


class AdminController extends Controller
{

    public function index()
    {

        return view('admin.index',  [
            'properties' =>  Property::orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->get(),
            'options' => Property::with('options')->get()
        ]);
    }



    public function create()
    {

        $property = new Property();
        $property->fill([
            'title' => 'Nom du bien',
            'description' => 'Il faut bien le vendre ce bien : ) ',
            'adress' => '36 rue des jardins',
            'price' => 100000,
            'size' => 40,
            'room' => 1,
            'part' => 2,
            'floor' => 1,
            'city' => 'Avignon',
            'zipcode' => 84000,
            'isAvailable' => false
        ]);

        return view('admin.create', [
            'property' => $property,
            'options' => Option::all()
        ]);
    }

    public function store(RequestAdminForm $request, Property $property)
    {

        $validatedData = $request->validated();

        $validatedData['slug'] = Str::slug($request->title);

        $property = Property::create($validatedData);
        $property->save();
        $this->manageImg($request, $property);
        $property->save();
        $property->options()->sync($request->validated('name'));


        return redirect()->route('admin.index')
            ->with(['success' => 'Votre bien : ' . $property->title . ' a été ajouté avec succés', 'alert-class' => 'success']);
    }





    public function edit(Property $property)
    {
        return view('admin.edit', [
            'property' => $property,
            'propertyImg' => Image::select('property_id', 'id', 'images')->where('property_id', $property->id)->get(),
            'images' => Property::with('images')->get(),
            'options' => Option::all()
        ]);
    }






    public function update(Property $property, RequestAdminForm $request)
    {


        $this->manageImg($request, $property);
        $property->update($request->validated());

        $property->options()->sync($request->validated('name'));
        $property->save();

        return redirect()->route('admin.index')
            ->with([
                'success' => 'Votre bien : ' . $property->title . ' a été modifié avec succés',
                'alert-class' => 'warning'
            ]);
    }









    public function destroy(Property $property)
    {
        $getTitlebeforeDelete = $property->title;
        $property->delete();

        return redirect()->route('admin.index')
            ->with(['success' => 'Votre bien : '  . $getTitlebeforeDelete . '  a été supprimé avec succés', 'alert-class' => 'danger']);
    }


    public function deleteImgFromProperty(Property $property, $image_id)
    {
        $image = Image::find($image_id);
        if ($image->property_id === $property->id) {
            $image->delete();
            Storage::disk('public')->delete($image->images);
        }

        return redirect()->back()
            ->with(['success' => 'Image supprimée avec succès', 'alert-class' => 'danger']);
    }




    public function showOption()
    {
        return view('admin.option', [
            'options' => Option::orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function optionStore(RequestOptionForm $request)
    {
        $option =    Option::create($request->validated());
        $option->save();
        $name =  $option->name;

        return redirect()
            ->back()
            ->with(['success' => 'L\'option ' . $name .  ' a été ajoutée avec succès', 'alert-class' => 'success']);
    }

    public function optionUpdate(RequestOptionForm $request, Option $option)
    {
        $oldData = $option->name;
        $option->update($request->validated());
        $newData = $option->name;

        return redirect()->route('admin.option.show')->with([
            'success' => 'L\'option ' . $oldData . ' a été remplacer par ' . $newData . ' avec succès',
            'alert-class' => 'warning'
        ]);
    }

    public function editOption(Option $option)
    {
        return view('admin.optionedit', [
            'option' => $option,
        ]);
    }







    public function deleteOption(Option $option)
    {
        $name = $option->name;
        $option->delete();


        return redirect()->back()
            ->with(['success' => 'L\'option ' . $name . ' a été supprimée avec succès', 'alert-class' => 'danger']);
    }


    public function manageImg(RequestAdminForm $request, Property $property): array
    {


        $data = $request->validated('images');
        $imagesData = [];

        if ($request->file('images') != null) {
            foreach ($request->file('images') as $imagefile) {

                $filename = uniqid() . '_' .  $imagefile->getClientOriginalName();

                // if (Storage::disk('public')->exists('biens/' . $filename)) {
                //     Storage::disk('public')->delete('biens/' . $filename);
                // }


                // uniqid() . '_' .


                $image = new Image();
                $path = $imagefile->storeAs('biens', $filename, 'public');

                $image->images = $path;

                $image->property_id = $property->id;
                $imagesData[] = $path;
                $image->save();
            }
        
            $data['images'] = $imagesData;
        }
        return  $imagesData;
    }
}


























// public function saved(RequestAdminForm $request, Property $property): array
// {


//     $data = $request->validated('images');
//     $imagesData = [];

//     if ($request->file('images') != null) {
//         foreach ($request->file('images') as $imagefile) {

//             $filename = uniqid() . '_' . $imagefile->getClientOriginalName();

//             // Storage::disk('public')->exists('biens/' . $filename)



//             if (Storage::disk('public')->exists('biens/' . $filename)) {
//                 // Si le fichier existe, le supprimer
//                 Storage::disk('public')->delete('biens/' . $filename);
//             }

//             $image = new Image();
//             $path = $imagefile->storeAs('biens', $filename, 'public');

//             $image->images = $path;




//             $image->property_id = $property->id;


//             $imagesData[] = $path;




//             $image->save();
//         }

//         $data['images'] = $imagesData;
//     }
//     return  $imagesData;
// }
