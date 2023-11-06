@extends('theme')
@section('title', 'Votre future bien : ' . $property->title)

@section('content')



    <div class="container-fluid">








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

                    <div class="row">
                        @foreach ($property->images->take(6) as $img)
                            <div class="col-md-4">
                                <img class="mt-5 mr-5 mb-2 img-fluid" src="{{ $img->images }}" alt="Image">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-6">


                    <h1 class="">Votre futur bien ! {{ $property->title }}</h1>
                    <h3 class="">{{ $property->part . 'Pièces' }} - {{ $property->size . ' m²' }}</h3>
                    <h1 class="text-primary"> {{ number_format($property->price, thousands_separator: '  ') . ' €' }} </h1>
                    <hr>


                    <h3>Intéressé(e) par ce bien ? </h3>
                    <form class="" method="POST">

                        @csrf

                        @include('shared.input', [
                            'class' => 'col',
                            'label' => 'Prénom',
                            'name' => 'prenom',
                        ])
                        @include('shared.input', [
                            'class' => 'col',
                            'label' => 'nom',
                            'name' => 'nom',
                        ])
                        @include('shared.input', [
                            'class' => 'col',
                            'label' => 'Télephone',
                            'name' => 'phone',
                            'type' => 'number',
                        ])
                        @include('shared.input', [
                            'class' => 'col',
                            'label' => 'Email',
                            'name' => 'mail',
                            'type' => 'email',
                        ])

                        @include('shared.input', [
                            'type' => 'textarea',
                            'label' => 'Votre message',
                            'name' => 'usermessage',
                        ])

                        <button class="mt-2 btn btn-primary">Envoyer votre message</button>


                    </form>

                    <ul class=" col-5 list-group mt-5 ">
                        <li class="list-group-item list-group-item-primary active">Les spécificitées de ce bien :</li>
                        @foreach ($property->options as $option)
                            <li class="list-group-item list-group-item-dark">{{ $option->name }}</li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>


        <div class="mt-5 mb-5 col-6 mx-auto">
            <h3>Toutes les caractéristiques de votre futur bien</h3>
            <table class="table">



                <tbody>

                    <tr>
                        <th scope="col">Ville et adresse</th>
                        <td scope="col">{{ $property->city .' ' }} - {{' ' . $property->adress }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Surface habitable</th>
                        <td scope="col">{{ $property->size . ' m²' }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Chambres</th>
                        <td>{{ $property->room }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Pièces</th>
                        <td>{{ $property->part }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Étages</th>
                        <td>{{ $property->floor }}</td>
                    </tr>


                </tbody>
            </table>
        </div>

    </div>


@endsection
