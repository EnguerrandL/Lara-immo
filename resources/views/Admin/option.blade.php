@extends('theme')
@section('title', 'Gérer vos options')
@section('content')





    <div class="container col-6">

        <h1 class="mt-5 mb-5 text-center">Gérer les options de vos biens</h1>
        <form class="mt-5 mb-5" action="{{ route('option.store')}}" method="POST">
       
      @csrf

            <div class="col-4 mx-auto ">
          <label class="text-primary form-label" for="name">Ajouter une option</label>
                <input class="form-control" type="text" name="name">
                <button class=" mt-2 btn btn-primary">Ajouter une option</button>
        </form>
    </div>
    <div class="row">
        <div class="col">
            <h3> <strong>Nom de l'option </strong></h3>
        </div>



        <div class="col">
            <h3> <strong>Actions</strong></h3>
        </div>
    </div>




    @foreach ($options as $option)
        <div class="row">

            <div class="col-sm">

                <li class="list-group">
                    <h5>{{ $option->name }}</h5>
                </li>

            </div>

            <div class="col-sm">

                <div class="row">

                    <a href="{{ route('option.edit', $option->id) }}" class="btn btn-warning ">Editer</a>

                    <form action="{{ route('admin.option.delete', $option->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </div>

            </div>

        </div>
    @endforeach
    </div>
    </div>
















@endsection
