@extends('theme')
@section('title', 'Adminnistration des biens')
@section('content')



    <div class="container">
        <div class="mt-3 mb-3 d-flex justify-content-between">
            <h1> @yield('title')</h1>
            <a href="{{ route('admin.create') }}" class="btn btn-primary ">Ajouter un bien</a>

        </div>
        <div class="container">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Surface</th>
                        <th scope="col">Prix </th>
                        <th scope="col">Ville</th>
                        <th scope="col">Options</th>
                        <th scope="col">Actions</th>
                    </tr>
                   
                </thead>
              
                <tbody>

                    @foreach ($properties as $property)
                        <tr>
                            <td>{{ $property->title }}</td>
                            <td>{{ $property->size . ' m²' }}</td>
                            <td>{{ number_format($property->price, thousands_separator: '  ') . ' €' }}</td>
                            <td>{{ $property->city }}</td>

                            <td>
                                @foreach ($property->options as $option)
                                    <li class="list-group"> {{ $option->name }}</li>
                                @endforeach
                            </td>

                            <td>
                                <a href="{{ route('admin.edit', $property) }}" class="btn btn-warning ">Editer</a>

                                <form  class="mt-2" action="{{ route('admin.delete', $property) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- {{ $properties->links() }} --}}


    @endsection
