@extends('theme')
@section('title', 'Tous nos biens')

@section('content')

    <div class="container col-10">

        <h1 class="mt-5">Tous nos biens </h1>


        <div class="container col-10">


            <form class="form-inline my-2 my-lg-0">
                <h5 class="mt-5 mb-5 col text-center text-primary">Ne perdez pas de temps et trouver rapidement LE bien qui vous correspond !</h5>
                <div class="row">
                    
                    <input class="col form-control mr-sm-2" type="number" placeholder="Surface" aria-label="Search">
                    <input class="col form-control mr-sm-2" type="number" placeholder="Nombre de pièces" aria-label="Search">
                    <input class="col form-control mr-sm-2" type="number" placeholder="Budget max" aria-label="Search">
                    <input class="col form-control mr-sm-2" type="text" placeholder="Mots clés" aria-label="Search">

                    <button class="col btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>

                </div>
            </form>








        </div>


        <div class="col">
            @foreach ($properties as $property)
                <li class="list-group-item">
                    {{ $property->title }}
                </li>
            @endforeach
        </div>


    </div>

@endsection
