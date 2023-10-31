@extends('theme')
@section('title', 'Editer votre bien')

@section('content')

    <div class="container-fluid">

        <h1 class="text-center">Editer votre bien : {{ $property->title }}</h1>




        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="container col-10 mx-auto">
            <form method="POST" action="{{ route('admin.update', $property) }}">

                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm">

                            <div class="">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{ old('title', $property->title) }}">

                            </div>
                            <div class="">
                                <label for="description">Description</label>

                                <textarea class="form-control" name="description" cols="60" rows="3"
                                    value="{{ old('description', $property->description) }}">Description</textarea>

                            </div>

                            <div class="">
                                <label for="part">Pièces</label>
                                <input type="number" class="form-control" name="part"
                                    value="{{ old('part', $property->part) }}">

                            </div>
                            <div class="">
                                <label for="adress">Adresse</label>
                                <input type="text" class="form-control" name="adress"
                                    value="{{ old('adress', $property->adress) }}">

                            </div>

                        </div>
                        <div class="col-sm">

                            <div class="">
                                <label for="size">Surface (m²)</label>
                                <input type="number" class="form-control" name="size"
                                    value="{{ old('size', $property->size) }}">

                            </div>


                            <div class="">
                                <label for="room">Chambres</label>
                                <input type="number" class="form-control" name="room"
                                    value="{{ old('room', $property->room) }}">

                            </div>
                            <div class="">
                                <label for="city">Ville</label>
                                <input type="text" class="form-control" name="city"
                                    value="{{ old('city', $property->city) }}">

                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="">
                                <label for="price">Prix (€)</label>
                                <input type="number" class="form-control" name="price"
                                    value="{{ old('price', $property->price) }}">

                            </div>
                            <div class="">
                                <label for="floor">Étage(s)</label>
                                <input type="number" class="form-control" name="floor"
                                    value="{{ old('floor', $property->floor) }}">

                            </div>
                            <div class="">
                                <label for="zipcode">Code postal</label>
                                <input type="text" class="form-control" name="zipcode"
                                    value="{{ old('zipcode', $property->zipcode) }}">

                            </div>
                        </div>
                        <div class="col-sm">




                            <div>
                           
                                <label for="isAvailable">Bien disponible ?</label>
                                <input type="checkbox"  name="isAvailable" data-toggle="toggle " 
                                value="1" {{ $property->isAvailable ? 'checked' : '' }}>
                            </div>


                            <div>

                                <label for="image">Photo(s) du bien</label>
                                <input class="form-control" type="file" name="image" multiple>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Editer le bien</button>
                </div>


            </form>





        </div>

    </div>

@endsection
