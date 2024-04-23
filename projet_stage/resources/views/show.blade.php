@extends('layouts.layout')

@section('title', 'details')
@section('content')

<link rel="stylesheet" href="css/details.css"/>
<div class="container details mt-3 m-5">
    <div class="row" style="justify-content:center">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card col-md-10">
            <img style="object-fit: cover;width: 100%; height: 400px; " src="{{ asset('images/' . $event->image) }}" class="card-img-top" alt="Event Image">
            <div class="card-body">
                <h2 class="card-title">{{ $event->titre }}</h2>
                <p class="card-text">{{ $event->description }}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span style="font-weight: 700;">Date de début : </span> {{ $event->date_debut }}</li>
                    <li class="list-group-item"><span style="font-weight: 700;">Date de fin : </span> {{ $event->date_fin }}</li>
                    <li class="list-group-item"><span style="font-weight: 700;">Domaines_cibles : </span> 
                        @foreach($domaines as $domaine)
                            {{ $domaine . ', ' }}
                        @endforeach
                    </li>
                    <li class="list-group-item"><span style="font-weight: 700;">Posts_cibles : </span> 
                        @foreach($posts as $post)
                            {{ $post . ', ' }}
                        @endforeach
                    </li>

                </ul>
                <br>
                <div class="d-flex">
                    <form id="registrationForm" method="POST" action="{{ route('registerInEvent', ['id' => $event->id]) }}">
                        @csrf
                        <button type="submit" id="registrationButton" class="btn btn-primary mx-2" {{ $isRegistered ? 'disabled' : '' }}>inscrivez-vous</button>
                    </form>

                    @if ($isRegistered)
                        <form method="POST" action="{{ route('cancelRegistration', ['id' => $event->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-2">Cancel Registration</button>
                        </form>
                    @endif
                    @auth
                    @if (auth()->user()->role === 'Administrateur')
                    
                            <a href="{{ route('evenements.edit', $event->id) }}" class="btn btn-primary m-2">Modifier</a>

                            <form method="POST" action="{{ route('evenements.destroy', $event->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-2">Supprimer</button>
                            </form>

                            
                    @endif
                @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('registrationForm').addEventListener('submit', function() {
        document.getElementById('registrationButton').setAttribute('disabled', 'disabled');
        document.getElementById('registrationButton').innerText = 'Registration Completed';
    });
</script>

@endsection
