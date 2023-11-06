<x-mail::message>

# Nouvelle demande de contact

Une nouvelle demande de contact à été fait depuis <a href="{{ route('agence.show',
['slug' => $property->slug, 'property' =>  $property]) }}">{{$property->title}}</a>

- Prénom : {{ $data['prenom'] }}
- Non : {{ $data['nom'] }}
- Téléphone : {{ $data['phone'] }}
- Mail : {{ $data['mail'] }}



**Message :**<br/>

{{ $data['message'] }}



</x-mail::message>
