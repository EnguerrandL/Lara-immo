@extends('theme')
@section('title', 'Gérer vos options')
@section('content')





    <div class="container col-6">

        <h1 class="mt-5 mb-5 text-center">Modifier l'option <strong> {{ $option->name }} </strong></h1>
        <form class="mt-5 mb-5" action="{{ route('option.update', $option)}}" method="POST">
       
      @csrf

            <div class="col-4 mx-auto ">
          <label class="text-primary form-label" for="name">Modifier l'option</label>
                <input class="form-control" type="text" name="name" value="{{ old('name', $option->name) }}">
                <button class=" mt-2 btn btn-primary">Modifier l'option</button>
        </form>


















@endsection
