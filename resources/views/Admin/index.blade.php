@extends('theme')
@section('title', 'Adminnistration des biens')
@section('content')



             




    <div class="container">
        <div class="mt-3 mb-3 d-flex justify-content-between">
            <h1> @yield('title')</h1>
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
                <strong>Options </strong>
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
              
                <li class="list-group">{{number_format( $property->price, thousands_separator: '  ' ) . ' €'}}</li>
            </div>
            <div class="col-sm">
               
                <li class="list-group">{{$property->city }}</li>
            </div>
            <div class="col-sm">
              @foreach ($property->options as $option)
              <li class="list-group">{{$option->name }}</li>
              @endforeach
            </div>

            <div class="col-sm">
          
                <div class="row">
                   {{-- @php
                       dd($property->slug)
                   @endphp --}}
                        <a href="{{ route('admin.edit', $property) }}" class="btn btn-warning ">Editer</a>

                
                   
                    <form action="{{ route('admin.delete', $property) }}" method="POST">
                      @csrf
                      @method('DELETE')
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
                
            </div>
          
        </div>
        <hr>
        @endforeach
    </div>

    {{-- {{ $properties->links() }} --}}


@endsection
