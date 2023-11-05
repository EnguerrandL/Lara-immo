@extends('theme')
@section('title', 'Votre future bien : ' . $property->title)

@section('content')



    <div class="container-fluid">


        <h1 class="text-center">Votre futur bien ! {{ $property->title }}</h1>





        <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($property->images as $key => $img)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{ $img->images }}" alt="Image {{ $key + 1 }}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Photo précédente</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Photo suivante</span>
                    </a>
                </div>
            </div>
            <div class="col-6"><p>Toutes les infos sur votre futur bien</p></div>
        </div>

        <div class="row col-6">
            @foreach ($property->images as $img)
                <div class="col-md-4">
                    <img class="mt-5 mr-5 mb-2 img-fluid" src="{{ $img->images }}" alt="Image">
                </div>
            @endforeach
        </div>

    </div>


    </div>


@endsection
