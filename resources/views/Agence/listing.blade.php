@extends('theme')
@section('title', 'Tous nos biens')

@section('content')

    <div class="container col-10">

        <h1 class="mt-5">Tous nos biens </h1>


        <div class="container col-10">


            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('agence.search') }}">

                @csrf
                <h5 class="mt-5 mb-5 col text-center text-primary">Ne perdez pas de temps et trouvez rapidement LE bien qui vous correspond !</h5>
                <div class="row">
                    
                    <input class="col form-control mr-sm-2" name="surface" type="number" placeholder="Surface minimum" aria-label="Search">
                    <input class="col form-control mr-sm-2" name="parts" type="number" placeholder="Nombre de pièces minimum" aria-label="Search">
                    <input class="col form-control mr-sm-2"  name="price" type="number" placeholder="Budget max" aria-label="price">
                    <input class="col form-control mr-sm-2" name="search" type="text" placeholder="Mots clés" aria-label="Search">

                    <button class="col btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>

                </div>
            </form>








        </div>
        @if ($properties->isEmpty())

        <div class="mt-5 alert alert-warning mx-auto text-center " role="alert">
           <h3>Malheuresement votre recherche n'a rien donnée.  </h3>
          </div>

                @endif

        <div class="col">
            @foreach ($properties as $property)
                <li class="list-group-item">
                    {{ $property->title }}
                </li>
            @endforeach
        </div>


    </div>

@endsection
