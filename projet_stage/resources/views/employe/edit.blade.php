@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier l'employé</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employes.update', $employe->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $employe->nom }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $employe->prenom }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="cin" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin" name="cin" value="{{ $employe->cin }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $employe->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $employe->telephone }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control" id="role" name="role" value="{{ $employe->role }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="post" class="form-label">Poste</label>
                            <input type="text" class="form-control" id="post" name="post" value="{{ $employe->post }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="domaine" class="form-label">Domaine</label>
                            <input type="text" class="form-control" id="domaine" name="domaine" value="{{ $employe->domaine }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
