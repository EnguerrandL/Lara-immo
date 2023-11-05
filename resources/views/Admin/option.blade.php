@extends('theme')
@section('title', 'Gérer vos options')
@section('content')





    <div class="container-fluid">

        <h1 class="mt-5 mb-5 text-center">Gérer les options de vos biens</h1>
        <form class="mt-5 mb-5" action="{{ route('option.store') }}" method="POST">

            @csrf

            <div class="col-4 mx-auto ">
                <label class="text-primary form-label" for="name">Ajouter une option</label>
                <input class="form-control" type="text" name="name">
                <button class=" mt-2 btn btn-primary">Ajouter une option</button>
        </form>
   






    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom de l'option</th>
                <th scope="col">Actions</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($options as $option)
                <tr>
                    <td> <strong>{{ $option->name }}</strong></td>

                    <td>



                        <a href="{{ route('option.edit', $option->id) }}" class="btn btn-warning ">Editer</a>

                        <form  class="mt-2" action="{{ route('admin.option.delete', $option->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Supprimer</button>
                        </form>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



</div>


@endsection
