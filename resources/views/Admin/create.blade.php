@extends('theme')
@section('title', 'Ajouter un bien')

@section('content')

    <div class="container-fluid">

        <h1 class="text-center">Ajouter un bien</h1>




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
            <form method="POST" action="{{ route('admin.store') }}">

                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm">

                            <div class="">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control" name="title">

                            </div>
                            <div class="">
                                <label for="description">Description</label>

                                <textarea class="form-control" name="description" cols="60" rows="3">Description</textarea>

                            </div>

                            <div class="">
                                <label for="part">Pièces</label>
                                <input type="number" class="form-control" name="part">

                            </div>
                            <div class="">
                                <label for="adress">Adresse</label>
                                <input type="text" class="form-control" name="adress">

                            </div>

                        </div>
                        <div class="col-sm">

                            <div class="">
                                <label for="size">Surface (m²)</label>
                                <input type="number" class="form-control" name="size">

                            </div>


                            <div class="">
                                <label for="room">Chambres</label>
                                <input type="number" class="form-control" name="room">

                            </div>
                            <div class="">
                                <label for="city">Ville</label>
                                <input type="text" class="form-control" name="city">

                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="">
                                <label for="price">Prix (€)</label>
                                <input type="number" class="form-control" name="price">

                            </div>
                            <div class="">
                                <label for="floor">Étage(s)</label>
                                <input type="number" class="form-control" name="floor">

                            </div>
                            <div class="">
                                <label for="zipcode">Code postal</label>
                                <input type="number" class="form-control" name="zipcode">

                            </div>
                        </div>
                        <div class="col-sm">




                            <div>
                                <label for="isAvailable">Bien disponible ?</label>
                                <input type="checkbox" name="isAvailable" data-toggle="toggle">
                            </div>


                            <div>

                                <label for="image">Photo(s) du bien</label>
                                <input class="form-control" type="file" name="image" multiple>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter un nouveau bien</button>
                </div>


            </form>





        </div>

    </div>

@endsection
