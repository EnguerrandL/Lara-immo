@extends('theme')
@section('title', 'Tous nos biens')

@section('content')

    <div class="container col-12">

        <h1 class="mt-5">Tous nos biens </h1>


        <div class="container col-10">


            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('agence.search') }}">

                @csrf
                <h5 class="mt-5 mb-5 col text-center text-primary">Ne perdez pas de temps et trouvez rapidement LE bien qui
                    vous correspond !</h5>
                <div class="row">

                    <input class="col form-control mr-sm-2" name="surface" type="number" placeholder="Surface minimum"
                        aria-label="Search">
                    <input class="col form-control mr-sm-2" name="parts" type="number"
                        placeholder="Nombre de pièces minimum" aria-label="Search">
                    <input class="col form-control mr-sm-2" name="price" type="number" placeholder="Budget max"
                        aria-label="price">
                    <input class="col form-control mr-sm-2" name="search" type="text" placeholder="Mots clés"
                        aria-label="Search">

                    <button class="col btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>

                </div>
            </form>








        </div>
        @if ($properties->isEmpty())
            <div class="mt-5 alert alert-warning mx-auto text-center " role="alert">
                <h3>Malheuresement votre recherche n'a rien donnée. </h3>
            </div>
        @endif

        <div class="mt-5 row">
            @foreach ($properties as $property)
                <div class="mt-2 mb-2 col-md-6">

                    <div class="card" style="width: 40rem;">

                        @foreach ($property->images->take(1) as $img)
                            <img class="card-img-top" src=" {{ $img->imgUrl() }}" alt="Card image cap">
                        @endforeach
                        <div class="card-body">

                            <h5 class="">{{  'Prix : ' . number_format($property->price, thousands_separator: '  ') . ' €' }}</h5>


                            @if ($property->isAvailable == true)
                                <span class="mt-2 mb-2 badge bg-success">Bien disponible !</span>
                            @else
                                <span class=" mt-2 mb-2 badge bg-danger">Vendu</span>
                            @endif





                           
                            <h1 class="display-6 text-primary"> <strong>{{ $property->title }}</strong></h1>
                            <p class="card-text">{{ $property->description }}.</p>


                           @if ($property->options->isNotEmpty())
                            <p><strong>Options :</strong>
                                @endif


                                @foreach ($property->options as $option)
                                    <h6> <span class=" badge bg-secondary">{{ $option->name }} </span></h6>
                                @endforeach
                            </p>

                            <a href="{{ route('agence.show', ['slug' => $property->slug, 'property' => $property]) }}"
                                class="btn btn-primary">Découvrir cette merveille</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

@endsection
