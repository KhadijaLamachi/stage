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
                <div class="card-header text text-center">Employés</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">CIN</th>
                                <th scope="col">Poste</th>
                                <th scope="col">Domaine</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employes as $employe)
                            <tr>
                                <td>{{ $employe->nom }}</td>
                                <td>{{ $employe->prenom }}</td>
                                <td>{{ $employe->cin }}</td>
                                <td>{{ $employe->post }}</td>
                                <td>{{ $employe->domaine }}</td>
                                <td>
                                    <a href="{{ route('employes.show', $employe->id) }}" class="btn btn-primary">Afficher</a>
                                    <a href="{{ route('employes.edit', $employe->id) }}" class="btn btn-success">Modifier</a>
                                    <form action="{{ route('employes.destroy', $employe->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('employes.create')}}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
