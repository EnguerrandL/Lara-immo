@extends('theme')
@section('title', $property->exists ? 'Editer votre bien' : 'Ajouter un bien')

@section('content')


    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($property->exists ? 'admin.update' : 'admin.store', ['property' => $property]) }}" method="POST"
        enctype="multipart/form-data">

        @csrf
        @method($property->exists ? 'PUT' : 'POST')



        <div class="row">

            @include('shared.input', [
                'class' => 'col',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $property->title,
            ])
            <div class="col row">

                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'size',
                    'value' => $property->size,
                ])

                @include('shared.input', [
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
                'label' => 'Pièces'
                'class' => 'col',
                'name' => 'part',
                'value' => $property->part,
            ])
            @include('shared.input', [
                'label' => 'Chambres'
                'class' => 'col',
                'name' => 'room',
                'value' => $property->room,
            ])



            @include('shared.input', [
                'label' => 'Étages'
                'class' => 'col',
                'name' => 'floor',
                'value' => $property->floor,
            ])


        </div>



        <div class="row">

            @include('shared.input', [
                'label' => 'Adresse'
                'class' => 'col',
                'name' => 'adress',
                'value' => $property->adress,
            ])
            @include('shared.input', [
                'label' => 'Ville'
                'class' => 'col',
                'name' => 'city',
                'value' => $property->city,
            ])



            @include('shared.input', [
                'label' => 'Code postal'
                'class' => 'col',
                'name' => 'zipcode',
                'value' => $property->zipcode,
            ])


        </div>

        @include('shared.checkbox', [
            'label' => 'Vendu'
            'name' => 'isAvailable',
            'value' => $property->isAvailable,
        ])

        <div>

            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier le bien
                @else
                    Ajouter un bien
                @endif
            </button>


        </div>






    </form>



@endsection
