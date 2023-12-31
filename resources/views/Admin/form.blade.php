@extends('theme')
@section('title', $property->exists ? 'Éditer votre bien : ' . $property->title : 'Ajouter un bien')

@section('content')


    <h1 class="text-center mt-5 mb-5">@yield('title')</h1>

    <form class="col-10 mx-auto vstack gap-2" action="{{ route($property->exists ? 'admin.update' : 'admin.store', ['property' => $property]) }}" method="POST"
        enctype="multipart/form-data">

        @csrf
        @method($property->exists ? 'POST' : 'POST')
     



        <div class="row">
            @include('shared.checkbox', [
                'label' => 'Disponible ?',
                'name' => 'isAvailable',
                'value' => $property->isAvailable,
            ])

            @include('shared.input', [
                'class' => 'col',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $property->title,
            ])
            <div class="col row">

                @include('shared.input', [
                     'label' => 'Surface',
                    'class' => 'col',
                    'name' => 'size',
                    'value' => $property->size,
                ])

                @include('shared.input', [
                     'label' => 'Prix',
                    'class' => 'col',
                    'name' => 'price',
                    'value' => $property->price,
                ])
            </div>
        </div>
        @include('shared.input', [
            'type' => 'textarea',
            'name' => 'description',
            'value' => $property->description,
        ])

        <div class="row">

            @include('shared.input', [
                'label' => 'Pièces',
                'class' => 'col',
                'name' => 'part',
                'value' => $property->part,
            ])
            @include('shared.input', [
                'label' => 'Chambres',
                'class' => 'col',
                'name' => 'room',
                'value' => $property->room,
            ])



            @include('shared.input', [
                'label' => 'Étages',
                'class' => 'col',
                'name' => 'floor',
                'value' => $property->floor,
            ])


        </div>



        <div class="row">

            @include('shared.input', [
                'label' => 'Adresse',
                'class' => 'col',
                'name' => 'adress',
                'value' => $property->adress,
            ])
            @include('shared.input', [
                'label' => 'Ville',
                'class' => 'col',
                'name' => 'city',
                'value' => $property->city,
            ])



            @include('shared.input', [
                'label' => 'Code postal',
                'class' => 'col',
                'name' => 'zipcode',
                'value' => $property->zipcode,
            ])


        </div>

  
        
        @include('shared.multiselect')




@include('shared.img')

    

        <div>

       <div class="container">

        <button class="btn btn-primary mb-5 mt-5">
            @if ($property->exists)
                Modifier le bien
            @else
                Ajouter un bien
            @endif
        </button>

       </div>

        </div>






    </form>



@endsection
