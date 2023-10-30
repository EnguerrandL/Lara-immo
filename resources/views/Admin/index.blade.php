@extends('theme')
@section('title', 'Adminnistration des biens')
@section('content')



             




    <div class="container">
        <div class="mt-3 mb-3 d-flex justify-content-between">
            <h1>Gérer les biens</h1>
            <a href="{{ route('admin.create')}}" class="btn btn-primary ">Ajouter un bien</a>
           
        </div>
        <div class="container">
            <div class="row">
              <div class="col">
                <strong>Titre </strong>
              </div>
              <div class="col">
                <strong>Surface</strong>
              </div>
              <div class="col">
                <strong>Prix </strong>
              </div>
              <div class="col">
                <strong>Ville </strong>
              </div>
              <div class="col">
                <strong>Actions</strong>
              </div>
            </div>
          </div>



        @foreach ($properties as $property)
        <div class="row">
           
            <div class="col-sm">
            
                <li class="list-group">{{$property->title}}</li>
        
            </div>
            <div class="col-sm">
              
                <li class="list-group">{{$property->size . ' m²'}}</li>
            </div>
            <div class="col-sm">
              
                <li class="list-group">{{$property->price . ' $'}}</li>
            </div>
            <div class="col-sm">
               
                <li class="list-group">{{$property->city }}</li>
            </div>
            <div class="col-sm">
          
                <div class="row">
                   
                        <a href="" class="btn btn-warning ">Editer</a>

                
                   
                    <form action="{{ route('admin.delete', $property->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
                
            </div>
          
        </div>
        @endforeach
    </div>



@endsection
