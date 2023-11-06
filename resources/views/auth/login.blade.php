@extends('theme')
@section('title', 'Se connecter')

@section('content')


    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        <form action="{{ route('admin.login') }}" method="post" class="vstack gap-5">

            @csrf


            @include('shared.input', [
                'class' => 'col',
                'label' => 'Votre mail',
                'name' => 'email',
                'type' => 'email',
            ])
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Votre mot de passe',
                'name' => 'password',
                'type' => 'password',
             
            ])

            <button class="btn btn-primary">

                Se connecter

            </button>

        </form>



    </div>


@endsection
