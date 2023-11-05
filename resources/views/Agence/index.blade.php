@extends('theme')
@section('title', 'Bienvenue dans votre agence Net\'Agence')

@section('content')

    <div class="container-fluid ">

        <h1 class="text-center mt-3 mb-3">Bienvenue dans votre agence Net'Agence</h1>

        <div class="row   mt-5">
            <h3>Nos derniers biens</h3>
            @foreach ($properties as $property)
                <div class="card mx-auto" style="width: 18rem;">

                    @foreach ($property->images->take(1) as $img)
                        
                   
                    <img src="{{ $img->images }}" class="card-img-top" alt="...">

                    @endforeach
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text">{{ $property->size . ' m²' }} </p>
                        <p class="card-text">{{ 'Ville : ' . $property->city }} </p>
                        <p><small><strong>{{ 'Prix : ' . $property->price . ' €' }}</strong></small></p>
                        
                        <a href="{{ route('agence.show', ['slug' => $property->slug, 'property' => $property]) }}"
                            class="btn btn-primary">Voir ce bien
                        </a>

                    </div>
                </div>
            @endforeach

        </div>


    </div>

@endsection
