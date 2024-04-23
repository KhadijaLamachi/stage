@extends('layouts.layout')
@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show container my-3 col-md-10" role="alert">
                    {{ session()->get('success') }}
                    <button type="button " class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('danger'))
                <div class="alert alert-danger alert-dismissible fade show container my-3 col-md-10" role="alert">
                    {{ session()->get('danger') }}
                    <button type="button " class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header text text-center">Evenements</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Date_Début</th>
                                <th scope="col">Date_Fin</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($evenements as $evenement)
                            <tr>
                                <td>{{ $evenement->titre }}</td>
                                <td>{{ $evenement->date_debut }}</td>
                                <td>{{ $evenement->date_fin }}</td>
                                <td>
                                    <a href="{{ route('evenements.show',  $evenement->id) }}" class="btn btn-primary">Afficher</a>
                                    <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-success">Modifier</a>
                                    <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('evenements.create')}}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
