@extends('theme')

@section('content')

<h1>Réponse automatique</h1>

<p>Nous avons bien reçu votre demande concernant le bien : {{ $property->title }}</p>
<p>Vous recevrez une réponse de notre part aussi tôt que possible ! </p>

<h5>Net'Agence, l'agence du net</h5>
    
@endsection