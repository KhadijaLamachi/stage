@extends('layouts.layout')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Détails de l'employé</div>
                <div class="card-body">
                    <p><strong>Nom:</strong> {{ $employe->nom }}</p>
                    <p><strong>Prénom:</strong> {{ $employe->prenom }}</p>
                    <p><strong>CIN:</strong> {{ $employe->cin }}</p>
                    <p><strong>Poste:</strong> {{ $employe->post }}</p>
                    <p><strong>Domaine:</strong> {{ $employe->domaine }}</p>
                    <a href="{{ route('employes.edit', $employe->id) }}" class="btn btn-success">Modifier</a>
                    <a href="{{route('admin.employes')}}" class="btn btn-primary">Retour à la liste des employés</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
